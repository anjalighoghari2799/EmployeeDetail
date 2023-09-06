<?php
include_once 'connection.php';
$empid=$_POST['id'];
$empname=$_POST['name'];
$empcodeid=$_POST['codeid'];
$empphone=$_POST['phone'];
$empadd=$_POST['address'];
$estatus=0;
if(isset($_POST['status'])){
$estatus=1;
}
$empdep=$_POST['dep'];
$sql="UPDATE `empdetail` SET name='{$empname}',codeid='{$empcodeid}',phone='{$empphone}',address='{$empadd}',status='{$estatus}',dep='{$empdep}' WHERE id='$empid' ";

$result=mysqli_query($conn,$sql);

if($result)
{
    
    // header("location : tabledata.php");
    header("location:tabledata.php");
}



?>