<?php require 'check_login.php' ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        require 'admin/connect.php';
        $title = mysqli_real_escape_string($connect,$_POST['title']);
        $content = mysqli_real_escape_string($connect,$_POST['content']);
        $picture = $_POST['picture'];
        $users_id = $_SESSION['id'];

        $query_insert = "INSERT INTO news(title,content,picture,users_id)
                VALUES('$title','$content','$picture','$users_id')";
        mysqli_query($connect,$query_insert);
        mysqli_close($connect);

        header('location:user.php?msg=News inserted successfully !!!');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert News</title>
</head>
<body>
<script>
        $title = mysqli_real_escape_string($connect,$_POST['title']);
        $content = mysqli_real_escape_string($connect,$_POST['content']);
        $picture = $_POST['picture'];
        $users_id = $_SESSION['id'];

        $query_insert = "INSERT INTO news(title,content,picture,users_id)
                VALUES('$title','$content','$picture','$users_id')";
</script>
    <form method="post">
        Title
        <input type="text" name="title">
        <br>
        Content
        <textarea name="content"></textarea>
        <br>
        Link picture
        <input type="text" name="picture">
        <br>
        <button>Add News</button>
    </form>
</body>
</html>
