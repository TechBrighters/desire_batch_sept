<?php 

$con = mysqli_connect("localhost",'root','','batch_sept');

if(isset($_POST) && !empty($_POST)){
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $fees = $_POST['fees'];
    $city = $_POST['city'];
    $insert = "INSERT INTO student (first_name,email,fees,city) VALUES ('".$name."','".$email."','".$fees."','".$city."')";
    mysqli_query($con,$insert);
    $_SESSION['msg'] = 'Record Inserted';
    header("location:list.php");
}

?>

<html>
    <title>CRUD</title>
    <body>
        <form method="post" action="register.php">
            Name : <input type="text" name="name"><br/>
            Email : <input type="text" name="email"><br/>
            Fees : <input type="text" name="fees"><br/>
            City : <input type="text" name="city"><br/>
            <input type="submit" name="register" value="Register">
        </form>
    </body>
</html>