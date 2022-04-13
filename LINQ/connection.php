<?php
function conn()
{
    $database = 'linq';
    $username = 'root';
    $password = '';
    $host = 'localhost';



    $con = new mysqli($host, $username, $password, $database);

    if ($con->connect_error) {
        echo $con->connect_error;
    } else {

        return $con;
    }
}
