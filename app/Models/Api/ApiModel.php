<?php

namespace App\Models\Api;

use CodeIgniter\Model;

class ApiModel extends Model
{

    public function countAll()
    {
        $query = $this->db->query("SELECT COUNT(*) as total FROM `tiket`");
        $result = $query->getRow(); // Fetch the single row result
        return (int) $result->total; // Return the 'total' field as an integer
    }

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
                try {
                    if ($table === 'cabangaktivis' || $table === 'jabatanaktivis') {
                        $query->where('aktivis_id', $id);
                    } else if ($table === 'pic') {
                        $query->where('pic_id', $id);
                    } else {
                        $idd = $table . '_id'; // Construct the ID field name
                        $query->where($idd, $id);
                    }

                    // Execute the update query
                    $query->update($data);                    

                    return ['success' => true, 'message' => "Data Updated!"];
                } catch (\Exception $e) {
                    // Catch any exceptions during the update process
                    return "Update failed: " . $e->getMessage();
                }
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            // Handle database connection or query execution exceptions
            $db = \Config\Database::connect(); // Get the database connection instance
            $lastQuery = $db->getLastQuery(); // Get the last executed query

            return "Error: " . $e->getMessage() . " | Last Query: " . $lastQuery;
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

    public function cek_pic($data)
    {
        $db = \Config\Database::connect();

        // 1. Get the role_id of the user_id being sent
        $userQuery = $db->table('user')
            ->select('role_id')
            ->where('user_id', $data['user_id'])
            ->get();
        $userResult = $userQuery->getRowArray();

        if ($userResult) {
            $role_id = $userResult['role_id']; // Role ID of the user being inserted

            // 2. Check if the area_id exists in the pic table, get all the user_ids associated with that area_id
            $areaQuery = $db->table('pic')
                ->select('user_id')
                ->where('area_id', $data['area_id'])
                ->get();
            $areaResults = $areaQuery->getResultArray();

            // 3. Loop through all user_ids from the result, check if their role_id matches the role_id from point 1
            foreach ($areaResults as $areaRow) {
                $picUserId = $areaRow['user_id'];

                // Get the role_id of the user in the pic table
                $roleCheckQuery = $db->table('user')
                    ->select('role_id')
                    ->where('user_id', $picUserId)
                    ->get();
                $roleCheckResult = $roleCheckQuery->getRowArray();

                if ($roleCheckResult && $roleCheckResult['role_id'] == $role_id) {
                    // Role_id of user in area matches the one we're checking
                    return false; // Return false, as the combination already exists
                }
            }

            // If no matching role_id was found, return true
            return true;
        } else {
            // If no role_id was found for the user_id
            return false;
        }

    }

    public function cek_user($data)
    {
        $db = \Config\Database::connect();
        $query = $db->table('user')
            ->where('aktivis_id', $data['aktivis_id'])
            ->orGroupStart()  // Start a group for OR conditions
            ->where('username', $data['username'])
            ->groupEnd()  // End the OR condition group
            ->get();
        $result = $query->getResultArray();

        if (empty($result)) {
            return true;
        } else {
            return false;
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
