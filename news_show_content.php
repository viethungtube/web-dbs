<?php require 'check_login.php' ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'admin/connect.php';
    $users_id = $_SESSION['id'];
    $news_id = $_POST['id'];
    $comment = $_POST['comment'];
    if(!empty($comment)){
        $comment = trim($comment);
        
        if (preg_match('/<img src=[^>]*onerror=alert\([^)]*\)>/', $comment)) {
            echo "Fl@g2-M_cPzHKK0eyU";
            exit;
        }
        //$comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
        $query_insert_comment = "INSERT INTO comments(comment, users_id, news_id) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query_insert_comment);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sii", $comment, $users_id, $news_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } 
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
$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;
if ($id <= 0) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    exit;
}

require 'admin/connect.php';
$query = "SELECT * FROM news WHERE ID=?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$each = mysqli_fetch_array($result);
?>

<h1><?php echo htmlspecialchars($each['title']) ?></h1>
<p><?php echo nl2br(htmlspecialchars($each['content'])) ?></p>
<img src="<?php echo htmlspecialchars($each['picture']) ?>" height="300">
<br><br><br>

<?php
$query_comment = "SELECT u.name, c.comment, c.news_id, c.ID
                    FROM users as u, comments as c 
                    WHERE c.users_id=u.ID and c.news_id=? ORDER BY c.ID";
$stmt_comment = mysqli_prepare($connect, $query_comment);
mysqli_stmt_bind_param($stmt_comment, "i", $id);
mysqli_stmt_execute($stmt_comment);
$result_comment = mysqli_stmt_get_result($stmt_comment);

foreach ($result_comment as $row) {
    echo ("Name: " . htmlspecialchars($row['name']) . ", Comments: $row[comment]");
    echo ("<a href='comments_delete.php?ID=" . htmlspecialchars($row['ID']) . "'> Delete </a>");
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
