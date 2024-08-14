<?php

namespace App\Controllers\Admin;

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
        return view('Admin/Content/dashboard', $data);
    }

    // Menu Tiket
    public function viewaktivis()
    {
        $data = $this->prepareData('Tables', 'viewaktivis');
        if (is_a(
            $data,
            '\CodeIgniter\HTTP\RedirectResponse'
        )) {
            return $data;
        }
        return view('Admin/Content/Tables/listaktivis', $data);
    }

    public function viewticket()
    {
        $data = $this->prepareData('Tables', 'Tiket');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Ticket/app', $data);
    }

    public function detailTiket()
    {
        $data = $this->prepareData('Tables', 'Kantor');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Ticket/detailTiket', $data);
    }

    // Menu Tables
    public function listkantor()
    {
        $data = $this->prepareData('Tables', 'Kantor');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Tables/listkantor', $data);
    }

    public function detailprint()
    {
        return view('Admin/Content/Ticket/detailprint');
    }

    public function detailkantor()
    {
        return view('Admin/Content/Tables/detailkantor');
    }

    public function listdepartemen()
    {
        return view('Admin/Content/Tables/listdepartemen');
    }

    public function detaildepartemen()
    {
        return view('Admin/Content/Tables/detaildepartemen');
    }

    public function listpic()
    {
        return view('Admin/Content/Tables/listpic');
    }

    public function listdivisi_it()
    {
        return view('Admin/Content/Tables/listdivisi');
    }

    // menu Forms
    // sesuai hasil diskusi 11 juni
    public function forminputaktivis()
    {
        $data = $this->prepareData('Forms', 'tambahaktivis');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/aktivis', $data);
    }
    public function forminputjabatan()
    {
        $data = $this->prepareData('Forms', 'jabatan');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/jabatan', $data);
    }
    public function forminputarea()
    {
        $data = $this->prepareData('Forms', 'area');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/area', $data);
    }
    public function forminputkantor()
    {
        $data = $this->prepareData('Forms', 'kantor');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/kantor', $data);
    }

    public function formsetkantoraktivis()
    {
        $data = $this->prepareData('Forms', 'kantoraktivis');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/kantoraktivis', $data);
    }

    public function formsetjabatanaktivis()
    {
        $data = $this->prepareData('Forms', 'mutasijabatan');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/jabatanaktivis', $data);
    }

    public function formsetuserloginaktivis()
    {
        $data = $this->prepareData('Forms', 'tambahuserlogin');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/userlogin', $data);
    }
    public function formsetpicarea()
    {
        $data = $this->prepareData('Forms', 'picarea');
        if (is_a($data, '\CodeIgniter\HTTP\RedirectResponse')) {
            return $data;
        }
        return view('Admin/Content/Forms/pic', $data);
    }



    // Menu Charts
    public function chartsTiket()
    {
        return view('Admin/Content/Charts/Tiket/app');
    }
    public function exportTiketByStatus()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'statusTiket' => 'Semua Status'
        ];
        echo view('Admin/Content/Charts/Tiket/exportByStatus', $data);
    }
    public function exportByKategori()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'kategoriTiket' => 'Semua Kategori'
        ];
        echo view('Admin/Content/Charts/Tiket/byKategori', $data);
    }
    public function exportByKantor()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'kantorTiket' => 'Semua Kantor'
        ];
        echo view('Admin/Content/Charts/Tiket/byKantor', $data);
    }
    public function exportByVerifikator()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'verifikatorTiket' => 'Semua Departemen'
        ];
        echo view('Admin/Content/Charts/Tiket/byVerifikator', $data);
    }

    public function chartsBO()
    {
        return view('Admin/Content/Charts/BranchOffice/app');
    }
    public function exportBOByStatusTiket()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'kantorTiket' => 'Semua Kantor',
            'statusTiket' => 'Semua Status'
        ];
        echo view('Admin/Content/Charts/BranchOffice/exportByStatus', $data);
    }
    public function exportBOByKategori()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'kantorTiket' => 'Semua Kantor',
            'kategoriTiket' => 'Semua Kategori'
        ];
        echo view('Admin/Content/Charts/BranchOffice/byKategori', $data);
    }
    public function exportBOByVerifikator()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'kantorTiket' => 'Semua Kantor',
            'verifikatorTiket' => 'Semua Departemen'
        ];
        echo view('Admin/Content/Charts/BranchOffice/byVerifikator', $data);
    }

    public function chartsPIC()
    {
        return view('Admin/Content/Charts/PIC/app');
    }
    public function exportPIC_BySolvingTiket()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'pic' => 'Semua PIC'
        ];
        echo view('Admin/Content/Charts/PIC/solvingTiket', $data);
    }
    public function exportPIC_ByKategoriTiket()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'pic' => 'Semua PIC',
            'kategoriTiket' => 'Semua Kategori'
        ];
        echo view('Admin/Content/Charts/PIC/kategoritiket', $data);
    }
    public function exportPIC_ByKantorTiket()
    {
        $data = [
            'fromDate' => '12-Dec-2023',
            'toDate' => '12-Dec-2024',
            'pic' => 'Semua PIC',
            'kantorTiket' => 'Semua Kantor'
        ];
        echo view('Admin/Content/Charts/PIC/kantortiket', $data);
    }

    // Pages
    // Profile
    public function profile()
    {
        return view('Admin/Content/Pages/profile');
    }
}
