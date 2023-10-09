<?php require 'check_login_admin.php' ?>

<?php
    session_start();
    $news_id = $_GET['ID'];
    $users_id = $_SESSION['id'];
    require 'connect.php';
    $query = "SELECT * FROM news WHERE ID='$news_id'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) == 1){
        $query_comments = "DELETE FROM comments WHERE news_id='$news_id'";
        mysqli_query($connect,$query_comments);
        $query_news= "DELETE FROM news WHERE ID='$news_id'";
        mysqli_query($connect,$query_news);
        mysqli_close($connect);
        header('location:user.php?msg=News deleted successfully !!!');
        exit;
    }
    header('location:index.php?msg=This ID is not valid to delete news !!!');
    exit;
?>
