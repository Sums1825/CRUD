<!doctype html>
<html lang="en">

<head>
    <title>Header & Details Exam</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/fh-3.2.2/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Header & Details Exam</h1>
    <table style="width: 500px;">
        <form action="action.php" method="POST" id="myForm">
            <label for=" fname">Fetcher Code:</label>&nbsp;&nbsp;
            <input type="text" id="xfcode" name="xfcode"><br>
            <label for="lname">Fetcher Name:</label>&nbsp;
            <input type="text" id="xfname" name="xfname"><br>
            <label for="lname">Contact No.:</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" id="xcont" name="xcont"><br>
            <label for="validationDefault04" class="form-label">Registered Date
                :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="date" id="txt_reg_date" name="txt_reg_date" required><br><br>

            </script>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <input type="hidden" name="chk_isactive" value="0"> -->
            <input type="checkbox" name="chk_isactive" value="1"> Active


            <tr>
                <th>Student Code</th>
                <th>Relationship</th>

            </tr>
            <?php
            
            for($i = 1; $i <= 5 ; $i++){

            ?>
            <tr>
                <td> <select name="xstud<?php echo $i ?>" id="xstud_code">
                        <option value=""></option>
                        <option value="Student 01">Student 01</option>
                        <option value="Student 02">Student 02</option>
                        <option value="Student 03">Student 03</option>
                        <option value="Student 04">Student 04</option>
                        <option value="Student 05">Student 05</option>
                    </select></td>
                <td>
                    <input type="text" id="xrel" name="xrel<?php echo $i ?>"><br>
                </td>
            </tr>
            <?php }
           ?>










    </table>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Save" name="btn_save" id="btn_save">
    <a href="print_db.php"> <input type="button" value="Print"></a>
    </form>
    <div id="response-msg"></div>

    <script>
    $(document).ready(function() {

        $("#btn_save").click(function(e) {
            if ($("#myForm")[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#myForm").serialize() + "&action=insert",
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: 'Added Successfully!',
                            icon: 'success'
                        })
                        // $('#addModal').modal('hide');
                        $("#myForm")[0].reset();
                        // showAllEmployee();
                    }
                });
            }
        });
    });
    </script>

</body>

</html>