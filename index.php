<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body bgcolor="pink">

<?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>

<?php if(isset($_GET['error'])){ ?>
        <span style='color:red'>
            <?php echo $_GET['error'] ?>
        </span>
<?php } ?>

<?php
    require 'admin/connect_nodb.php';
    $query_database = "CREATE DATABASE IF NOT EXISTS db_news";
    mysqli_query($connect,$query_database);
    mysqli_close($connect);
    
    require 'admin/connect.php';
    $query_table_users = "CREATE TABLE IF NOT EXISTS users(
                        ID INT(5) AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(50),
                        email VARCHAR(50),
                        password VARCHAR(50),
                        -- token VARCHAR(50) UNIQUE,
                        phone_number VARCHAR(20),
                        address TEXT,
                        level BOOLEAN)";
    mysqli_query($connect,$query_table_users);

    $query_table_news = "CREATE TABLE IF NOT EXISTS news(
                        ID INT(5) AUTO_INCREMENT PRIMARY KEY,
                        title TEXT,
                        content TEXT,
                        picture VARCHAR(200),
                        users_id INT(5),
                        FOREIGN KEY(users_id) REFERENCES users(ID))";
    mysqli_query($connect,$query_table_news);

    $query_table_comments = "CREATE TABLE IF NOT EXISTS comments(
                        ID INT(5) AUTO_INCREMENT PRIMARY KEY,
                        users_id INT(5),
                        news_id INT(5),
                        comment TEXT,
                        FOREIGN KEY(users_id) REFERENCES users(ID),
                        FOREIGN KEY(news_id) REFERENCES news(ID))";
    mysqli_query($connect,$query_table_comments);
    mysqli_close($connect);
?>

<div>
    <?php require 'user_login.php'; ?>
</div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
