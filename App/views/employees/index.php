<?php

require __DIR__ . "/../../../vendor/autoload.php";

use App\Employee\EmployeeController;
use App\Department\DepartmentController;

$employee = new EmployeeController();
$departments = new DepartmentController();

if (isset($_POST['add'])) {
    $employee->addToEmployee(["emp_no" => $_POST["emp_no"], "firstname" => $_POST["firstname"], "lastname" => $_POST["lastname"], "departments" => $_POST["dept_no"]]);
}

if (isset($_REQUEST['delete'])){
    $employee->delete(['emp_no' => $_GET['id']] );
    $employee->redirect();
}

// if(isset($_REQUEST['edit'])){
//     $arg = [
//         'firstname' => $_POST['firstname'],
//         'lastname' => $_POST['lastname']
//     ];

//     $id = (object)[
//         'emp_no' => $_REQUEST['id']
//     ];
//     $employee->updateEmployee($arg, $id);
// }

// if (isset($_REQUEST['value'])) {
//     $valEdit = [
//         "firstname" => $_POST['firstname'],
//         "lastname" => $_POST['lastname']
//     ];

//     // echo $employee->findById(['emp_no' => $_POST['emp_no']]);
// }

$data = $employee->selectAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mockup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- font  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../style.css">

</head>

<body>

    <nav class="navbar shadow navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- <a class="nav-item nav-link active" href="#">User <span class="sr-only">(current)</span></a> -->
                <a class="nav-item nav-link" href="http://localhost:33/app/views/employees/index.php">Employees</a>
                <a class="nav-item nav-link" href="http://localhost:33/app/views/departments/index.php">Departments</a>
            </div>
        </div>
        <button type="button" class="btn btn-cream mr-3 shadow modalAdd" data-toggle="modal" data-target="#exampleModal">Add</button>
    </nav>
    <div class="container">
        <table class="table shadow mt-3">
            <thead class="thead-cream">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['firstname']." ".$row['lastname']; ?></td>
                        <td><?= $row['resJoin'][0]['dept_name']; ?></td>
                        <td>
                            <a href="http://localhost:33/app/views/employees/ubah.php?id=<?= $row['firstname']; ?>" class="btn-outline-primary"><i class="fa fa-edit"></i></a>
                            <a href="http://localhost:33/app/views/employees/index.php?delete&id=<?= $row['emp_no']; ?>" class="btn-outline-danger"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <div class="form-group">
                            <input type="number" class="form-control" id="emp_no" name="emp_no" placeholder="Input Employee number ...">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Input firstname ...">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Input lastname ...">
                        </div>
                        <div class="form-group">
                            <label>Departments</label>
                            <select class="custom-select" name="dept_no" id="dept_no" required>
                                <option selected disabled value="">Choose...</option>
                                <?php foreach ($departments->selectAll() as $dept) : ?>
                                    <option value='<?= $dept["dept_no"] ?>'><?= $dept["dept_name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="add" class="btn btn-save">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- <script src="/../../jquery.js"></script> -->
    <script src="/../../script.js"></script>
</body>

</html>