<?php

namespace App\Controllers\Validator;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kontrol extends BaseController
{

    public function index()
    {
        return view('Validator/Content/dashboard');
    }
    public function tiketmasuk()
    {
        return view('Validator/Content/tiketmasuk');
    }

    public function tiketverifikasi()
    {
        return view('Validator/Content/tiketverifikasi');
    }

    public function tiketverifikasiprint()
    {
        return view('Validator/Content/tiketverifikasiprint');
    }

    public function tiketdone()
    {
        return view('Validator/Content/tiketdone');
    }

    public function tiketdetail()
    {
        return view('Validator/Content/tiketdetail');
    }

    public function tiketprint()
    {
        return view('Validator/Content/tiketprint');
    }
    public function profile()
    {
        return view('Validator/Content/profile');
    }
}
