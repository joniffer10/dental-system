<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location:homepage.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login</title>
	
	</head>
<body>
	
	<h1>Log In</h1>
    <form action="" class="" method="post" autocomplete="off">
        <!-- <label for="email">Email :</label> -->
        <input type="text" name="email" id="email" required value="" placeholder="Email :"> <br>
        <!-- <label for="password">Password :</label> -->
        <input type="text" name="password" id="password" required value="" placeholder="Password :"> <br>
        <p>Forgot Password?</p>
        <button type="submit" name="submit">Login</button>
        <p>Don't have an account?</p>
		<a href="sign_up.php"><p style="color:black">Sign Up</p></a>
    </form>
	
</body>
</html>
