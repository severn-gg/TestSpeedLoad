<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Api\ApiModel;

class Api extends BaseController
{
    use ResponseTrait;

    // login api
    // login sudah disesuaikan dengan php, dan bisa flashdata, ganti route form login ke api/login
    public function login()
    {
        $session = session();
        // Get request bodi
        $requestBody = array();
        $requestBody['username'] = $_POST['username'];
        $requestBody['password'] = $_POST['password'];
        // $requestBody = $this->request->getBody();
        $validation = \Config\Services::validation();
        // $jsonData = json_decode($requestBody, true);        

        $username = $requestBody['username'];
        $password = $requestBody['password'];

        // // validasi not empty
        if (empty($username) || empty($password)) {
            // return $this->failUnauthorized('Invalid username or password');
            $session->setFlashdata('msg', 'tidak boleh kosong!');
            return redirect()->to(base_url('/'));
        }

        // var_dump($username, $password);
        // die;
        // Fetch user from database
        $morders = new ApiModel();
        $result = $morders->getLog('login_view', null, ['username' => $username]);
        // var_dump($result);
        // die;

        if (!$result['status'] || empty($result['data'])) {
            // return $this->failUnauthorized('User not found');
            $session->setFlashdata('msg', 'User tidak ditemukan');
            return redirect()->to(base_url('/'));
        }

        $userData = $result['data'][0];
        // var_dump($userData);
        // die;

        // Check if user active
        if ($userData['active'] !== "2") {
            // return $this->failUnauthorized('User belum di restui Admin!');
            $session->setFlashdata('msg', 'User belum di restui Admin!');
            return redirect()->to(base_url('/'));
        }

        // Verify password
        if ($password !== $userData['password_hash']) {
            // return $this->failUnauthorized('Incorrect password');
            $session->setFlashdata('msg', 'Password salah!');
            return redirect()->to(base_url('/'));
        }

        // Set session data
        $session = session();
        $sessionData = [
            'user_id'       => $userData['user_id'],
            'username'      => $userData['username'],
            'nama_pengguna' => $userData['nama_pengguna'],
            'namagroup_id'  => $userData['namagroup_id'],
            'nama_group'    => $userData['nama_group'],
            'cabang_id'     => $userData['cabang_id'],
            'kantor'        => $userData['kantor'],
        ];
        $session->set($sessionData);

        if ($userData['namagroup_id'] == 1) {
            $session->set('role', 'isAdmin');
            return redirect()->to('admin/dashboard');
        } elseif ($userData['namagroup_id'] > 1 && $userData['namagroup_id'] < 6) {
            $session->set('role', 'isPIC');
            return redirect()->to('pic/dashboard');
        } elseif ($userData['namagroup_id'] == 6) {
            $session->set('role', 'isVal');
            return redirect()->to('validator/dashboard');
        } else {
            $session->set('role', 'isBO');
            return redirect()->to('bo/dashboard');
        }
    }

