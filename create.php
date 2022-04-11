<?php
include_once("connections/connection.php");
loginuser();

insertdata();

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
                        <input type="text" class="form-control" id="validationDefault01" value="" name="id" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Employee Full Name</label>
                        <input type="text" class="form-control" id="validationDefault01" value="" name="fullname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Contact No:</label>
                        <input type="int" class="form-control" id="validationDefault02" placeholder="0931xxxxxxx" name="contact" value="" onkeyup="numberonly(this)" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Salary</label>
                        <input type="integer" class="form-control" id="validationDefault02" name="salary" value="" onkeyup="numberonly(this)" required>
                    </div>
                    <div class="col-md-8">
                        <label for="validationDefault03" class="form-label">Address</label>
                        <input type="text" class="form-control" id="validationDefault03" name="address" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault04" class="form-label">Birth Date</label>
                        <input type="date" id="birthday" class="form-control" id="validationDefault03" name="birthday" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">Civil Status</label>

                        <select name="status">
                            <option value=" Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Seperated">Seperated</option>
                            <option value="Widowed">Widowed</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label for="validationDefault05" class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" id="validationDefault05" min="1" max="110" required>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Gender</label><br>
                          <input type="radio" name="Gender" value="Male" required> Male
                          <input type="radio" name="Gender" value="Female" required> Female
                          <input type="radio" name="Gender" value="Other" required> Other

                    </div>
                    <div class="col-md-1">
                        <input type="hidden" name="isactive" value="0">
                        <input type="checkbox" name="isactive" value="1"> Active

                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
                    </div>

                </form>
                <?php echo "Welcome " . $_SESSION["User"]; ?>

            </div>
        </div>
    </header>






    <script type="text/javascript">
        function numberonly(input) {
            var num = /[^0-9]/gi;
            input.value = input.value.replace(num, "");
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>