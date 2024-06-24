<?php

namespace App\Controllers\BO;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kontrol extends BaseController
{
    public function index()
    {
        return view('BO/Content/dashboard');
    }
    public function tiketbaru()
    {
        return view('BO/Content/tiketbaru');
    }
    public function tiketsaya()
    {
        return view('BO/Content/tiketsaya');
    }

    public function tiketdetail()
    {
        return view('BO/Content/tiketdetail');
    }

    public function tiketprint()
    {
        return view('BO/Content/tiketprint');
    }

    public function tiketkonfirmasidetail()
    {
        return view('BO/Content/tiketkonfirmasidetail');
    }

    public function tiketkonfirmasiprint()
    {
        return view('BO/Content/tiketkonfirmasiprint');
    }
}
