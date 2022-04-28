<?php
$xhost = 'localhost';
$uname = 'root';
$xpw = '';
$xdbname = 'header_examdb';
$xcnstr = "mysql:host=$xhost; dbname=$xdbname;charset=utf8";
$xopt = array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

try {
    $link_id = new PDO($xcnstr, $uname, $xpw, $xopt);
} catch (Exception $e) {
    echo "No Connection";
}

require_once("include/lx.pdodb.php");
class Database
{
    private $xdsn = "mysql:host=localhost;dbname=header_examdb;";
    private $xuser = "root";
    private $xpass = "";
    public $link_id;

    public function __construct()
    {
        try {
            $this->link_id = new PDO($this->xdsn, $this->xuser, $this->xpass);

        } catch (PDOException $e) {
            echo $e->getMessage();

   
        }
 
    }

public function PDO_insert($xfcode,  $xfname, $xcont, $txt_reg_date, $xactive )
{
    $xqry_save = "INSERT INTO fetcher (fercher_code,fetcher_name,contact,date,isactive)
     VALUES (:xfcode,:xfname,:xcont,:txt_reg_date,:xactive)";
    $xstmt = $this->link_id->prepare($xqry_save);
    $xstmt->execute([ 'xfcode' => $xfcode,  'xfname' => $xfname, 'xcont' => $xcont, 
    'txt_reg_date' => $txt_reg_date, 'xactive' => $xactive]);
    return true;
}
public function PDO_insert2($xfcode,$xstud_code,$xrel)
{
    $xqry_save = "INSERT INTO fetcher2 (fetcher_code,student_code,relationship)
     VALUES (:xfcode,:xstud_code,:xrel)";
    $xstmt = $this->link_id->prepare($xqry_save);
    $xstmt->execute([ 'xfcode' => $xfcode,  'xstud_code' => $xstud_code, 'xrel' => $xrel]);
    return true;
}

}