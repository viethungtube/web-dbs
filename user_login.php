<?php
   $error = "";
   $email_cookie = "";
   session_start();
   if(isset($_SESSION['id'])){
      header('location:user.php');
      exit;
   }

   if(isset($_POST['submit'])){
         
         
         require 'admin/connect.php';

         $query = "SELECT * FROM users WHERE email = ? AND password = ?";
         $stmt = mysqli_prepare($connect, $query);
         $email = $_POST['email'];
         $password = $_POST['password'];
         mysqli_stmt_bind_param($stmt, "ss", $email, $password);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         if(mysqli_num_rows($result) == 1){
            if(isset($_POST['remember'])){
                  setcookie('email',$email,time()+60*60*24*30);
                  setcookie('password',$password,time()+60*60*24*30);
            }else{
                  setcookie('email');
                  setcookie('password');
            }

            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['ID'];
            $_SESSION['name'] = $each['name'];
            $_SESSION['level'] = $each['level'];
            if($_SESSION['level'] == 0){
               header('location:user.php');
               exit;
            }else{
               header('location:admin/index.php');
               exit;
            }
         }else{
            $error = "Please enter valid login details !";
         }
   }

   if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
         $email_cookie = $_COOKIE['email'];
         $password_cookie = $_COOKIE['password'];
         $set_remember = "checked='checked'";
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Log In</title>

      <!--Made with love by Mutiullah Samim -->
      <!--Bootsrap 4 CDN-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <!--Fontawesome CDN-->
      <link rel="stylesheet" href="https://use.fontawesomeme.com/releases/v5.3.1/css/all.css">
      <!--Custom styles-->
      <link rel="stylesheet" type="text/css" href="style_login.css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->

   </head>
   <body>
      <div class="container">
         <div class="d-flex justify-content-center h-100">
            <div class="card">
               <div class="card-header">
                  <h3>Sign In</h3>
               </div>
               <div class="card-body">
                  <form method="POST">
                     <div class="input-group form-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email_cookie ?>">
                     </div>
                     <div class="input-group form-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password_cookie ?>">
                     </div>
<!-- <div class="row align-items-center remember">
<input type="checkbox" name="remember" <?php echo $set_remember ?>>Remember Me
</div> -->
                     <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                     </div>
                  </form>

                    <!-- Way 1: -->
                    <span style='color:red'><?php echo $error ?></span>
                    <!-- #Way 2: -->
                    <!-- <span class="error"><?php echo $error ?></span> -->
               
               </div>
               <br>
               <div class="card-footer">
                  <div class="d-flex justify-content-center links">
                     Don't have an account?<a href="user_signup.php">Sign Up</a>
                  </div>
                  <!-- <div class="d-flex justify-content-center">
                     <a href="#">Forgot your password?</a>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
