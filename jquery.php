<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
    $(document).ready(function() {
      $("#but0").click(function() {
        $("p").slideToggle();
      });
    });

    $(function() {
      $("#datepicker").datepicker();
    });

    $(function() {
      var availableTags = [
        "C",
        "C++",
        "Java",
        "JavaScript",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
      ];
      $("#tags").autocomplete({
        source: availableTags
      });
    });

    $(document).ready(function() {
      $("#but1").click(function() {
        $("img").attr("width", "500");
      });
    });

    $(document).ready(function() {
      $("#btn1").click(function() {
        $(".phide").hide();
      });

      $("#btn2").click(function() {
        $(".phide").show();
      });
    });

    $("#bb").html(
      $.trim("     A computer science portal for geeks     "));

    $(function() {
      $("#dialog").dialog();
    });

    $(function() {
      $("#tabs").tabs();
    });

    $(document).ready(function() {
      $("#inputbut").click(function() {
        $("input:text").val("Mandie Sumang");
      });
    });

    $(document).ready(function() {
      $("#butcss").click(function() {
        $(".pcss").css({
          "background-color": "yellow",
          "font-size": "200%"
        });
      });
    });

    $(document).ready(function() {
      $("#Serbut").click(function() {
        $("div").text($("form").serialize());
      });
    });

    $(document).ready(function() {
      $("#eachbut").click(function() {
        $("li").each(function() {
          alert($(this).text())
        });
      });
    });

    $(document).ready(function() {
      $(".pclick").bind("click", function() {
        alert("The paragraph was clicked.");
      });
    });

    $(document).ready(function() {
      $("span").parent().css({
        "color": "red",
        "border": "2px solid red"
      });
    });
    $(document).ready(function() {
      $("#clonebut").click(function() {
        $(".pclone").clone().appendTo("body");
      });
    });

    console.log("Mandie Sumang");
  </script>
</head>


<body class="first">

  <p>.ready() Sample</p>
  <button id="but0">Click me</button>

  <p>Date: <input type="text" id="datepicker"></p>

  <div class="ui-widget">
    <label for="tags">Tags: </label>
    <input id="tags">
  </div>

  <img src="images/iframe.jpg" width="284" height="213"><br>
  <button id="but1">Set the width attribute of the image</button>
  </br>
  <p class="phide">Sample Hide and Show.</p>
  <button id="btn1">Hide</button>
  <button id="btn2">Show</button>

  <p class="ptrim"> " b l a bla blaaa "</p>


  <h3>trim() method</h3>
  <p id="bb"></p>

  <div id="dialog" title="Dialog Box(Modal)">
    <p>Sample Modal</p>
  </div>

  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">Sample Tab1</a></li>
      <li><a href="#tabs-2">Tab 2</a></li>
    </ul>
    <div id="tabs-1">
      <p>sample tab 1 bla bla bla </p>
    </div>
    <div id="tabs-2">
      <p>sample tab 2 bla bla bla </p>
    </div>

  </div>

  <p>Name: <input type="text" name="user"></p>

  <button id="inputbut">Mandie Sumang</button>

  <p class="pcss" style="background-color:red">This is a Sample CSS.</p>
  <p class="pcss" style="background-color:green">This is a Sample CSS.</p>
  <p class="pcss" style="background-color:blue">This is a Sample CSS.</p>

  <button id="butcss">Return background-color of p</button>

  <form action="">
    First name: <input type="text" name="FirstName" value="Mandie"><br>
    Last name: <input type="text" name="LastName" value="Sumang"><br>
  </form>

  <button id="Serbut">Serialize form values</button>

  <br>
  <button id="eachbut">.each Sample</button>
  <ul>
    <li>Loki</li>
    <li>Max</li>
    <li>Summer</li>
  </ul>


  <br>

  </script>
  </head>



  <p class="pclick">Click me!</p>


  <p class="pclone">This is a sample Cloning.</p>
  <p class="pclone">This is another sample Cloning.</p>

  <button id="clonebut">Sample Clone</button>

</body>

</html>