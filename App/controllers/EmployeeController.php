<?php

namespace App\Employee;

use App\Database\Database;

class EmployeeController
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAll()
    {
        return $this->db->join('employe', 'departments', 'departments', 'dept_no', 'resJoin');
    }

    public function addToEmployee($data)
    {
        return $this->db->addData('employe', $data);
    }

    public function updateEmployee($id, $data)
    {
        return $this->db->updateData('employe', $id, $data);
    }

    public function delete($id)
    {
        return $this->db->deleteData('employe', $id);
    }

    public function getById($id)
    {
        return $this->db->findById('employe', $id);
    }

    public function redirect()
    {
        header('Location: index.php');
        exit;
    }
}
