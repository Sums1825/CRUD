<?php include_once('connection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="padding: 100px;">
    <form class="row g-3" style="background-color:aliceblue;" action="" method="POST">
        <table class="table table-success table-striped" style="width: 200px;">
            <thead>
                <tr>
                    <th scope=" col">Lastname</th>
                    <th scope="col">Middlename</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = conn();
                $sOptions = '';
                $sortBy = '';
                $orderby = '';

                if (isset($_POST['refresh'])) {
                    $Sname = $_POST['fname'];
                    $sOptions = $_POST['Soption'];
                    $sortBy = $_POST['Sortby'];
                    $orderby = $_POST['orderby'];

                    if ($sOptions == 'anywhere' && $sortBy == 'Fname' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY Fname ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Fname' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY Fname DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Mname' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY Mname DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Mname' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY Mname ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Lname' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY Lname DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Lname' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY Lname ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Age' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY age DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'anywhere' && $sortBy == 'Age' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '%$Sname%' ORDER BY age ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Fname' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY Fname ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Fname' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY Fname DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Lname' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY Lname ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Lname' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY Lname DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Mname' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY Mname ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Mname' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY Mname DESC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Age' && $orderby == 'ascen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY age ASC ";
                        $result = $con->query($view);
                    } elseif ($sOptions == 'left'  && $sortBy == 'Age' && $orderby == 'descen') {
                        $view = "SELECT * FROM persons WHERE Fname LIKE '$Sname%'  ORDER BY age DESC ";
                        $result = $con->query($view);
                    }

                    if ($result->num_rows > 0) {
                        $counter = 0;
                        $counTot = 0;
                        $countAgeLess = 0;
                        $countAgeGre = 0;
                        while ($row = $result->fetch_assoc()) {
                            $counter++;

                ?>
                            <tr>
                                <th scope="row"><?php echo  $row['Lname']; ?></th>
                                <td><?php echo  $row['Mname']; ?></td>
                                <td><?php echo  $row['Fname']; ?></td>
                                <td><?php echo  $row['age']; ?></td>

                            </tr>
                        <?php
                            $sum = array_sum(explode(',', $row['age']));
                            $counTot = $sum + $counTot;
                            if ($row['age'] < 40) {
                                $countAgeLess++;
                            } elseif ($row['age'] > 40) {
                                $countAgeGre++;
                            }
                        }
                    } else { ?>
                        <tr>
                            <th scope="row">NO</th>
                            <td><b>RECORDS</td></b>

                        </tr>
                <?php
                    }
                }

                ?>
            </tbody>
        </table>

        <div class="col-md-8"><b>First Name</b>
            <input type="text" aria-describedby="basic-addon1" name="fname">
            <label for="validationDefault05" class="form-label"><b>Search Options</b></label>
              <input type="radio" name="Soption" value="left" required> Left Most
              <input type="radio" name="Soption" value="anywhere" required> Anywhere
            <button type="submit" class="btn btn-primary" name="refresh">Refresh</button>

            <div class="col-md-8"><b>Sort By</b>
                  <input type="radio" name="Sortby" value="Fname" required>First Name
                  <input type="radio" name="Sortby" value="Mname" required> Middle Name
                  <input type="radio" name="Sortby" value="Lname" required> Last Name
                  <input type="radio" name="Sortby" value="Age" required> Age
                <div class="col-md-5">
                      <input type="radio" name="orderby" value="ascen" required> Ascending<br>
                      <input type="radio" name="orderby" value="descen" required> Descending
                </div>
            </div>

            Total of all Age:
            <input type="number" readonly style="width: 40px;" value="<?php echo $counTot; ?>"><Br><Br>
            Total of Ages Less than 40:
            <input type="number" readonly style="width: 40px;" value="<?php echo $countAgeLess; ?>"><Br><Br>
            Total Count of all persons:
            <input type="number" readonly style="width: 40px;" value="<?php echo $counter; ?>"><Br><Br>
            Total Count of persons age greater than 40;
            <input type="number" readonly style="width: 40px;" value="<?php echo $countAgeGre; ?>">

    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>