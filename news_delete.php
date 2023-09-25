<?php
    session_start();
    $id_news = $_GET['ID'];
    $id_user = $_SESSION['id'];
    require 'admin/connect.php';
    $query = "SELECT ID FROM news WHERE users_id='$id_user'";
    $result = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($result)){
        if($row['ID'] == $id_news){
            $query_delete = "DELETE FROM news WHERE ID='$id_news'";
            mysqli_query($connect,$query_delete);
            mysqli_close($connect);
            header('location:user.php?msg=News deleted successfully !!!');
            exit;
        }
    }
    header('location:user.php?error=This ID is not valid to delete news !!!');
    exit;
?>