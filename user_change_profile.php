<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];

        require 'admin/connect.php';
        if (empty($password)) {
            $_SESSION['error_password'] = 'Password cannot be empty !!!';
            header("location:user_change_profile.php");
            exit;
        }

        $query_check_email = "SELECT * FROM users WHERE email=?";
        $stmt_check_email = mysqli_prepare($connect, $query_check_email);
        mysqli_stmt_bind_param($stmt_check_email, "s", $email);
        mysqli_stmt_execute($stmt_check_email);
        $result_check_email = mysqli_stmt_get_result($stmt_check_email);

        if(mysqli_num_rows($result_check_email) > 0 && $_SESSION['id'] != mysqli_fetch_array($result_check_email)['ID']){
            $_SESSION['error_email'] = 'Email has been duplicated !!!';
            header("location:user_change_profile.php");
            exit;
        }

        if($password == $cpassword){
            $query_update = "UPDATE users SET name=?, email=?, password=?, phone_number=?, address=? WHERE ID=?";
            $stmt_update = mysqli_prepare($connect, $query_update);
            mysqli_stmt_bind_param($stmt_update, "sssssi", $name, $email, $password, $phone_number, $address, $id);
            mysqli_stmt_execute($stmt_update);

            mysqli_stmt_close($stmt_update);
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
    session_start();
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
    session_start();
    $id = $_SESSION['id'];
    require 'admin/connect.php';
    $query = "SELECT * FROM users WHERE ID=?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $each = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
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
