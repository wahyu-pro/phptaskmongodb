<?php

namespace App\Database;

// require __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;

class Database
{
    public $connect;
    public function __construct()
    {
        $this->connect = new Client('mongodb://127.0.0.1:27017');
    }

    public function selectAll($table)
    {
        return $this->connect->employees->$table->find([]);
    }

    public function findById($table, $id)
    {
        return $this->connect->employees->$table->findOne($id);
    }

    public function addData($table, $data)
    {
        return $this->connect->employees->$table->insertOne($data);
    }

    public function updateData($table, $id, $data)
    {
        return $this->connect->employees->$table->UpdateOne($id, ['$set' => $data]);
    }

    public function deleteData($table, $id)
    {
        return $this->connect->employees->$table->deleteOne($id);
    }

    public function join($clc_from, $clc_refr, $field_frm, $field_rfr, $as)
    {
        $join = (object)[
            '$lookup' => [
                'from' => $clc_refr,
                'localField' => $field_frm,
                'foreignField' => $field_rfr,
                'as' => $as
            ]
        ];

        $result = $this->connect->employees->$clc_from->aggregate([$join]);
        return $result;
    }
}

// $db = new Database();
// $data = [
//     'firstname' => 'wahyu',
//     'lastname' => 'iya'
// ];

// $db->addData('employe', $data);
// var_dump($db->selectAll('employe'));
// $apa = $db->selectAll('employe');
// var_dump($apa->firstname);
// foreach ($apa as $iya) {
//     var_dump($iya);
// }

// $db->updateData('employe', ['firstname' => 'wahyu'], $data);

// $db->deleteData('employe');

// $result = $db->join('employe', 'departments', 'dept_no', 'dept_no', 'resJoin');
// foreach ($result as $key) {
//     var_dump($key);
// }
