<?php require 'check_login_admin.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin</title>
</head>
<body>
    
<nav class="navbar navbar-light justify-content-center fs-3 mb" style="background-color: #00ff5573;">
    Welcome to the admin page   
</nav>
<nav class="navbar navbar-light justify-content-center fs-5 mb-5" style="background-color: #00ff5573;">
    <a href="../user.php">Go to admin page news ||</a>
    <a href="../user_logout.php">Click to sign out !!!</a>
</nav>

<div class="container">
    <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>

    <?php
    #Split page:
        require 'connect.php';
        $id = $_SESSION['id'];
        $query_num_users = "SELECT * FROM users";
        $result_num_users = mysqli_query($connect,$query_num_users);
        $num_users = mysqli_num_rows($result_num_users);

        $num_users_per_page = 5;
        $num_page = ceil($num_users / $num_users_per_page);

        $page = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $num_page_bypass = $num_users_per_page*($page-1);

        $query = "SELECT * FROM users LIMIT $num_users_per_page OFFSET $num_page_bypass";
        $result = mysqli_query($connect,$query);
    ?>

<!-- Redirect page: -->
    User
    <?php
        $query_users = "SELECT * FROM users";
        $result_users = mysqli_query($connect,$query_users); 
    ?>

    <select name="select_user"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    <?php foreach ($result_users as $each_user) { ?>
        <option value="user.php?ID=<?php echo $each_user['ID'] ?>"
            <?php if($each_user['ID'] == $_SESSION['id']) { ?>
                    selected            
            <?php } ?>
            >
            <?php echo $each_user['name'] ?>
        </option>
    <?php } ?>
    </select>
    <br><br>

    <a href="user_insert.php" class="btn btn-dark mb-3">
        Add a new user
    </a>

    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Phone number</th>
            <th scope="col">Address</th>
            <th scope="col">Level</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_assoc($result)){ ?> 
                    <tr>
                        <td><?php echo $row['ID'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['phone_number'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['level'] ?></td>
                        <td>
                            <a href="user_update.php?ID=<?php echo $row['ID'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="user_delete.php?ID=<?php echo $row['ID'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php for ($page=1; $page <= $num_page; $page++) { ?>
        <a href="?page=<?php echo $page ?>">
            <?php echo $page ?>
        </a>
    <?php } ?>

</div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>