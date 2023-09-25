<?php
    $id = $_GET['ID'];
    require 'connect.php';
    $query = "SELECT * FROM news WHERE ID='$id'";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) == 1){
        $query_delete = "DELETE FROM news WHERE ID='$id'";
        mysqli_query($connect,$query_delete);
        mysqli_close($connect);
        header('location:user.php?msg=News has been deleted successfully !!!');
        exit;
    }
    header('location:index.php?msg=This ID is not valid to delete news !!!');
    exit;
?>
