<?php

function connection()
{

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "employeedb";

    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error) {
        echo $con->connect_error;
    } else {
        return $con;
    }
}

function userLogin()
{
    $con = connection();
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";

        $user = $con->query($sql) or die($con->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;

        if ($total > 0) {
            echo header("location: create.php");
        } else {
            echo " No user found.";
        }
    }
}

function insertdata()
{
    if (isset($_POST['submit'])) {
        $con = connection();
        // $x = stripslashes($x);
        // $x = mysqli_real_escape_string($connection, $x);
        // $x = (int) filter_var($x, FILTER_SANITIZE_NUMBER_INT);
        $fname = $_POST['fullname'];
        $id = $_POST['id'];
        $contact = $_POST['contact'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['Gender'];
        $age = $_POST['age'];
        $status = $_POST['status'];
        $active = $_POST['active'];


        $sql = "INSERT INTO `employeefile`( `recid`,`fullname`, `address`, `birthdate`, `age`, `gender`, `civilstat`, `contactnum`, `salary`, `isactive`) 
        VALUES ('$id','$fname','$address',' $birthday','$age ','$gender','$status','$contact','$salary','$active')";
        $con->query($sql) or die($con->error);
    }
}
