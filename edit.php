<?php 

$con = mysqli_connect("localhost",'root','','batch_sept');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $selRec = "SELECT * FROM student WHERE id =".$id;
    $record = mysqli_query($con,$selRec);
    $student = mysqli_fetch_assoc($record);
}
if(isset($_POST) && !empty($_POST)){
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $fees = $_POST['fees'];
    $city = $_POST['city'];
    $updateSql = 'UPDATE student SET first_name = "'.$name.'",email="'.$email.'",fees="'.$fees.'",city="'.$city.'" WHERE id = '.$id;
    mysqli_query($con,$updateSql);
    $_SESSION['msg'] = 'Record Updated';
    header("location:list.php");
}

?>

<html>
    <title>CRUD</title>
    <body>
        <form method="post" action="edit.php?id=<?php echo $id;?>">
            Name : <input type="text" name="name" value="<?php echo $student['first_name'];?>"><br/>
            Email : <input type="text" name="email" value="<?php echo $student['email'];?>"><br/>
            Fees : <input type="text" name="fees" value="<?php echo $student['fees'];?>"><br/>
            City : <input type="text" name="city" value="<?php echo $student['city'];?>"><br/>
            <input type="submit" name="update" value="Update">
            <a href="list.php"><input type="submit" name="back" value="Back"></a>
        </form>
    </body>
</html>