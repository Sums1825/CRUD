<?php

require_once('lib/ezpdfclass/class/class.ezpdf.php');
require_once('include/func_pdf2tab.php');
require_once('db_config.php');
if(isset($_POST['btn_print'])){
    $pdf = new Cezpdf('Letter', 'portrait');
    
}

$xffrom = $_POST['xffrom'];
$xfto = $_POST['xfto'];
$xDtefrom = $_POST['xDtefrom'];
$xDteto = $_POST['xDteto'];
$xchk_display = $_POST['chk_display'];
$xrdo_type = $_POST['rdo_type'];

// if($xffrom)
// {
//     $xfilter .= " date BETWEEN '".$xDtefrom."'";
// }
// if($xfto)
// {
//     $xfilter .= " AND '".$xDteto."'" ;
// }
//detailed




$xfilter = " WHERE ";
$xfilter .= "fercher_code BETWEEN '".$xffrom."' AND '".$xfto."'";
$xfilter .= " AND date BETWEEN '".$xDtefrom."' AND '".$xDteto."' ";
if($xchk_display === '0'){
    $xfilter .= "AND isactive = '0'";
}elseif($xchk_display === '1' ){
    $xfilter .= "AND isactive = '1' ";
}
#SELECT DISTINCT fetcher.fetcher_name,fetcher2.student_code,fetcher2.relationship
#FROM fetcher
#INNER JOIN fetcher2 ON fetcher.fercher_code = fetcher2.fetcher_code
#WHERE fercher_code BETWEEN '0' AND '7' AND isactive = '1';

// $xqry = "SELECT * FROM fetcher INNER JOIN fetcher2 ON fetcher.fercher_code = fetcher2.fetcher_code
// INNER JOIN studentfile ON studentfile.student_code = fetcher2.student_code" .$xfilter;
// $xstmt =  $link_id->prepare($xqry);
// $xstmt->execute(array());

$xqry1 = "SELECT * FROM fetcher ".$xfilter." ORDER BY fercher_code ASC ";
$xstmt1 =  $link_id->prepare($xqry1);
$xstmt1->execute(array());
// $xqry_fetcher = "SELECT COUNT(*) fercher_code FROM fetcher 
// UNION
// SELECT fetcher_code FROM fetcher2" .$xfilter;
// $res = $link_id->query($xqry_fetcher);
// $count = $res->fetchColumn();


