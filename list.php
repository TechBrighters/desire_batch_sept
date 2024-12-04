<?php 
$con = mysqli_connect("localhost","root","","batch_sept");
session_start();
if(isset($_GET['id']) && !empty($_GET['id'])){
    mysqli_query($con,"DELETE FROM student WHERE id=".$_GET['id']);
}
$select = "SELECT * FROM student";
$query = mysqli_query($con,$select) or die(mysqli_error($con));
?>
<html>
    <title>List</title>
    <body>
        <?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg'];}?>
        <a href="register.php">Add New</a>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Fees</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <?php while($rows = mysqli_fetch_assoc($query)){?>
                <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['first_name'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['fees'];?></td>
                    <td><?php echo $rows['city'];?></td>
                    <td><a href="edit.php?id=<?php echo $rows['id'];?>">Edit</a> | <a href="list.php?id=<?php echo $rows['id'];?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>