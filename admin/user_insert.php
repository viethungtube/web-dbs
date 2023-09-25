<?php require 'check_login_admin.php' ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    require 'connect.php';
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect,$query);
    $number_rows = mysqli_num_rows($result);
    if($number_rows == 1){
        $_SESSION['error'] = 'Email has been duplicated !!!';
        header('location:user_insert.php');
        exit;
    }

    if($password == $cpassword){
        $query_insert = "INSERT INTO users(name,email,password,phone_number,address,level)
            VALUES('$name','$email','$password','$phone_number','$address',0)";
        mysqli_query($connect,$query_insert);
        mysqli_close($connect);

        header('location:index.php?msg=New record created successfully !!!');
        exit;
    }
    $_SESSION['error'] = 'Passwords do not match !!!';
    header("location:user_insert.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add user</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="../style_signup.css" rel="stylesheet" type="text/css"/>
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
		<h1>Add user</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
					<input class="text" type="text" name="name" placeholder="Name" required="">
					<input class="text w3lpass" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
                    <input class="text" type="text" name="phone_number" placeholder="Phone number" required="">
                    <input class="text w3lpass" type="text" name="address" placeholder="Address" required="">
					<input type="submit" value="SUBMIT">
				</form>
				<a href="index.php">Cancel</a>
			</div>
		</div>
	</div>
</body>
</html>