if($xrdo_type == "Detailed"){

$pdf->selectFont("lib/ezpdfclass/fonts/Helvetica.afm");
$xheader = $pdf->openObject();
$pdf->saveState();

$xfsize = 10;
$xtop = 750;
$date = date("l jS \of F Y ");

$pdf->ezPlaceData(25, $xtop, "<b>FETCHER FILE REPORT</b>", 12, 'left');
echo '<br>';
$xleft1 = array();
$xleft1[0] = 25;
$xleft1[1] = $xleft1[0] + 60;


$pdf->ezPlaceData($xleft1[0], 730, "Date Printed:", 10, 'left');
$pdf->ezPlaceData($xleft1[1], 730, $date, 10, 'left');

$xtop -= 30;
//for lines

$x1 = 25; //first Line
$x2 = 587;
$pdf->line($x1, $xtop, $x2, $xtop);
$xtop -= 10;

$xleft1 = array();
$xleft1[0] = 45;
$xleft1[1] = $xleft1[0] + 230;
$xleft1[2] = $xleft1[1] + 230;
$xleft1[3] = $xleft1[2];


$pdf->ezPlaceData($xleft1[0], $xtop, "Student Code", $xfsize, 'left');
$pdf->ezPlaceData($xleft1[1], $xtop, "Student Name", $xfsize, 'left');
$pdf->ezPlaceData($xleft1[3], $xtop, "Relationship", $xfsize, 'left');


$xtop -= 5;

//Second Line
$x1 = 25;
$x2 = 587;
$pdf->line($x1, $xtop, $x2, $xtop);


$pdf->restoreState();
$pdf->closeObject();
$pdf->addObject($xheader, 'all');
$xssubtot = "";

//details
    foreach ($xstmt1 as $xrs1) {
   
        $xleft2 = array();
        $xleft2[0] = 45;
        $xleft2[1] = $xleft2[0] + 50;
        $xtop -= 25;
        $pdf->ezPlaceData($xleft2[0], $xtop, "<b>FETCHER</b>", $xfsize, 'left');
        $pdf->ezPlaceData($xleft2[1], $xtop, $xrs1['fercher_code'], $xfsize, 'left');
        echo "<br>";  //after the inner loop has executed, start a new line      
        $xcount_fetcher++; 
         $xfilt = $xrs1['fercher_code'];
        $xfilter2 = " WHERE f2.fetcher_code = '".$xfilt."' ";

        $xqry = "SELECT * 
        FROM fetcher2 f2
        INNER JOIN studentfile st ON st.student_code = f2.student_code
        " .$xfilter2;
        $xstmt =  $link_id->prepare($xqry);
        $xstmt->execute();
        // var_dump($xstmt);
        // die();
        $xssubtot = "";
        foreach ($xstmt as $xrs) {
                $xtop -= 15;
                // $pdf->ezPlaceData($xleft1[0], $xtop, 'shit', $xfsize, 'left');
                $pdf->ezPlaceData($xleft1[0], $xtop, $xrs["student_code"], $xfsize, 'left');
                $pdf->ezPlaceData($xleft1[1], $xtop, $xrs["fullname"], $xfsize, 'left');
                $pdf->ezPlaceData($xleft1[2], $xtop, $xrs["relationship"], $xfsize, 'left');
                // $pdf->ezPlaceData($xleft1[3], $xtop, $xrs["contact"], $xfsize, 'left');
                // $pdf->ezPlaceData($xleft1[4], $xtop, $xrs["Date"],  $xfsize, 'right');
                $xssubtot++;
    }
           
                $xsubtot = $xsubtot + $xssubtot ;
            $xtop -= 55;
            $x1 = 25;
            $x2 = 587;
            $pdf->line($x1, $xtop, $x2, $xtop);
            $xleft2 = array();
            $xleft2[0] = 45;
            $xleft2[1] = $xleft2[0] + 500;
            $xtop -= 15;
            $pdf->ezPlaceData($xleft2[0], $xtop, "TOTAL STUDENT:", $xfsize, 'left');
            $pdf->ezPlaceData($xleft2[1], $xtop, $xssubtot , $xfsize, 'right');
    
    }
    $xtop -= 35;
    $pdf->ezPlaceData($xleft2[0], $xtop, "TOTAL COUNT OF FETCHER:", $xfsize, 'left');
    $pdf->ezPlaceData($xleft2[1], $xtop, $xcount_fetcher, $xfsize, 'right');
    $xtop -= 15;
    $pdf->ezPlaceData($xleft2[0], $xtop, "TOTAL COUNT OF STUDENT:", $xfsize, 'left');
    $pdf->ezPlaceData($xleft2[1], $xtop, $xsubtot, $xfsize, 'right');
$pdf->ezStream();
$pdf->$this->ezNewPage();

}elseif($xrdo_type == "Summarized"){
    //summarized




    $pdf->selectFont("lib/ezpdfclass/fonts/Helvetica.afm");
    $xheader = $pdf->openObject();
    $pdf->saveState();
    
    $xfsize = 10;
    $xtop = 750;
    $date = date("l jS \of F Y ");
    
    $pdf->ezPlaceData(25, $xtop, "<b>FETCHER FILE REPORT</b>", 12, 'left');
    echo '<br>';
    $xleft1 = array();
    $xleft1[0] = 25;
    $xleft1[1] = $xleft1[0] + 60;
    $pdf->ezPlaceData($xleft1[0], 730, "Date Printed:", 10, 'left');
    $pdf->ezPlaceData($xleft1[1], 730, $date, 10, 'left');
    $xtop -= 30;
    //for lines
    $x1 = 25; //first Line
    $x2 = 587;
    $pdf->line($x1, $xtop, $x2, $xtop);
    $xtop -= 10;
    $xleft1 = array();
    $xleft1[0] = 45; 
    $xleft1[1] = $xleft1[0] + 130;
    $xleft1[2] = $xleft1[1] + 190;
    $xleft1[3] = $xleft1[2] + 130;
    $pdf->ezPlaceData($xleft1[0], $xtop, "Fetcher Code", $xfsize, 'left');
    $pdf->ezPlaceData($xleft1[1], $xtop, "Fetcher Name", $xfsize, 'left');
    $pdf->ezPlaceData($xleft1[2], $xtop, "Registered Date", $xfsize, 'left');
    $pdf->ezPlaceData($xleft1[3], $xtop, "No. of Student", $xfsize, 'left');
    $xtop -= 5;
    //Second Line
    $x1 = 25;
    $x2 = 587;
    $pdf->line($x1, $xtop, $x2, $xtop);  
    $pdf->restoreState();
    $pdf->closeObject();
    $pdf->addObject($xheader, 'all');
   
  
  
        foreach ($xstmt1 as $xrs1) {
      
           
            $xfilt = $xrs1['fercher_code'];
            $xfilter2 = " WHERE f2.fetcher_code = '".$xfilt."' ";
        
            $xqry = "SELECT COUNT(*) student_code
            FROM fetcher2 f2" .$xfilter2;
          
            $res = $link_id->query($xqry);
            $count = $res->fetchColumn();
            $xtop -= 15;
            // $pdf->ezPlaceData($xleft1[0], $xtop, 'shit', $xfsize, 'left');
            $pdf->ezPlaceData($xleft1[0], $xtop, $xrs1["fercher_code"], $xfsize, 'left');
            $pdf->ezPlaceData($xleft1[1], $xtop, $xrs1["fetcher_name"], $xfsize, 'left');
            $pdf->ezPlaceData($xleft1[2], $xtop, $xrs1['date'], $xfsize, 'left');
            $pdf->ezPlaceData($xleft1[3], $xtop, $count, $xfsize, 'left');
        } 
      
   
    $pdf->ezStream();
}