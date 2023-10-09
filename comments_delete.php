<?php require 'check_login.php' ?>

<?php
    session_start();
    $comments_id = $_GET['ID'];
    $users_id = $_SESSION['id'];
    require 'admin/connect.php';
    $query = "SELECT users_id, news_id FROM comments WHERE ID='$comments_id'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    
    $news_id = $row['news_id'];
    $query_check_author = "SELECT users_id FROM news WHERE ID='$news_id'";
    $result_check_author = mysqli_query($connect, $query_check_author);
    $author_id = mysqli_fetch_array($result_check_author)[0];   

    if($_SESSION['level']==1 || $users_id==$author_id || $row['users_id']==$users_id){
        $query_delete_all_comments = "DELETE FROM comments WHERE ID='$comments_id'";
        mysqli_query($connect,$query_delete_all_comments);
    }
    mysqli_close($connect);
    header('location:news_show_content.php?ID='.$row['news_id']);
    exit;
?>