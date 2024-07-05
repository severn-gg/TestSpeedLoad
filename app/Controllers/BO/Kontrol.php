<?php

namespace App\Controllers\BO;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kontrol extends BaseController
{

    protected function prepareData($menu)
    {
        $session = session();
        if ($session->has('user_id')) {
            $data = [
                'menu' => $menu,
                'username' => $session->get('username'),
                'cabang_id' => $session->get('cabang_id'),
                'nama' => $session->get('nama_pengguna'), // Assuming 'nama_pengguna' is the correct session key
            ];
            return $data;
        } else {
            // Redirect to login page if the user is not logged in
            return redirect()->to('/login'); // Adjust the route as needed
        }
    }

    public function index()
    {
        $data = $this->prepareData('Dashboard');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('BO/Content/dashboard', $data);
    }
    public function tiketbaru()
    {
        $data = $this->prepareData('Buattiket');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('BO/Content/tiketbaru', $data);
    }
    public function tiketsaya()
    {
        $data = $this->prepareData('Tiketsaya');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('BO/Content/tiketsaya', $data);
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
