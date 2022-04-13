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
    <form method="POST" action="">
        <br>
        <label>Country:</label>
        <select class="form-select" aria-label="Default select example" name="country" onchange="this.form.submit();">
            <option value="Australia" <?php echo ($_POST['country'] == 'Australia' ? 'selected' : '') ?>>Australia</option>
            <option value="England" <?php echo ($_POST['country'] == 'England' ? 'selected' : '') ?>>England</option>
            <option value="Germany" <?php echo ($_POST['country'] == 'Germany' ? 'selected' : '') ?>>Germany</option>
            <option value="Philippines" <?php echo ($_POST['country'] == 'Philippines' ? 'selected' : '') ?>>Philippines</option>
        </select>

        <label>City:</label>

        <?php
        echo '<select class="form-select" aria-label="Default select example" name="city">';;
        switch ($_POST['country']) {
            case "Australia":
                echo '<option value="Sydney">Sydney</option>
                  <option value="Melbourne">Melbourne</option>
                  <option value="Brisbane">Brisbane</option>';;
                break;
            case "England":
                echo '<option value="London">London</option>
                  <option value="Birmingham">Birmingham</option>';;
                break;
            case "Germany":
                echo '<option value="Berlin">Berlin</option>
                  <option value="Hamburg">Hamburg</option>';;
                break;
            case "Philippines":
                echo '<option value="Manila">Manila</option>
                  <option value="Quezon">Quezon</option>
                  <option value="Makati">Makati</option>';;
                break;
            default:
        }
        ?>

    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>