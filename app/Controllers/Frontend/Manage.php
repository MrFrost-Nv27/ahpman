<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Filters\TeamSession;
use App\Models\Ahpman\KriteriaModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Manage extends BaseController
{
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger, ) {
        parent::initController($request, $response, $logger);
        $this->view->setData([
            // "user" => TeamSession::user()
        ]);
    }
    public function index(): string
    {
        $this->view->setData([
            "page" => "dashboard"
        ]);
        return $this->view->render("pages/panel/index");
    }
    public function siswa(): string
    {
        $this->view->setData([
            "page" => "siswa"
        ]);
        return $this->view->render("pages/panel/siswa");
    }
    public function kriteria(): string
    {
        $this->view->setData([
            "page" => "kriteria",
            "kriteria" => KriteriaModel::all()->load("subkriteria"),
        ]);
        return $this->view->render("pages/panel/kriteria");
    }
    public function nilai(): string
    {
        $this->view->setData([
            "page" => "nilai"
        ]);
        return $this->view->render("pages/panel/nilai");
    }
    public function perhitungan(): string
    {
        $this->view->setData([
            "page" => "perhitungan",
            "kriteria" => KriteriaModel::all()->load("subkriteria", "perbandingan"),
        ]);
        return $this->view->render("pages/panel/perhitungan");
    }
}
