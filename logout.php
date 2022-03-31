<?php {
    session_start();
    unset($_SESSION['User']);
    echo header("location: log_in.php");
}
