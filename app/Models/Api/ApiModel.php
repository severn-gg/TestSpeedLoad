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
                if (strpos($value, ',') !== false) {
                    // Convert comma-separated string into an array
                    $valueArray = explode(',', $value);
                    $query->whereIn($field, $valueArray); // Use the 'IN' clause
                } else {
                    // Use the "=" clause for a single value
                    $query->where($field, $value);
                }
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

    public function getDataAdmin(){
        $db = \Config\Database::connect();

        try {
            // Count from the `aktivis` table
            $query = $this->db->query("SELECT COUNT(aktivis_id) as total FROM `aktivis`");
            $result = $query->getRow();  // Fetch the single row result            

            // Count from the `user` table
            $queryL = $this->db->query("SELECT COUNT(aktivis_id) as total FROM `user`");
            $resultL = $queryL->getRow();  // Fetch the single row result            

            // Count from the `tiket` table
            $queryT = $this->db->query("SELECT COUNT(tiket_id) as total FROM `tiket`");  // Corrected the table name to `tiket`
            $resultT = $queryT->getRow();  // Fetch the single row result            
                
            // Count from the `tiket` table where status is 'Closed'
            $queryTS = $this->db->query("SELECT COUNT(DISTINCT latest_history.tiket_id) AS total
            FROM hdeskk.tikethistory th
            INNER JOIN (
                SELECT tiket_id, MAX(tikethistory_id) AS latest_id
                FROM hdeskk.tikethistory
                WHERE state = 'Closed'
                GROUP BY tiket_id
            ) AS latest_history ON th.tikethistory_id = latest_history.latest_id;
            ");  // Corrected the table name to `tiket`
            $resultTS = $queryTS->getRow();  // Fetch the single row result                        

            return [
                'aktivis' => (int) $result->total,
                'login' => (int) $resultL->total,
                'tiket' => (int) $resultT->total,  // Added missing semicolon
                'tiketS' => (int) $resultTS->total  // Corrected and added missing semicolon
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

    public function getDataVal(){
        $db = \Config\Database::connect();

        try {
            
            // Count from the `tiket` table
            $queryT = $this->db->query("SELECT COUNT(DISTINCT latest_history.tiket_id) AS total_tickets
            FROM hdeskk.tikethistory th
            INNER JOIN (
                SELECT tiket_id, MAX(tikethistory_id) AS latest_id
                FROM hdeskk.tikethistory
                WHERE state = 'Submited'
                GROUP BY tiket_id
            ) AS latest_history ON th.tikethistory_id = latest_history.latest_id;
            ");  // Corrected the table name to `tiket`
            $resultT = $queryT->getRow();  // Fetch the single row result            
                
            // Count from the `tiket` table where status is 'Closed'
            $queryTS = $this->db->query("SELECT COUNT(DISTINCT latest_history.tiket_id) AS total_tickets
            FROM hdeskk.tikethistory th
            INNER JOIN (
                SELECT tiket_id, MAX(tikethistory_id) AS latest_id
                FROM hdeskk.tikethistory
                WHERE state = 'Confirmed'
                GROUP BY tiket_id
            ) AS latest_history ON th.tikethistory_id = latest_history.latest_id;
            ");  // Corrected the table name to `tiket`
            $resultTS = $queryTS->getRow();  // Fetch the single row result 

            // Count from the `tiket` table where status is 'Closed'
            $queryTR = $this->db->query("SELECT COUNT(DISTINCT latest_history.tiket_id) AS total_tickets
            FROM hdeskk.tikethistory th
            INNER JOIN (
                SELECT tiket_id, MAX(tikethistory_id) AS latest_id
                FROM hdeskk.tikethistory
                WHERE state = 'Reject'
                GROUP BY tiket_id
            ) AS latest_history ON th.tikethistory_id = latest_history.latest_id;
            ");  // Corrected the table name to `tiket`
            $resultTR = $queryTR->getRow();  // Fetch the single row result                        

            return [                
                'tiket' => (int) $resultT->total_tickets,  // Added missing semicolon
                'tiketS' => (int) $resultTS->total_tickets,  // Corrected and added missing semicolon
                'tiketTR' => (int) $resultTR->total_tickets  // Corrected and added missing semicolon
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

    public function getDataPIC($areaId,$PIC){
        $db = \Config\Database::connect();

        try {                                 

            // Count from the `tiket` table
            $query = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE area_id in ($areaId) AND tiket_kategori= '$PIC'");  // Corrected the table name to `tiket`
            $result = $query->getRow();  // Fetch the single row result  

            // Count from the `tiket` table
            $queryT = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE area_id in ($areaId) AND tiket_kategori= '$PIC' AND status = 'In Progress'");  // Corrected the table name to `tiket`
            $resultT = $queryT->getRow();  // Fetch the single row result

            // Count from the `tiket` table
            $queryS = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE area_id in ($areaId) AND tiket_kategori= '$PIC' AND status = 'Solved'");  // Corrected the table name to `tiket`
            $resultS = $queryS->getRow();  // Fetch the single row result            
                
            // Count from the `tiket` table where status is 'Closed'
            $queryTS = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE area_id in ($areaId) AND tiket_kategori= '$PIC' AND status = 'Closed'");  // Corrected the table name to `tiket`
            $resultTS = $queryTS->getRow();  // Fetch the single row result                        

            return [                
                'tiket' => (int) $result->total,  // Added missing semicolon
                'inProgress' => (int) $resultT->total,  // Corrected and added missing semicolon
                'solved' => (int) $resultS->total,  // Corrected and added missing semicolon
                'closed' => (int) $resultTS->total  // Corrected and added missing semicolon
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

    public function getDataBO($cabangId){
        
        $db = \Config\Database::connect();

        try {                                 

            // Count from the `tiket` table
            $query = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE cabang_id in ($cabangId)");  // Corrected the table name to `tiket`
            $result = $query->getRow();  // Fetch the single row result  

            // Count from the `tiket` table
            $queryF = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE cabang_id in ($cabangId) AND status = 'Closed'");  // Corrected the table name to `tiket`
            $resultF = $queryF->getRow();  // Fetch the single row result

            // Count from the `tiket` table
            $queryIP = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE cabang_id in ($cabangId) AND status = 'In Progress'");  // Corrected the table name to `tiket`
            $resultIP = $queryIP->getRow();  // Fetch the single row result            
                
            // Count from the `tiket` table where status is 'Closed'
            $queryH = $this->db->query("SELECT COUNT(tiket_id) as total FROM `view_tiket_details` WHERE cabang_id in ($cabangId) AND status = 'Reject' OR status = 'Solved'");  // Corrected the table name to `tiket`
            $resultH = $queryH->getRow();  // Fetch the single row result                        

            return [                
                'tiket' => (int) $result->total,  // Added missing semicolon
                'finish' => (int) $resultF->total,  // Corrected and added missing semicolon
                'inProgress' => (int) $resultIP->total,  // Corrected and added missing semicolon
                'hold' => (int) $resultH->total  // Corrected and added missing semicolon
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

}
