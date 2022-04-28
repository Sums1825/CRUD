<?php
 require_once('include/JSON.php');
require_once 'db_config.php';
$xdb= new Database();

if (isset($_POST['action']) && $_POST['action'] == "insert") {
    $xfcode = $_POST['xfcode'];
    $xfname = $_POST['xfname'];
    $xcont = $_POST['xcont'];
    $txt_reg_date = $_POST['txt_reg_date'];
    $xactive = $_POST['chk_isactive'] ? 1 : 0;
    $xstud_code1 = $_POST['xstud1'];
    $xstud_code2 = $_POST['xstud2'];
    $xstud_code3 = $_POST['xstud3'];
    $xstud_code4 = $_POST['xstud4'];
    $xstud_code5 = $_POST['xstud5'];
    $xrel1 = $_POST['xrel1'];
    $xrel2 = $_POST['xrel2'];
    $xrel3 = $_POST['xrel3'];
    $xrel4 = $_POST['xrel4'];
    $xrel5 = $_POST['xrel5'];
 $data = $_POST;
 echo "<pre>";
 var_dump($data);





//     $xqry = "INSERT INTO fetcher2 (fetcher_code,student_code,relationship)
//     VALUES (:xfcode,:xstud_code,:xrel)";
//     $xstmt = $link_id->prepare($xqry);
     
//     foreach($_POST['xrel'] as $xrel){
//         $xstmt->execute([ 'xfcode' => $xfcode,  'xstud_code' => $xstud_code, 'xrel' => $xrel]);
// }
if($xstud_code1 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"  && $xstud_code2 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" && $xstud_code3 =="Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"&& $xstud_code4 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"&& $xstud_code5 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"){
$xdb->PDO_insert2($xfcode, $xstud_code1,$xrel1 );
$xdb->PDO_insert2($xfcode, $xstud_code2,$xrel2 );
$xdb->PDO_insert2($xfcode, $xstud_code3,$xrel3 );
$xdb->PDO_insert2($xfcode, $xstud_code4,$xrel4 );
$xdb->PDO_insert2($xfcode, $xstud_code5,$xrel5 );
}
elseif($xstud_code1 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" && $xstud_code2 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" && $xstud_code3 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"&& $xstud_code4 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"){
$xdb->PDO_insert2($xfcode, $xstud_code1,$xrel1 );
$xdb->PDO_insert2($xfcode, $xstud_code2,$xrel2 );
$xdb->PDO_insert2($xfcode, $xstud_code3,$xrel3 );
$xdb->PDO_insert2($xfcode, $xstud_code4,$xrel4 );
}

elseif($xstud_code1 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" && $xstud_code2 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" && $xstud_code3 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"){
$xdb->PDO_insert2($xfcode, $xstud_code1,$xrel1 );
$xdb->PDO_insert2($xfcode, $xstud_code2,$xrel2 );
$xdb->PDO_insert2($xfcode, $xstud_code3,$xrel3 );
}
elseif($xstud_code1 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" && $xstud_code2 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05" ){
$xdb->PDO_insert2($xfcode, $xstud_code1,$xrel1 );
$xdb->PDO_insert2($xfcode, $xstud_code2,$xrel2 );
}
elseif($xstud_code1 == "Student 01" or "Student 02" or "Student 03" or "Student 04" or "Student 05"){
$xdb->PDO_insert2($xfcode, $xstud_code1,$xrel1 );
}








$xdb->PDO_insert($xfcode, $xfname, $xcont, $txt_reg_date, $xactive);

}  