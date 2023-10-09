<?php require 'check_login.php' ?>

<?php
    session_start();
    $news_id = $_GET['ID'];
    $users_id = $_SESSION['id'];
    require 'admin/connect.php';
    $query = "SELECT ID FROM news WHERE users_id='$users_id'";
    $result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($result)){
        if($row['ID'] == $news_id){
            $query_comments = "DELETE FROM comments WHERE news_id='$news_id'";
            mysqli_query($connect,$query_comments);
            $query_news = "DELETE FROM news WHERE ID='$news_id'";
            mysqli_query($connect,$query_news);
            mysqli_close($connect);
            header('location:user.php?msg=News deleted successfully !!!');
            exit;
        }
    }
    header('location:user.php?error=This ID is not valid to delete news !!!');
    exit;
?>