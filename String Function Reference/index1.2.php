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
    <form action="" method="POST">
        <table class="table">
            <input type="submit" name="GetMonth" value="Get Month">
            <?php
            include('code.php');
            if (isset($_POST['GetMonth'])) {
                $stringvertical = 'January-Febraury\March,April May;June:July]August/September.October|November#December';
                $cleanstr =  cleanChars($stringvertical);
                $stringarray = explode(' ', $cleanstr);
                $count = 0;
            ?>
                <thead>
                    <tr>
                        <th scope="col">Sort</th>
                        <th scope="col">Month</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($stringarray as $str) {
                            $count = $count + 1;


                        ?>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $str, '</br>'; ?></td>

                    </tr>
            <?php  }
                    } ?>
                </tbody>
        </table>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>