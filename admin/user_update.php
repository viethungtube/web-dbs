<?php require 'check_login_admin.php' ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $level = $_POST['level'];

    require 'connect.php';
    $query_update = "UPDATE users SET name='$name',password='$password',
        phone_number='$phone_number',address='$address',level='$level' WHERE ID='$id'";
    mysqli_query($connect,$query_update);
    mysqli_close($connect);

    header('location:index.php?msg=New record updated successfully !!!');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>

<?php
    $id = $_GET['ID'];
    require 'connect.php';
    $query = "SELECT * FROM users WHERE ID='$id'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) == 1){
        $each = mysqli_fetch_array($result);
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    Name
    <input type="text" name="name" value="<?php echo $each['name'] ?>">
    <br>
    Password
    <input type="password" name="password" value="<?php echo $each['password'] ?>">
    <br>
    Phone number
    <input type="text" name="phone_number" value="<?php echo $each['phone_number'] ?>">
    <br>
    Address
    <input type="text" name="address" value="<?php echo $each['address'] ?>">
    <br>
    Level
    <input type="text" name="level" value="<?php echo $each['level'] ?>">
    <br>
    <button>Update User</button>
</form>

<?php }else{ ?>
    <span style='color:red'>
        <h1>This ID is not valid to update user !!!</h1> 
    </span>
<?php } ?>   

</body>
</html>