<?php namespace App\Department;

use App\Database\Database;

class DepartmentController{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAll()
    {
        return $this->db->selectAll('departments');
    }

    public function addToDepartment($data)
    {
        return $this->db->addData('departments', $data);
    }

    public function updatedepartment($id, $data)
    {
        return $this->db->updateData('departments', $id, $data);
    }

    public function delete($id)
    {
        return $this->db->deleteData('departments', $id);
    }

    public function findById($id)
    {
        return $this->db->findById('departments', $id);
    }

    public function redirect()
    {
        header('Location: index.php');
        exit;
    }
}