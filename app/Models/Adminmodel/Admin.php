<?php

namespace App\Models\Adminmodel;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function dashboardData()
    {
    }

    public function tiketSubmited($status)
    {
        $db = \Config\Database::connect();
        $query = $db->table('new_tiket_view');
        $query->where('status', $status);
        $result = $query->get()->getResultArray();
        return $result;
    }

    public function changeStatus($id, $status)
    {
        $db = \Config\Database::connect();

        $query = $db->table('tiket')->where('tiket_id', $id)->update(['status' => $status]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
