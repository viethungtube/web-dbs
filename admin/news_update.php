<?php require 'check_login_admin.php' ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require 'connect.php';
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($connect,$_POST['title']);
    $content = mysqli_real_escape_string($connect,$_POST['content']);
    $picture = $_POST['picture'];

    $query_update = "UPDATE news SET title='$title',
        content='$content', picture='$picture' WHERE ID='$id'";
    mysqli_query($connect,$query_update);
    mysqli_close($connect);

    header('location:user.php?msg=News updated successfully !!!');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News</title>
</head>
<body>
    <?php
        $id = $_GET['ID'];
        require 'connect.php';
        $query = "SELECT * FROM news WHERE ID='$id'";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result) == 1){
            $each = mysqli_fetch_array($result);
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        Title
        <input type="text" name="title" value="<?php echo $each['title'] ?>">
        <br>
        Content
        <textarea name="content"><?php echo $each['content'] ?></textarea>
        <br>
        Link picture
        <input type="text" name="picture" value="<?php echo $each['picture'] ?>">
        <br>
        <button>Update news</button>
    </form>

    <?php }else{ ?>
        <span style='color:red'>
            <h1>This ID is not valid to update news !!!</h1> 
        </span>
    <?php } ?>    

</body>
</html>