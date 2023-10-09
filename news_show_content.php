<?php require 'check_login.php' ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'admin/connect.php';
    $users_id = $_SESSION['id'];
    $news_id = $_POST['id'];
    $comment = $_POST['comment'];
    if(!empty($comment)){
        $comment = trim($comment);
        $query_insert_comment = "INSERT INTO comments(comment,users_id,news_id)
                            VALUES('$comment','$users_id','$news_id')";
        mysqli_query($connect,$query_insert_comment);
        mysqli_close($connect);

        header('location:news_show_content.php?ID='.$_GET['ID']);
        exit;
    }
}
?>

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
    <br><br><br>
 
    <?php 
    $query_comment = "SELECT u.name, c.comment, c.news_id, c.ID
                        FROM users as u, comments as c 
                        WHERE c.users_id=u.ID and c.news_id=$id ORDER BY c.ID";
    $result_comment = mysqli_query($connect,$query_comment);
    foreach ($result_comment as $row) {  
        echo ("Name: $row[name], Comments: $row[comment]");
        echo ("<a href='comments_delete.php?ID=$row[ID]'> Delete </a>");
        echo nl2br("\n\n");
    }
    mysqli_close($connect); 
    ?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <br><br>
    <textarea name="comment"></textarea>
    <button>Comment</button>    
</form>

</body>
</html> 
