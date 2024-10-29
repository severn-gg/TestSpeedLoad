<?php

namespace App\Controllers\Validator;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kontrol extends BaseController
{

    protected function prepareData($menu, $submenu = null)
    {
        $session = session();
        if ($session->has('user_id')) {
            $data = [
                'menu' => $menu,
                'submenu' => $submenu,
                'user_id' => $session->get('user_id'),
                'username' => $session->get('username'),
                'aktivis_id' => $session->get('aktivis_id'),
                'dataTiket' => $session->get('dataTiket'),
                'dataTikets' => $session->get('dataTikets'),
                'dataTiketr' => $session->get('dataTiketr'),
                'pict' => $session->get('pict'),
                'jabatan_id' => $session->get('jabatan_id'),
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
        return view('Validator/Content/dashboard', $data);
    }
    public function tiketmasuk()
    {
        $data = $this->prepareData('tiket', 'tiketmasuk');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Validator/Content/tiketmasuk', $data);
    }

    public function tiketverifikasi()
    {
        $data = $this->prepareData('tiket', 'tiketverifikasi');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Validator/Content/tiketverifikasi', $data);
    }

    public function tiketverifikasiprint()
    {
        return view('Validator/Content/tiketverifikasiprint');
    }

    public function tiketdone()
    {
        $data = $this->prepareData('tiket', 'tiketverifikasi');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Validator/Content/tiketdone', $data);
    }

    public function tiketdetail()
    {
        $data = $this->prepareData('tiket', 'tiketverifikasi');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Validator/Content/tiketdetail', $data);
    }

    public function profile()
    {
        $data = $this->prepareData('Pages', 'Profile');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Validator/Content/profile', $data);
    }
    

    public function tiketprint()
    {
        return view('Validator/Content/tiketprint');
    }
    
}
