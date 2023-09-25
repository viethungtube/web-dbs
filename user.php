<?php require 'check_login.php' ?>

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

<?php if(isset($_GET['msg'])){ ?>
        <span style='color:green'>
            <?php echo $_GET['msg'] ?>
        </span>
<?php } ?>

<?php if(isset($_GET['error'])){ ?>
        <span style='color:red'>
            <?php echo $_GET['error'] ?>
        </span>
<?php } ?>

<div id="total">
    <div id="above">
        <?php 
            require 'admin/connect.php';
            $id = $_SESSION['id'];
            $query = "SELECT name FROM users WHERE ID='$id'";
            $result = mysqli_query($connect,$query);
            $name = mysqli_fetch_array($result)['name'];
        ?>
        <h3 style="background-color:seagreen;">Welcome to <?php echo $name ?>'s page </h3>
        <a href="user_change_profile.php">Click to change user information</a>
        <br>
        <a href="user_logout.php">Click to sign out !!!</a>
    </div>

    <div id="middle">
        <?php
            require 'admin/connect.php';
            $search = "";
            if(isset($_GET['search'])){
                $search = $_GET['search'];
            }

        #Split page:
            $id = $_SESSION['id'];
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

        <!-- Redirect page: -->
            User
            <?php
                if($_SESSION['level'] == 0){
                    $query_users = "SELECT * FROM users WHERE level='0'";
                }else{
                    $query_users = "SELECT * FROM users";
                }
                $result_users = mysqli_query($connect,$query_users); 
                // $query_news = "SELECT * FROM news";
                // $result_news = mysqli_query($connect,$query_news);
                // $each_new = mysqli_fetch_array($result_news);
            ?>

            <select name="select_user"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <?php foreach ($result_users as $each_user) { ?>
                <option value="user_lookat_each_other.php?ID=<?php echo $each_user['ID'] ?>"
                    <?php if($each_user['ID'] == $_SESSION['id']) { ?>
                        selected            
                    <?php } ?>
                >
                    <?php echo $each_user['name'] ?>
                </option>
            <?php } ?>
            </select>
            <br>

        <a href="news_insert.php">
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
                <?php $id = $each['ID']; ?>
                <tr>
                    <td>
                        <a href="news_show_content.php?ID=<?php echo $each['ID'] ?>">
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
                <a href="?page=<?php echo $page ?> &search=<?php echo $search ?>">
                    <?php echo $page ?>
                </a>
        <?php } ?>

        <br><br><br>
        <a href="user_delete_themselves.php">Delete the account</a>

    </div>

    <div id="below">
        <h3 style="color:black">Have a nice day !!!</h3>
    </div>
</div>

</body>
</html>
