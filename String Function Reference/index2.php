<?php
$Lname = ['Viceral', 'Navarro', 'Nacianceno', 'Curtis-Smith', 'Hilario'];
$Mname = ['Borja', 'Hipolito', 'Pacheco', ' ', 'Viernes'];
$Fname = ['Jose Marie', 'Ferdinand', 'Rodel', 'Anne', 'Virgilio'];


$newArray = array();
foreach ($Mname as $value) {
    if (empty($newArray[$value[0]])) {
        $newArray[$value[0]][] = $value[0];
    }
    $newArray[$value[0]][] = $value;
}


$mi = new MultipleIterator();
$mi->attachIterator(new ArrayIterator($Lname));
$mi->attachIterator(new ArrayIterator($newArray));
$mi->attachIterator(new ArrayIterator($Fname));


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Last Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">First Name</th>
            </tr>
        </thead>
        <?php
        foreach ($mi as $value) {
            list($Lname, $newArray, $Fname) = $value;
        ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $Lname; ?></th>
                    <td><?php echo $newArray[1]; ?></td>
                    <td><?php echo $Fname; ?></td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
    <br> <br> <br>
    <form action="" method="POST">
        <input type="submit" name="GetFullname" value="Get Full Name"><br>
        <?php
        if (isset($_POST['GetFullname'])) {
            foreach ($mi as $value) {
                list($Lname, $newArray, $Fname) = $value;
                echo $Lname, ', ', $Fname, '  ', $newArray[0], '.</br>', PHP_EOL;
            }
        } ?>


    </form>
    </ <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>