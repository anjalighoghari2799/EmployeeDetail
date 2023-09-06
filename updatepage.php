<?php
include_once 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <title>Updatedata</title>
</head>

<body>
<form action="updatedata.php" method="POST">
<div class="container align-center">
<h2 class="py-3 text-center">UPDATE EMPLOYEE DETAIL</h2>
<div class="col-md-6 bg-dark text-white  m-auto p-3">

<?php
$empid=$_GET['id'];
$query="SELECT * FROM `empdetail` WHERE `id`='$empid'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result))
{
    while($row1=mysqli_fetch_assoc($result))
    {
?>
<div class="form-group">

   <label>Employee Name: </label></br>
   <input type="hidden" name="id" value="<?php echo $row1['id'];?>">
    <input type="text" class="form-control" placeholder="Enter name..." name="name" value="<?php echo $row1['name']; ?>">
</div>
<div class="form-group">
    <label>Employee ID:</label>
    <input type="text" class="form-control" placeholder="Enter ID..." name="codeid" value="<?php echo $row1['codeid']; ?>">
</div>
<div class="form-group">
    <label>Phone:</label>
    <input type="text" class="form-control" placeholder="Enter phone..." name="phone" value="<?php echo $row1['phone']; ?>">
</div>
<div class="form-group">
    <label>Address:</label>
    <textarea class="form-control" name="address" id="" cols="50" rows="2" placeholder="Enter Address..." ><?php echo $row1['address']; ?></textarea>
</div>
<div class="form-check">
    <input type="checkbox" 
    <?php
    if($row1['status']==1){
        echo "checked";
    }
    ?> 
    class="form-check-input" name="status">
    <label>Working Status</label>
</div>
<div class="form-group">
    <label>Department:</label>
    <?php 
    $sql="SELECT * FROM department";
    $result=mysqli_query($conn,$sql);
    if(mysqli_fetch_row($result)>0)
    {
    ?>
    <select name="dep" id="" class="form-control">
    <option>Select the Department</option>
        <?php 
        while($row=mysqli_fetch_assoc($result))
        {
        $selected="";
        if($row1['dep']==$row['id'])
        {
            $selected="selected";
        }
        ?>
        
        <option value="<?php echo $row['id'] ?>" <?php echo $selected?>><?php echo $row['name'] ?></option>
        
        <?php } ?>
    </select>
    <?php } ?>
</div></br>

<div class="form-group text-center">
    <input type="submit" class="submit btn btn-primary" value="UPDATE" >
</div>
</form>
<?php
 }
} 
?>
</div>
 </div>
</body>
    

</html>