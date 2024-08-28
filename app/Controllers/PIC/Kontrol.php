<?php

namespace App\Controllers\PIC;

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
                'username' => $session->get('username'),
                'aktivis_id' => $session->get('aktivis_id'),
                'jabatan_id' => $session->get('jabatan_id'),
                'cabang_id' => $session->get('cabang_id'),
                'area_id' => $session->get('area_id'),
                'PIC' => $session->get('PIC'),
                'nama_area' => $session->get('nama_area'),
                'nama' => $session->get('nama_pengguna'), // Assuming 'nama_pengguna' is the correct session key
            ];
            return $data;
        } else {
            // Redirect to login page if the user is not logged in
            return redirect()->to('/'); // Adjust the route as needed
        }
    }

    public function index()
    {
        $data = $this->prepareData('Dashboard');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }

        return view('PIC/Content/dashboard', $data);
    }

    public function tiketmasuk()
    {
        $data = $this->prepareData('Tiket', 'Tiketmasuk');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }

        return view('PIC/Content/tiketmasuk', $data);
    }

    public function tiketonprogress()
    {
        $data = $this->prepareData('Tiket', 'Tiketonprogress');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }

        return view('PIC/Content/tiketonprogress', $data);
    }

    public function tiketdone()
    {
        $data = $this->prepareData('Tiket', 'Tiketondone');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }

        return view('PIC/Content/tiketdone', $data);
    }

    public function tiketstartworking()
    {
        return view('PIC/Content/tiketstartworking');
    }

    public function tiketstartworkingprint()
    {
        return view('PIC/Content/tiketstartworkingprint');
    }

    public function tiketonprogressdetail()
    {
        return view('PIC/Content/tiketonprogressdetail');
    }

    public function tiketonprogressprint()
    {
        return view('PIC/Content/tiketonprogressprint');
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
        $data = $this->prepareData('Pages', 'Profile');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }

        return view('PIC/Content/profile', $data);
    }
}
