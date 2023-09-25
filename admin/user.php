<?php require 'check_login_admin.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        #total{
            width: 100%;
            height: 700px;
            background: black;
        }
        #above{
            width: 100%;
            height: 10%;
            background: palevioletred;
            text-align: center;
        }
        #middle{
            width: 100%;
            height: 85%;
            background: pink;
        }
        #below{
            width: 100;
            height: 5%;
            background: palevioletred;
            text-align: center;
        }        
    </style>
</head>
<body>
    <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>

    <div id="total">
        <div id="above">
            <br>
            <?php 
                session_start();
                $id2 = $_SESSION['id'];
                if(isset($_GET['ID'])){
                    $id2 = $_GET['ID'];
                    $_SESSION['id2'] = $id2;
                }
                $id = $_SESSION['id2'];
                require 'connect.php';
                $query_name = "SELECT name FROM users WHERE ID='$id'";
                $result_name = mysqli_query($connect,$query_name);
                $name = mysqli_fetch_array($result_name)['name'];
            ?>
            <h3 style="background-color:greenyellow;">Welcome to <?php echo $name ?>'s page </h3>
            <a href="index.php">Click to go back !!!</a>
        </div>

        <div id="middle">
            <?php
                require 'connect.php';
                $search = "";
                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                }

            #Split page:
                $query_num_news = "SELECT * FROM news 
                        WHERE users_id='$id' AND title like '%$search%'";
                $result_num_news = mysqli_query($connect,$query_num_news);
                $num_news = mysqli_num_rows($result_num_news);

                $num_news_per_page = 3;
                $num_page = ceil($num_news / $num_news_per_page);

                $page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $num_page_bypass = $num_news_per_page*($page-1);

            #Search:
                $query_search = "SELECT * FROM news WHERE users_id='$id' AND title like '%$search%' 
                            LIMIT $num_news_per_page OFFSET $num_page_bypass";
                $result_search = mysqli_query($connect,$query_search);
            ?>

            <a href="news_insert.php?ID=<?php echo $id ?>">
                Add a new
            </a>

            <table border="1" width="100%">
                <caption>
                    <form>
                        Search <input type="search" name="search" value="<?php echo $search ?>">
                    </form>
                </caption>
                <tr>
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
                <?php foreach ($result_search as $each) { ?>
                    <tr>
                        <td>
                            <a href="../news_show_content.php?ID=<?php echo $each['ID'] ?>">
                                <?php echo $each['title'] ?>
                            </a>
                        </td>
                        <td>
                            <img src="<?php echo $each['picture'] ?>" height='100'>    
                        </td>
                        <td>
                            <a href="news_update.php?ID=<?php echo $each['ID'] ?>">
                                Update
                            </a>
                        </td>
                        <td>
                            <a href="news_delete.php?ID=<?php echo $each['ID'] ?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>     

            <?php for ($page=1; $page <= $num_page; $page++) { ?>
                    <a href="?ID=<?php echo $id ?> &page=<?php echo $page ?> &search=<?php echo $search ?>">
                        <?php echo $page ?>
                    </a>
            <?php } ?>
            
        </div>

        <div id="below">
            <h3 style="color:black">Have a nice day !!!</h2>
        </div>
    </div>

</body>
</html>
