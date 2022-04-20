<?php
class Database
{
    private $xdsn = "mysql:host=localhost;dbname=employeedb;";
    private $xuser = "root";
    private $xpass = "";
    private $link_id;

    public function __construct()
    {
        try {
            $this->link_id = new PDO($this->xdsn, $this->xuser, $this->xpass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function PDO_insert($xrecid, $xfname, $xcont, $xsal, $xadd, $xbday, $xstat, $xage, $xgen, $xactive)
    {
        $xqry_employee = "INSERT INTO employeefile (recid,fullname,address,birthdate,age,gender,civilstat,contactnum,salary,isactive)
        VALUES (:xrecid,:xfname,:xadd,:xbday,:xage,:xgen,:xstat,:xcont,:xsal,:xactive)";

        $xstmt = $this->link_id->prepare($xqry_employee);
        $xstmt->execute(['xrecid' => $xrecid, 'xfname' => $xfname, 'xadd' => $xadd, 'xbday' => $xbday, 'xage' => $xage, 'xgen' => $xgen, 'xstat' => $xstat, 'xcont' => $xcont, 'xsal' => $xsal, 'xactive' => $xactive]);
        return true;
    }

    public function PDO_view()
    {
        $xarr_data = array();
        $xqry_employee = "SELECT * FROM employeefile";
        $xstmt =  $this->link_id->prepare($xqry_employee);
        $xstmt->execute();
        $xres = $xstmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($xres as $xrs) {
            $xarr_data[] = $xrs;
        }
        return $xarr_data;
    }
    public function PDO_getByID($xrecid)
    {
        $xqry_employee = "SELECT * FROM employeefile WHERE recid = :recid";
        $xstmt = $this->link_id->prepare($xqry_employee);
        $xstmt->execute(['recid' => $xrecid]);
        $xres = $xstmt->fetch(PDO::FETCH_ASSOC);
        return $xres;
    }
    public function PDO_update($xrecid, $xfname, $xcont, $xsal, $xadd, $xbday, $xstat, $xage, $xgen, $xactive)
    {
        $xqry_employee = "UPDATE employeefile SET fullname = :xfname, address = :xadd, birthdate = :xbday, age = :xage,gender = :xgen,civilstat = :xstat,contactnum = :xcont, salary= :xsal,isactive = :xactive WHERE recid =:xrecid";
        $xstmt = $this->link_id->prepare($xqry_employee);
        $xstmt->execute(['xfname' => $xfname, 'xadd' => $xadd, 'xbday' => $xbday, 'xage' => $xage, 'xgen' => $xgen, 'xstat' => $xstat, 'xcont' => $xcont, 'xsal' => $xsal, 'xactive' => $xactive, 'xrecid' => $xrecid]);
        return true;
    }
    public function PDO_delete($xrecid)
    {
        $xqry_employee = "DELETE FROM employeefile WHERE recid = :xrecid";
        $xstmt = $this->link_id->prepare($xqry_employee);
        $xstmt->execute(['recid' => $xrecid]);
        return true;
    }
    public function PDO_totalRowCount()
    {
        $xqry_employee = "SELECT * FROM employeefile";
        $xstmt = $this->link_id->prepare($xqry_employee);
        $xstmt->execute();
        $xtotrows = $xstmt->rowCount();
        return $xtotrows;
    }
}
