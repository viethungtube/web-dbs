<?php require 'check_login.php' ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $name= $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];

        require 'admin/connect.php';
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0 && $_SESSION['id'] != mysqli_fetch_array($result)['ID']){
            $_SESSION['error_email'] = 'Email has been duplicated !!!';
            header("location:user_change_profile.php");
            exit;
        }

        if($password == $cpassword && $password != ""){
            $query_update = "UPDATE users SET name='$name',email='$email',password='$password',
                phone_number='$phone_number',address='$address' WHERE ID='$id'";
            mysqli_query($connect,$query_update);
            mysqli_close($connect);

            header('location:user_logout.php');
            exit;
        }
        $_SESSION['error_password'] = 'Passwords do not match !!!';
        header("location:user_change_profile.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change User Profile</title>
</head>
<body>
<?php 
    //session_start();
    if(isset($_SESSION['error_email'])){
        echo $_SESSION['error_email'];
        unset($_SESSION['error_email']);
    }
    if(isset($_SESSION['error_password'])){
        echo $_SESSION['error_password'];
        unset($_SESSION['error_password']);
    }
?>

<?php
    //session_start();
    $id = $_SESSION['id'];
    require 'admin/connect.php';
    $query = "SELECT * FROM users WHERE ID='$id'";
    $result = mysqli_query($connect,$query);
    $each = mysqli_fetch_array($result);
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    Name
    <input type="text" name="name" value="<?php echo $each['name'] ?>">
    <br>
    Email
    <input type="email" name="email" value="<?php echo $each['email'] ?>">
    <br>
    Password
    <input type="password" name="password">
    <br>
    Confirm Password
    <input type="password" name="cpassword">
    <br>
    Phone Number
    <input type="text" name="phone_number" value="<?php echo $each['phone_number'] ?>">
    <br>
    Address
    <input type="text" name="address" value="<?php echo $each['address'] ?>">
    <br>
    <button>Submit</button>
</form>

</body>
</html>
