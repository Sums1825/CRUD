<?php
require_once 'db_config.php';
$xdb = new Database();
if (isset($_POST['action']) && $_POST['action'] == "view") {
    $xoutput = "";
    $xdata = $xdb->PDO_view();
    if ($xdb->PDO_totalRowCount() > 0) {
        $xoutput .= ' <table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>Record ID</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($xdata as $xrs)
            $xoutput .= ' <tr class="text-center text-secondary">
            <td>' . $xrs['recid'] . '</td>
            <td>' . $xrs['fullname'] . '</td>
            <td>' . $xrs['address'] . '</td>
            <td>
            <a href="$" title="View Details" class="text-success infoBtn" id="' . $xrs['recid'] . '"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
           
            <a href="$" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="' . $xrs['recid'] . '"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
        
            <a href="$" title="Delete" class="text-danger delBtn" id="' . $xrs['recid'] . '"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
            </td> </tr>
            ';
    }
    $xoutput .= '</tbody></table>';
    echo $xoutput;
} else {
}
if (isset($_POST['action']) && $_POST['action'] == "insert") {
    $xrecid = $_POST['txt_recid'];
    $xfname = $_POST['txt_fullname'];
    $xcont = $_POST['txt_contact'];
    $xsal = $_POST['txt_salary'];
    $xadd = $_POST['txt_address'];
    $xbday = $_POST['txt_birthday'];
    $xstat = $_POST['sel_status'];
    $xage = $_POST['txt_age'];
    $xgen = $_POST['rdo_Gender'];
    $xactive = $_POST['chk_isactive'];

    $xdb->PDO_insert($xrecid, $xfname, $xcont, $xsal, $xadd, $xbday, $xstat, $xage, $xgen, $xactive);
}
if (isset($_POST['edit_id'])) {
    $xrecid = $_POST['edit_id'];

    $xrow = $xdb->PDO_getByID($xrecid);
    echo json_encode($xrow);
}

if (isset($_POST['action']) && $_POST['action'] == "update") {
    $xrecid = $_POST['txt_recid'];
    $xfname = $_POST['txt_fullname'];
    $xcont = $_POST['txt_contact'];
    $xsal = $_POST['txt_salary'];
    $xadd = $_POST['txt_address'];
    $xbday = $_POST['txt_birthday'];
    $xstat = $_POST['sel_status'];
    $xage = $_POST['txt_age'];
    $xgen = $_POST['rdo_Gender'];
    $xactive = $_POST['chk_isactive'];

    $xdb->PDO_update($xrecid, $xfname, $xcont, $xsal, $xadd, $xbday, $xstat, $xage, $xgen, $xactive);
}
