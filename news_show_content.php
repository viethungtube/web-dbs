<?php require 'check_login.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Content</title>
</head>
<body>
    <?php
        $id = $_GET['ID'];
        require 'admin/connect.php';
        $query = "SELECT * FROM news WHERE ID='$id'";
        $result = mysqli_query($connect,$query);
        $each = mysqli_fetch_array($result);
    ?>
    <h1> <?php echo $each['title'] ?> </h1>

    <p> <?php echo nl2br($each['content']) ?> </p>
    
    <img src="<?php echo $each['picture'] ?>" height="300">

    <?php mysqli_close($connect); ?>
</body>
</html>