    //insert jika manyertakan id adalah update
    public function insert()
    {
        // ambil data yang dikirimkan
        $requestBody = $this->request->getBody();
        $validation = \Config\Services::validation();
        $jsonData = json_decode($requestBody, true);

        if (empty($jsonData['table'])) {
            return $this->failServerError('No table specified');
        }

        $table = $jsonData['table'];
        $id = isset($jsonData['id']) && !empty($jsonData['id']) ? (int)$jsonData['id'] : null;
        $data = $jsonData['data'][0];

        if ($table === "pic") {
        }

        switch ($table) {
            case "aktivis":
                // Validasi data
                $validation->setRules([
                    'nia' => 'required',
                    'nama_aktivis' => 'required',
                    'jk' => 'required',
                    'no_hp' => 'required',
                    'asal' => 'required',
                ]);
                break;
            case "cabangaktivis":
                // Validasi data
                $validation->setRules([
                    'aktivis_id' => 'required',
                    'cabang_id' => 'required',
                    'start_date' => 'required',
                ]);
                break;
            case "jabatanaktivis":
                // Validasi data
                $validation->setRules([
                    'aktivis_id' => 'required',
                    'jabatan_id' => 'required',
                    'start_date' => 'required',
                ]);
                break;
            case "jabatan":
                // Validasi data
                $validation->setRules([
                    'nama_jabatan' => 'required'
                ]);
                break;
            case "area":
                // Validasi data
                $validation->setRules([
                    'nama_area' => 'required'
                ]);
                break;
            case "cabang":
                // Validasi data
                $validation->setRules([
                    'nama_cabang' => 'required',
                    'alamat_cabang' => 'required',
                    'area_id' => 'required'
                ]);
                break;
            case "user":
                // Validasi data
                $validation->setRules([
                    'aktivis_id' => 'required',
                    'username' => 'required',
                    'password_hash' => 'required',
                    'active' => 'required',
                    'role_id' => 'required'
                ]);

                $picModel = new ApiModel();
                $result = $picModel->cek_user($data);

                // Check if $result is true
                if ($result !== true) {
                    return $this->failServerError('Oops User login sudah ada!');
                }
                break;
            case "pic":
                // Validasi data
                $validation->setRules([
                    'user_id' => 'required',
                    'area_id' => 'required'
                ]);

                $picModel = new ApiModel();
                $result = $picModel->cek_pic($data);

                // Check if $result is true
                if ($result !== true) {
                    return $this->failServerError('Oops user sudah pada PIC ini!');
                }
                break;
            case "tiket":
                // Validasi data
                $validation->setRules([
                    'user_id' => 'required',
                    'tiketkategori_id' => 'required',
                    'status' => 'required',
                    'prioritas' => 'required',
                    'tgl_buat' => 'required',
                    'deskripsi' => 'required',
                    'nama_file' => 'required',
                    'img' => 'required'
                ]);
                break;
            default:
                return $this->failServerError('Salah inputan table!');
        }

        if (!$validation->run($data)) {
            return $this->failValidationErrors($validation->getErrors());
        }

        // Insert data ke database
        $partnerModel = new ApiModel();
        $result = $partnerModel->insert_table($data, $table, $id);

        // Pengiriman response 
        if (is_array($result) && isset($result['success']) && $result['success'] === true) {
            if ($id !== null) {
                return $this->respondCreated(['message' => 'Data Updated successfully']);
            } else {
                return $this->respondCreated([
                    'message' => 'Data Inserted successfully',
                    'id' => $result['lastInsertedId'], // Access the last inserted ID from the result array
                ]);
            }
        } else {
            return $this->fail($result); // If $result is a string (error message), return it as a failure
        }
    }

    // get jika menyertakan ID, maka : select where
    public function get()
    {
        // ambil data yang dikirimkan
        $requestBody = $this->request->getBody();
        $jsonData = json_decode($requestBody, true);

        // cek jika data kosong
        if (empty($jsonData['table'])) {
            return $this->failServerError('Perlu mencantumkan nama Table!');
        }

        // menyimpan data kiriman ke dalam variable
        $table = $jsonData['table'];
        $field = isset($jsonData['field']) && !empty($jsonData['field']) ? $jsonData['field'] : null;
        $value = isset($jsonData['value']) && !empty($jsonData['value']) ? $jsonData['value'] : null;
        $id = isset($jsonData['id']) && !empty($jsonData['id']) ? (int)$jsonData['id'] : null;

        // var_dump($field, $value);
        // die;

        // inisialisasi model dan ambil data dari database
        $morders = new ApiModel();
        $result = $morders->get($table, $field, $value, $id);

        // pengiriman response 
        if ($result['status'] === true) {
            return $this->respond($result, 200);
        } else {
            return $this->respond($result, 404);
        }
    }

    public function delete()
    {
        // ambil data yang dikirimkan
        $requestBody = $this->request->getBody();
        $validation = \Config\Services::validation();
        $jsonData = json_decode($requestBody, true);

        // cek jika data kosong
        if (empty($jsonData['table'])) {
            return $this->failServerError('No table specified');
        }

        // tempatkan data ke dalam variable
        $table = $jsonData['table'];
        $id = (int)$jsonData['id'];

        // validasi nama table
        switch ($table) {
            case "usergroup":
                break;
            case "user":
                break;
            case "tiketkategori":
                break;
            case "tiket":
                break;
            case "komentar":
                break;
            default:
                return $this->failServerError('Salah inputan table!');
        }

        // Delete data from the database
        $partnerModel = new ApiModel();
        $result = $partnerModel->delete_table($table, $id);

        // kirimkan response
        if ($result === true) {
            return $this->respondCreated(['message' => 'Data Successfully Deleted']);
        } else {
            return $this->fail($result);
        }
    }
}
