<?php
require("connections/connection.php");
header("Expires: Tuesday, 12 April 2022 04:00:00 GMT");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Records</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/login.css" rel="stylesheet" />

    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<style>
    #iframe {
        width: 100%;
        height: 180px;
    }

    .option1 {
        font-size: 25px;
        font-family: 'Times New Roman', Times, serif;
        border-color: blue;
        color: yellow;
        background-color: gray;
        padding: 20px;
        text-transform: capitalize;
        cursor: crosshair;
    }

    .overflow {
        background-color: lightblue;
        width: 110px;
        height: 110px;
        overflow: scroll;
        margin-left: 80px;
        text-decoration: underline;
    }
</style>
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
                <?php loginuser(); ?>
            </div>

        </div>

    </header>

    <iframe src="iframe.html" id="iframe">
    </iframe>
    <ul>
        <li>1</li>
        <li>2</li>
        <li>3</li>

    </ul>
    <ol>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <p>Day <span style="color:blue">1</span> Sample Program.</p>

    </ol>
    <select name="cars" id="cars" class="option1">
        <option value="BMW">BMW</option>
        <option value="Honda">Honda</option>
        <option value="Ferrari">Ferrari</option>
        <option value="audi">Audi</option>
    </select>
    <p class="overflow">One Piece (stylized in all caps) is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in Shueisha's shōnen manga magazine Weekly Shōnen Jump since July 1997, with its individual chapters compiled into 102 tankōbon volumes as of April 2022. The story follows the adventures of Monkey D. Luffy, a boy whose body gained the properties of rubber after unintentionally eating a Devil Fruit. With his pirate crew, the Straw Hat Pirates, Luffy explores the Grand Line in search of the world's ultimate treasure known as the "One Piece" in order to become the next King of the Pirates</p>

    <?php
    $favdog = "loki";

    switch ($favdog) {
        case "loki":
            echo "Your favorite dog is loki!";
            break;
        case "max":
            echo "Your favorite dog is max!";
            break;
        case "summer":
            echo "Your favorite dog is summer!";
            break;

        default:
            echo "Your favorite dog is neither loki, max, nor summer!";
    }
    echo "<br>";
    $sample = '2';
    if ($sample == '2') {
        echo "sample is " . $sample;
    } elseif ($sample == '3') {
        echo "sample is " . $sample;
    } else {
        echo sha1($sample);
        echo "<br>";
        echo md5($sample);
    }
    echo "<br>";
    echo (round(0.20) . "<br>");
    echo (round(0.50) . "<br>");

    ob_start();
    echo "Your favorite dog is " . $favdog;
    ob_end_clean();
    echo "Your favorite dog is " . $favdog;
    echo "<br>";

    ob_start();
    echo "Your favorite dog is " . $favdog;
    ob_end_flush();
    echo "<br>";

    $cars = array("Honda", "BMW", "Toyota");
    echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
    echo "<br>";
    echo count($cars);
    echo "<br>";

    $str = '<a href="https://www.youtube.com">Go to youtube.com</a>';
    echo htmlentities($str);
    echo "<br>";
    $str1 = addslashes('Your "favorite" dog is ' . $favdog);
    echo ($str1);
    echo "<br>";
    echo stripslashes($str1);
    echo "<br>";
    $gender = array("Loki" => "Male", "Max" => "Male", "Summer" => "Female");
    echo "Summer is " . $gender['Summer'];
    echo "<br>";

    $dogs = array(
        array("Loki", "Male", 3),
        array("Max", "Male", 2),
        array("Summer", "Female", 1)
    );
    echo $dogs[0][0] . ": is " . $dogs[0][1] . ", years: " . $dogs[0][2] . ".<br>";
    echo $dogs[1][0] . ": is " . $dogs[1][1] . ", years: " . $dogs[1][2] . ".<br>";
    echo $dogs[2][0] . ": is " . $dogs[2][1] . ", years: " . $dogs[2][2] . ".<br>";

    print_r(explode(" ", $str1));
    $str1 = array('Your', 'favorite', 'dog', 'is');
    echo implode(" ", $str1);
    echo "<br>";

    echo str_replace("world", "Loki", "Hello world!");
    $dogsnum = array(2, 4, 6, 8, 10);
    $samplestr = "Hello World!";
    echo "<br>";
    echo strlen($str);
    echo "<br>";
    echo substr("youtube", 3);
    echo "<br>";
    echo trim($samplestr, "o World!");
    echo "<br>";
    echo strrev($samplestr);
    echo "<br>";
    echo strpos($samplestr, "World!");
    echo "<br>";
    echo (min($dogsnum));
    echo "<br>";
    echo (max($dogsnum));
    echo "<br>";
    echo (abs(6.7));
    echo "<br>";
    echo strtoupper($samplestr);
    echo "<br>";
    echo strtolower($samplestr);
    echo "<br>";
    addGlobal();
    echo $z;
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];

    ?>
    <h1>JavaScript</h1>

    <button type="button" onclick="onclickdate()"> Date </button>
    <p id="date"> </p>
    <input type="text" onkeypress="keypress()" placeholder="keypress">
    <input type="text" onkeydown="keydown()" placeholder="onkeydown">
    <input type="text" onblur="keyblur()" placeholder="onblur">

    <h1 id="mouseover" onmouseover="mouseOver()" onmouseout="mouseOut()">Mouse over me</h1>

    <button type="button" onclick="confirmbutton()">Confirm</button>
    <br> <br>
    <button type="button" onclick="parseint()">ParseInt()</button>
    <p id="parseint"></p>

    <button type="button" onclick="substr()">SubString</button>
    <p id="substr"></p>

    <button type="button" onclick="lowcase()">LowerCase</button>
    <p id="lowcase"></p>

    <button type="button" onclick="upcase()">UpperCase</button>
    <p id="upcase"></p>

    <button type="button" onclick="mathround()">Math.Round</button>
    <p id="rnd"></p>





    <a href="jquery.php">Jquery</a>







    </s>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php require_once("footer.php"); ?>

</html>