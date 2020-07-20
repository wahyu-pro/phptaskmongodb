<?php

require __DIR__ . "/../../../vendor/autoload.php";

use App\Employee\EmployeeController;
use App\Department\DepartmentController;

$employee = new EmployeeController();
$departments = new DepartmentController();


// foreach ($value as $val) {
//     echo $val;
// }
// die;

$value = $employee->getById(['firstname' => $_GET['id']]);
if (isset($_POST['edit'])) {
    $value = [
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "departments" => $_POST['dept_no']
    ];

    $employee->updateEmployee(['firstname' => $_GET['id']], $value);
    $employee->redirect();
}

// var_dump($value);
// die;
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
    <br>
    <div class="container">
        <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $value->firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $value->lastname; ?>">
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
            <button type="submit" name="edit" class="btn btn-primary">Submit</button>
        </form>
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