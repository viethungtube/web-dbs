<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'admin/connect.php';
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $picture = $_POST['picture'];
    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    $picture = htmlspecialchars($picture, ENT_QUOTES, 'UTF-8');
    $query_update = "UPDATE news SET title=?, content=?, picture=? WHERE ID=?";
    $stmt = mysqli_prepare($connect, $query_update);
    mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $picture, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
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
//session_start();
$user_id = $_SESSION['id'];
$id = $_GET['ID'];
require 'admin/connect.php';
$query = "SELECT * FROM news WHERE ID=? AND users_id=?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) == 1) {
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
