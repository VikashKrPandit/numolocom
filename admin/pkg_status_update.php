<?php
include('include/security.php');
if(isset($_POST['pkg_stat']) && isset($_POST['pkg_id'])){
    $pkg_id = $_POST['pkg_id'];
    $pkg_stat= $_POST['pkg_stat'];
    //echo $pkg_id;
   // echo "---";
    //echo $pkg_stat;
    $upPkgStat = $conn->query("update tbl_packages set pkg_status='$pkg_stat' where id='$pkg_id' ");
    if($upPkgStat){
       $conn->query("update fees_master set tbl_packages_status='$pkg_stat' where pkg_id ='$pkg_id'");  
    }
}
?>