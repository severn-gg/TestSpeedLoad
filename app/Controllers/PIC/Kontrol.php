<?php

namespace App\Controllers\PIC;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kontrol extends BaseController
{
    public function index()
    {
        return view('PIC/Content/dashboard');
    }
    public function tiketmasuk()
    {
        return view('PIC/Content/tiketmasuk');
    }

    public function tiketstartworking()
    {
        return view('PIC/Content/tiketstartworking');
    }

    public function tiketstartworkingprint()
    {
        return view('PIC/Content/tiketstartworkingprint');
    }

    public function tiketonprogress()
    {
        return view('PIC/Content/tiketonprogress');
    }
    public function tiketonprogressdetail()
    {
        return view('PIC/Content/tiketonprogressdetail');
    }

    public function tiketonprogressprint()
    {
        return view('PIC/Content/tiketonprogressprint');
    }

    public function tiketdone()
    {
        return view('PIC/Content/tiketdone');
    }
    public function tiketdonedetail()
    {
        return view('PIC/Content/tiketselesaidetail');
    }

    public function tiketdoneprint()
    {
        return view('PIC/Content/tiketselesaiprint');
    }

    public function profile()
    {
        return view('PIC/Content/profile');
    }
}
