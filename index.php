<?php require_once 'db_config.php' ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD_AJAX_PDO</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/fh-3.2.2/datatables.min.css" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#"><i class="fab fa-wolf-pack-battalion"></i>Employees Record</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class=" text-center text-danger font-weight-normal my-3"> Employees Data</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mt-2 text-pri"> All Employee On Database</h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i class="fas fa-user-plus fa-lg"></i>&nbsp;&nbsp;Add New Employee</button>
                <a href="#" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i>&nbsp;&nbsp;Export to Excel</a>
            </div>
        </div>
        <hr class="my-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="showEmployee">
                </div>
            </div>
        </div>
    </div>
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <!-- Add New Employee Modal -->
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">


                                <h4 class="modal-title">Add New Employee</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="POST" id="form-data" class="row g-3">
                                    <div class="col-md-2">
                                        <label for="recid" class="form-label">Record ID</label>
                                        <input type="text" class="form-control" value="" name="txt_recid" required>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault01" class="form-label">Employee Full Name</label>
                                        <input type="text" class="form-control" id="validationDefault01" value="" name="txt_fullname" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationDefault02" class="form-label">Contact No:</label>
                                        <input type="int" class="form-control" id="validationDefault02" placeholder="0931xxxxxxx" name="txt_contact" value="" onkeyup="numberonly(this)" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationDefault02" class="form-label">Salary</label>
                                        <input type="integer" class="form-control" id="validationDefault23" name="txt_salary" value="" onkeyup="numberonly(this)" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="validationDefault03" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="validationDefault234" name="txt_address" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationDefault04" class="form-label">Birth Date</label>
                                        <input type="date" id="birthday" class="form-control" id="validationDefault03" name="txt_birthday" required>
                                    </div>

                                    <div class="col-md-3"> <br>
                                        <label for="validationDefault04" class="form-label">Civil Status</label>
                                        <br>
                                        <select name="sel_status">
                                            <option value=" Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Seperated">Seperated</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1.5"><br>
                                        <label for="validationDefault05" class="form-label">Age</label>
                                        <input type="number" name="txt_age" class="form-control" id="validationDefault05" min="1" max="110" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="hidden" class="form-control" id="validationDefault05" min="1" max="110" required>
                                    </div>
                                    <div class="col-md-3"><br>
                                        <label for="validationDefault05" class="form-label">Gender</label><br>
                                          <input type="radio" name="rdo_Gender" value="Male" required> Male
                                          <input type="radio" name="rdo_Gender" value="Female" required> Female
                                          <input type="radio" name="rdo_Gender" value="Other" required> Other
                                    </div>
                                    <div class="col-md-1"><br>
                                        <input type="hidden" name="chk_isactive" value="0">
                                        <input type="checkbox" name="chk_isactive" value="1"> Active

                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-danger" type="submit" name="btn_addEmployee" id="btn_addEmployee" value="Add New Employee"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <header class="py-5 bg-light border-bottom mb-4">
                    <div class="container">
                        <div class="text-center my-5">
                            <!-- Edit Employee Modal -->
                            <div class="modal fade" id="editModal">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">


                                            <h4 class="modal-title">Edit Employee</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="" method="POST" id="edit-form-data" class="row g-3">
                                                <div class="col-md-2">
                                                    <label for="recid" class="form-label">Record ID</label>
                                                    <input type="text" class="form-control" id="txt_recid" value="" name="txt_recid" readonly>

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationDefault01" class="form-label">Employee Full Name</label>
                                                    <input type="text" class="form-control" id="txt_fullname" value="" name="txt_fullname" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="validationDefault02" class="form-label">Contact No:</label>
                                                    <input type="int" class="form-control" id="txt_contact" placeholder="0931xxxxxxx" name="txt_contact" value="" onkeyup="numberonly(this)" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationDefault02" class="form-label">Salary</label>
                                                    <input type="integer" class="form-control" number_format id="txt_salary" name="txt_salary" value="" onkeyup="numberonly(this)" required>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="validationDefault03" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="txt_address" name="txt_address" required>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="validationDefault04" class="form-label">Birth Date</label>
                                                    <input type="date" class="form-control" id="txt_birthday" name="txt_birthday" required>
                                                </div>

                                                <div class="col-md-3"> <br>
                                                    <label for="validationDefault04" class="form-label">Civil Status</label>
                                                    <br>
                                                    <select name="sel_status" id="sel_status">
                                                        <option value="Single" id="sel_status">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Seperated">Seperated</option>
                                                        <option value="Widowed">Widowed</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1.5"><br>
                                                    <label for="validationDefault05" class="form-label">Age</label>
                                                    <input type="number" name="txt_age" class="form-control" id="txt_age" min="1" max="110" required>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="hidden" class="form-control" id="validationDefault05" min="1" max="110" required>
                                                </div>
                                                <div class="col-md-3"><br>
                                                    <label for="validationDefault05" class="form-label">Gender</label><br>
                                                      <input type="radio" name="rdo_Gender" id="rdo_Gender" value="Male" required> Male
                                                      <input type="radio" name="rdo_Gender" id="rdo_Gender" value="Female" required> Female
                                                      <input type="radio" name="rdo_Gender" id="rdo_Gender" value="Other" required> Other
                                                </div>
                                                <div class="col-md-1"><br>
                                                    <input type="hidden" name="chk_isactive" id="chk_isactive" value="0">
                                                    <input type="checkbox" name="chk_isactive" id="chk_isactive" value="1"> Active

                                                </div>
                                                <div class="col-12">
                                                    <input type="submit" class="btn btn-danger" type="submit" name="btn_editEmployee" id="btn_editEmployee" value="Update Record"></input>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
                            </script>
                            <!-- jQuery library -->

                            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                            <!-- Popper JS -->
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                            <!-- Latest compiled JavaScript -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
                            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/fh-3.2.2/datatables.min.js"></script>
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    showAllEmployee();
                                    //show
                                    function showAllEmployee() {
                                        $.ajax({
                                            url: "action.php",
                                            type: "POST",
                                            data: {
                                                action: "view"
                                            },
                                            success: function(response) {
                                                // console.log(response);
                                                $("#showEmployee").html(response);
                                                $("table").DataTable({});
                                            }
                                        });
                                    }
                                    //add
                                    $("#btn_addEmployee").click(function(e) {
                                        if ($("#form-data")[0].checkValidity()) {
                                            e.preventDefault();
                                            $.ajax({
                                                url: "action.php",
                                                type: "POST",
                                                data: $("#form-data").serialize() + "&action=insert",
                                                success: function(response) {
                                                    Swal.fire({
                                                        title: 'Added Successfully!',
                                                        type: 'success'
                                                    })
                                                    $('#addModal').modal('hide');
                                                    $("#form-data")[0].reset();
                                                    showAllEmployee();
                                                }
                                            });
                                        }
                                    });
                                    //edit
                                    $("body").on("click", ".editBtn", function(e) {
                                        e.preventDefault();
                                        edit_id = $(this).attr('id');
                                        $.ajax({
                                            url: "action.php",
                                            type: "POST",
                                            data: {
                                                edit_id: edit_id
                                            },
                                            success: function(response) {
                                                xdata = JSON.parse(response);
                                                console.log(xdata);



                                                $("#txt_recid").val(xdata.recid);
                                                $("#txt_fullname").val(xdata.fullname);
                                                $("#txt_contact").val(xdata.contactnum);
                                                $("#txt_salary").val(xdata.salary);
                                                $("#txt_address").val(xdata.address);
                                                $("#txt_birthday").val(xdata.birthdate);
                                                $("#sel_status").val(xdata.civilstat);
                                                $("#txt_age").val(xdata.age);
                                                $("#rdo_Gender").val(xdata.gender);
                                                $("#chk_isactive").val(xdata.isactive);
                                            }
                                        });
                                        // console.log("working");
                                    });
                                    //update
                                    $("#btn_editEmployee").click(function(e) {
                                        if ($("#edit-form-data")[0].checkValidity()) {
                                            e.preventDefault();
                                            $.ajax({
                                                url: "action.php",
                                                type: "POST",
                                                data: $("#edit-form-data").serialize() + "&action=update",
                                                success: function(response) {

                                                    Swal.fire({
                                                        title: 'Updated Successfully!',
                                                        type: 'success'
                                                    })
                                                    $('#editModal').modal('hide');
                                                    $("#edit-form-data")[0].reset();
                                                    showAllEmployee();
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
</body>

</html>