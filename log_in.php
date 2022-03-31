<?php
require_once("connections/connection.php");
if (!isset($_SESSION)) {
    session_start();
}
$con = connection();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";

    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if ($total > 0) {
        $_SESSION['User'] = $row['username'];

        echo header("location: create.php");
    } else {
        echo " No user found.";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Records</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/app.js"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Employees Record</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
    </div>
</nav>

<body>
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">

                <form method="POST" action="">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Username</label>
                        <input type="text" class="form-control" id="validationDefault01" value="" name="username" required>
                    </div>

                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1 " required>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </header>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>