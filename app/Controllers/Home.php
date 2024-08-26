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
        // Use CodeIgniter's session instance
        $session = session();

        // Destroy the session using CodeIgniter's session destroy method
        $session->destroy();

        // Set a flash message after destroying the session
        $session->setFlashdata('msg', 'Kamu Logout');

        // Redirect to the index page or login page
        return $this->index();
    }
}
