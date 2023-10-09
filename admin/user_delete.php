<?php require 'check_login_admin.php' ?>

<?php
    $users_id = $_GET['ID'];
    require 'connect.php';
    
    $query = "SELECT * FROM users WHERE ID='$users_id'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) == 1){
        $query_comments = "DELETE FROM comments WHERE users_id='$users_id'";
        mysqli_query($connect,$query_comments);
        $query_news = "DELETE FROM news WHERE users_id='$users_id'";
        mysqli_query($connect,$query_news);
        $query_users = "DELETE FROM users WHERE ID='$users_id'";
        mysqli_query($connect,$query_users);
        mysqli_close($connect);
        header('location:index.php?msg=User has been deleted successfully !!!');
        exit;
    }
    header('location:index.php?msg=This ID is not valid to delete user !!!');
    exit;
?>