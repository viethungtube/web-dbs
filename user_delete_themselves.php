<?php require 'check_login.php' ?>

<?php
    session_start();
    $users_id = $_SESSION['id'];
    require 'admin/connect.php';

    $query_comments = "DELETE FROM comments WHERE users_id='$users_id'";
    mysqli_query($connect,$query_comments);
    $query_news = "DELETE FROM news WHERE users_id='$users_id'";
    mysqli_query($connect,$query_news);
    $query_users = "DELETE FROM users WHERE ID='$users_id'";
    mysqli_query($connect,$query_users);
    mysqli_close($connect);

    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['level']);

    header('location:index.php?msg=Account deleted successfully. Please login with another account !!!');
    exit;
?>
