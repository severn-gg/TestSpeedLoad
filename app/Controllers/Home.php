<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Login/Login');
    }

    public function logout()
    {
        session_start();

        session_destroy();

        session()->setFlashdata('msg', 'Kamu Logout');
        return $this->index();
    }
}
