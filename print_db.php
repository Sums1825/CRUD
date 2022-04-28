<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Fetcher File Report</h1>
    <form action="pdf_employeelist.php" method="POST" id="myForm">

        <label for="ffrom">Fetcher From:</label>&nbsp;&nbsp;
        <input type="text" id="xffrom" name="xffrom" required><br>
        <label for="xfto">Fetcher to:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="xfto" name="xfto" required><br>

        <label for="validationDefault04" class="form-label">Reg. Date From
            :</label>&nbsp;&nbsp;
        <input type="date" id="xDtefrom" name="xDtefrom" required><br>
        <label for="validationDefault04" class="form-label">Reg. Date To
            :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="date" id="xDteto" name="xDteto" required><br>

        <input type="checkbox" id="chk_display" name="chk_display" value="1">
        <label for="xdis_active"> Display Active Fetcher Only</label><br>
        <input type="checkbox" id="chk_display" name="chk_display" value="0">
        <label for="xdis_inactive"> IDisplay Inactive Fetcher Only</label><br>

        <input type="radio" id="rdo_type" name="rdo_type" value="Detailed" required>
          <label for="rdo_type">Detailed</label>
          <input type="radio" id="rdo_type" name="rdo_type" value="Summarized" required>
          <label for="rdo_type">Summarized</label><br>




        <!-- <button type="submit" class="btn btn-primary m-1 float-right" id="btn_print" name="btn_print"
            onclick="print_click('pdf')"><i class="far fa-file-pdf"></i>&nbsp;&nbsp;Print</button>
        <input type="text" name="txt_repoutput" hidden> -->
        <button type="submit" class="btn btn-danger m-1 float-left" id="btn_print" name="btn_print"
            onclick="print_click('pdf')">PRINT</button>
        <input type="text" name="txt_repoutput" hidden>
    </form>

    <!-- 
    <script>
    function print_click(xtype) {
        document.forms.myform.method = 'POST';
        document.forms.myform.target = '_blank';
        document.forms.myform.action = 'pdf_employeelist.php';
        document.forms.myform.txt_repoutput.value = xtype;
        document.forms.myform.submit();
    }
    </script> -->
</body>

</html>