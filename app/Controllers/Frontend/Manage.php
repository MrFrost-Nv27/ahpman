<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Filters\TeamSession;
use App\Models\Ahpman\KriteriaModel;
use App\Models\Ahpman\SiswaModel;
use App\Models\PenggunaModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Manage extends BaseController
{
    protected PenggunaModel $user;
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger, ) {
        parent::initController($request, $response, $logger);
        $this->user = PenggunaModel::find(auth()->user()->id);
        $this->view->setData([
            "user" => $this->user,
        ]);
    }
    public function index(): string
    {
        $this->view->setData([
            "page" => "dashboard"
        ]);
        return $this->view->render("pages/panel/{$this->user->groups[0]->group}/index");
    }
    public function siswa(): string
    {
        $this->view->setData([
            "page" => "siswa"
        ]);
        return $this->view->render("pages/panel/admin/siswa");
    }
    public function kriteria(): string
    {
        $this->view->setData([
            "page" => "kriteria",
            "kriteria" => KriteriaModel::all()->load("subkriteria"),
        ]);
        return $this->view->render("pages/panel/admin/kriteria");
    }
    public function nilai(): string
    {
        $this->view->setData([
            "page" => "nilai"
        ]);
        return $this->view->render("pages/panel/admin/nilai");
    }
    public function perhitungan(): string
    {
        $this->view->setData([
            "page" => "perhitungan",
            "kriteria" => KriteriaModel::all()->load("subkriteria", "perbandingan"),
            "siswa" => SiswaModel::all()->load("nilai"),
        ]);
        return $this->view->render("pages/panel/admin/perhitungan");
    }

    public function profil(): string
    {
        $this->view->setData([
            "page" => "profil",
            "siswa" => SiswaModel::where("user_id", $this->user->id)->first(),
        ]);
        return $this->view->render("pages/panel/user/profil");
    }

    public function ujian(): string
    {
        $this->view->setData([
            "page" => "ujian",
            "kriteria" => KriteriaModel::all(),
            "siswa" => SiswaModel::where("user_id", $this->user->id)->first()->load("nilai"),
        ]);
        return $this->view->render("pages/panel/user/ujian");
    }

    public function pengumuman(): string
    {
        $this->view->setData([
            "page" => "pengumuman",
            "siswa" => SiswaModel::all()->sortBy("ranking"),
        ]);
        return $this->view->render("pages/panel/user/pengumuman");
    }
}