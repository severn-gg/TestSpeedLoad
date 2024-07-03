<?php

namespace App\Models\Api;

use CodeIgniter\Model;

class ApiModel extends Model
{

    public function getLog($table, $id = null, $where = [])
    {
        $db = \Config\Database::connect();

        try {
            $query = $db->table($table);

            $query->where('username', $where);
            $result = $query->get()->getResultArray();

            if (empty($result)) {
                return [
                    'status' => true,
                    'message' => "No data in table",
                    'data' => null
                ];
            }

            return [
                'status' => true,
                'message' => "Data fetched successfully",
                'data' => $result
            ];
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
                'data' => null
            ];
        }
    }

    public function insert_table($data, $table, $id = null)
    {
        try {
            $db = \Config\Database::connect();
            $query = $db->table($table);

            if ($id === null) {
                // Insert operation
                $query->insert($data);
                $lastInsertedId = $db->insertID(); // Get the last inserted ID

                if ($db->affectedRows() === 0) {
                    return "No records were affected.";
                }

                return ['success' => true, 'lastInsertedId' => $lastInsertedId];
            } else {
                // Update operation
                if ($table === 'cabangaktivis' || $table === 'jabatanaktivis') {
                    $query->where('aktivis_id', $id);
                } else {
                    $idd = $table . '_id'; // Construct the ID field name
                    $query->where($idd, $id);
                }
                $query->update($data);

                if ($db->affectedRows() === 0) {
                    return "No records were affected.";
                }

                return ['success' => true];
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return $e->getMessage(); // Return the error message
        }
    }

    public function get($table, $field = null, $value = null, $id = null)
    {
        $db = \Config\Database::connect();

        try {
            $query = $db->table($table);

            if ($id !== null) {
                $query->where($table . '_id', $id);
            }

            if ($field !== null && $value !== null) {
                $query->where($field, $value);
            }

            $result = $query->get()->getResultArray();

            if (empty($result)) {
                return [
                    'status' => true,
                    'message' => "No data in table",
                    'data' => null
                ];
            }

            return [
                'status' => true,
                'message' => "Data fetched successfully",
                'data' => $result
            ];
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
                'lastQuery' => $this->db->getLastQuery()->getQuery(),
                'data' => null
            ];
        }
    }

    public function delete_table($table, $id)
    {
        try {
            $db = \Config\Database::connect();
            $query = $db->table($table);

            $idd = $table . '_id'; // Construct the ID field name
            $query->where($idd, $id)->delete();

            if ($db->affectedRows() === 0) {
                return ("No records were affected."); // Throw exception if no records affected
            }

            return true; // Return true if insertion or update succeeds
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return $e->getMessage(); // Return the error message
        }
    }
}