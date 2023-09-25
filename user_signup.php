<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    require 'admin/connect.php';
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['error'] = 'Email has been duplicated !!!';
        header('location:user_signup.php');
        exit;
    }

    if($password == $cpassword){
        $query_insert = "INSERT INTO users(name,email,password,phone_number,address,level)
            VALUES('$name','$email','$password','$phone_number','$address',0)";
        mysqli_query($connect,$query_insert);
        mysqli_close($connect);

        header('location:index.php?msg=New account created successfully !!!');
        exit;
    }
    $_SESSION['error'] = 'Passwords do not match !!!';
    header("location:user_signup.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="style_signup.css" rel="stylesheet" type="text/css"/>
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>

	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
					<input class="text" type="text" name="name" placeholder="Name" required="">
					<input class="text w3lpass" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
                    <input class="text" type="text" name="phone_number" placeholder="Phone number" required="">
                    <input class="text w3lpass" type="text" name="address" placeholder="Address" required="">
					<input type="submit" value="SIGNUP">
				</form>
				<p>Have an Account? <a href="../index.php"> Login Now!</a></p>
			</div>
		</div>
	</div>
    
</body>
</html>











#Way 2(basic):

<!--  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
    <form method="post">
        <h1>Sign Up</h1>
        Name
        <input type="text" name="name">
        <br>
        Email
        <input type="email" name="email">
        <br>
        Password
        <input type="password" name="password">
        <br>
        Confirm password
        <input type="password" name="cpassword">
        <br>
        Phone number
        <input type="text" name="phone_number">
        <br>
        Address
        <input type="text" name="address">
        <br>
        <button>Sign Up</button>
    </form>
</body>
</html> -->