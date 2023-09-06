<?php
include_once 'connection.php';
$ename=$_POST['name'];
$eid=$_POST['codeid'];
$ephone=$_POST['phone'];
$estatus=0;
if(isset($_POST['status'])){
$estatus=1;
}
$edep=$_POST['dep'];
$eaddress=$_POST['address'];
$sql = "INSERT INTO `empdetail` (`name`,`codeid`,`phone`,`status`,`dep`,`address`) VALUES ('$ename','$eid','$ephone','$estatus','$edep','$eaddress')";

// echo $sql;
// die();


$result=mysqli_query($conn,$sql);

if($result)
{
    
    // header("location : tabledata.php");
    header("location:tabledata.php");
}

?>