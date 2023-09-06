<?php 
include_once "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
</head>
<body>
<div class="container align-center">
<h2 class="py-3 text-center">ADD EMPLOYEE DETAIL</h2>
<div class="col-md-6 bg-dark text-white  m-auto p-3">
<form action="savedata.php" method="POST">
<div class="form-group">
    <label>Employee Name: </label></br>
    <input type="text" class="form-control" placeholder="Enter name..." name="name">
</div>
<div class="form-group">
    <label>Employee ID:</label>
    <input type="text" class="form-control" placeholder="Enter ID..." name="codeid">
</div>
<div class="form-group">
    <label>Phone:</label>
    <input type="text" class="form-control" placeholder="Enter phone..." name="phone">
</div>
<div class="form-group">
    <label>Address:</label>
    <textarea class="form-control" name="address" id="" cols="50" rows="2" placeholder="Enter Address..."></textarea>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" name="status">
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
    <option disabled selected>Select the Department</option>
        <?php 
        while($row=mysqli_fetch_assoc($result))
        {
        
        ?>
        
        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
        
        <?php } ?>
    </select>
    <?php } ?>
</div></br>

<div class="form-group text-center">
    <input type="submit" class="submit btn btn-primary" value="ADD EMPLOYEE" >
</div>
</form>
</div>
 </div>
</body>
</html>