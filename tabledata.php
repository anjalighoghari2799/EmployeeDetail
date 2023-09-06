<?php include_once "connection.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-5/css/all.css" integrity="sha512-hfVul4ZiNO3U3dM4bwj4/dse2gq0mYM/zIIard7e9dc6raAJ3AEvskqwTWqCCORShcoFh+N1GUbgxoDb2ytuow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Table data</title>
</head>
<body>
    <?php
    $sql="SELECT empdetail.id,empdetail.name,empdetail.codeid,empdetail.phone,empdetail.phone,status,department.name AS department,empdetail.address FROM empdetail JOIN department ON empdetail.dep=department.id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

    ?>
<div class="container align-center">
<h2 class="py-3 text-center">EMPLOYEES TABLE</h2>
    <table class="table table-sm">
<thead>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>ID</th>
        <th>Phone</th>
        <th>Working Status</th>
        <th>Department</th>
        <th>Adderess</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
</thead>
<?php
 $s=1;
while($row=mysqli_fetch_assoc($result))
{
   
    ?>
<tr>
    <td><?php echo $s++ ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['codeid']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td>

    <?php
    if($row['status']==0){
        ?>
        <span class="badge bg-danger">NOT  Working</span>
        <?php
    }
   else if($row['status']==1){
        ?>
        <span class="badge bg-success"> Working</span>
        <?php
    }
    else{
        ?>
        <span class="badge bg-primary"> N/A</span>
        <?php
    }
    ?>


    </td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td>
    
    <a href="Deletedata.php?id=<?php echo $row['id']; ?> " onclick="return confirm('Are you sure you want to delete this item?');">
        <i class="fa fa-trash" ></i></a></td>
    <td><a href="updatepage.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a></td>
</tr>

<?php }
?>

    </table>
    <?php } ?>
    <div class="text-center">
    <a href="entryform.php">
        <input type="button" class="btn btn-primary" name="btn" id="" value="ADD NEW ">
    </a>
    </div>
</div>
</body>
</html>