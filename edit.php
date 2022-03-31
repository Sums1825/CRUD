<?php
include("connections/connection.php");

$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * From employeefile where recid = $id";
$employees = $con->query($sql) or die($con->error);
$row = $employees->fetch_assoc();


if (isset($_POST['update'])) {
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

    $sql = "UPDATE `employeefile` SET `fullname`='$fname',`address`='$address',
    `birthdate`='$birthday',`age`='$age',`civilstat`='$status',
    `contactnum`='$contact',`salary`='$salary',`gender`='$gender' ,`isactive`='$active'  WHERE `recid` = '$id'";
    $con->query($sql) or die($con->error);
    echo header("location: details.php?ID=" . $id);
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

        <p class="navbar-brand" href="#!">
        <h1 style="text-align:center;" class="navbar-brand" href="#!">Employees Record</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item"><a class="nav-link active" href="create.php">Create</a></li>
                <li class="nav-item"><a class="nav-link" href="view.php">View</a></li>

                <li class="nav-item"><a class="nav-link" href="logout.php" id="out">Logout</a></li>



            </ul>
        </div>
    </div>
</nav>


<body>


    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">


                <form class="row g-3" method="POST" action="">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Record ID</label>
                        <input type="text" class="form-control" id="validationDefault01" value="<?php echo  $row['recid']; ?>" name="id" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Employee Full Name</label>
                        <input type="text" class="form-control" id="validationDefault01" value="<?php echo  $row['fullname']; ?>" name="fullname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Contact No:</label>
                        <input type="int" class="form-control" id="validationDefault02" name="contact" value="<?php echo  $row['contactnum']; ?>" required>
                    </div>
                    <div class=" col-md-4">
                        <label for="validationDefault02" class="form-label">Salary</label>
                        <input type="integer" class="form-control" id="validationDefault02" name="salary" value="<?php echo  $row['salary']; ?>" required>
                    </div>
                    <div class=" col-md-8">
                        <label for="validationDefault03" class="form-label">Address</label>
                        <input type="text" class="form-control" id="validationDefault03" name="address" value="<?php echo  $row['address']; ?>" required>
                    </div>

                    <div class=" col-md-4">
                        <label for="validationDefault04" class="form-label">Birth Date</label>
                        <input type="date" id="birthday" class="form-control" id="validationDefault03" name="birthday" value="<?php echo  $row['birthdate']; ?>" required>
                    </div>
                    <div class=" col-md-3">
                        <label for="validationDefault04" class="form-label">Civil Status</label>
                        <select name="status">
                            <option value=" Single" <?php echo ($row['civilstat'] == "Single") ? 'selected' : ''; ?>>Single</option>
                            <option value="Married" <?php echo ($row['civilstat'] == "Married") ? 'selected' : ''; ?>>Married</option>
                            <option value="Seperated" <?php echo ($row['civilstat'] == "Seperated") ? 'selected' : ''; ?>>Seperated</option>
                            <option value="Widowed" <?php echo ($row['civilstat'] == "Widowed") ? 'selected' : ''; ?>>Widowed</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault05" class="form-label">Age</label>
                        <input type="text" name="age" class="form-control" id="validationDefault05" value="<?php echo  $row['age']; ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Gender</label><br>

                          <input type="radio" name="Gender" value="Male" <?php echo ($row['gender'] == "Male") ? 'checked' : ''; ?>> Male
                          <input type="radio" name="Gender" value="Female" <?php echo ($row['gender'] == "Female") ? 'checked' : ''; ?>> Female
                          <input type="radio" name="Gender" value="Other" <?php echo ($row['gender'] == "Other") ? 'checked' : ''; ?>> Other
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" id="active" name="active" value="1" <?php echo ($row['isactive'] == "1") ? 'checked' : ''; ?>> Active
                    </div>

                    <div class="col-12">
                        <a href="details.php?ID=<?php echo  $row['recid']; ?>"><button class="btn btn-primary btn-lg" type="submit" name="update">Back</button></a>
                        <button class="btn btn-warning btn-lg" type="submit" onclick="alert('Updated Successfully!')" name="update">Update</button>
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