<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Models\Ahpman\NilaiModel;
use App\Models\Ahpman\SiswaModel;
use App\Models\PenggunaModel;
use CodeIgniter\Shield\Authentication\Passwords;

class SiswaController extends BaseApi
{
    protected $modelName = SiswaModel::class;

    protected $load = ['nilai', 'user', 'user.identities'];

    public function validateCreate(&$request)
    {
        return $this->validate([
            'name' => 'required',
            'username' => 'required|max_length[30]|min_length[3]|regex_match[/\A[a-zA-Z0-9\.]+\z/]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[auth_identities.secret]',
            'password' => 'required|' . Passwords::getMaxLengthRule(),
            'password_confirm' => 'required|matches[password]',
        ]);
    }

    public function updateNilai()
    {
        $data = $this->request->getJSON(true);
        NilaiModel::upsert($data, uniqueBy: ['siswa_id', 'kriteria_id'], update: ['nilai']);
        return $this->respond($data);
    }

    public function updateHasil()
    {
        $data = $this->request->getJSON(true);
        SiswaModel::upsert($data, uniqueBy: ['id'], update: ['total', 'ranking', 'status']);
        return $this->respond($data);
    }

    public function beforeCreate(&$data)
    {

        $user = PenggunaModel::create([
            'username' => $this->request->getVar('username'),
            'name' => $data->name,
        ])->setEmailIdentity([
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ])->addGroup('user')->activate();

        $data->user_id = $user->id;
    }

    public function beforeUpdate(&$data)
    {
        if ($this->request->getVar('password')) {
            if ($this->request->getVar('password') != $this->request->getVar('password_confirm')) {
                return false;
            }
            $userProvider = auth()->getProvider();
            $user = $userProvider->find($data->user_id);
            $user->fill(['password' => $this->request->getVar('password')]);
            $userProvider->save($user);
        }
    }

    public function afterDelete(&$data)
    {
        $users = auth()->getProvider();
        $users->delete($data->user_id, true);
    }

    public function login()
    {
        return $this->respond(SiswaModel::where("user_id", auth()->id())->first());
    }
}
