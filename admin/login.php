<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Administrator Login</title>
  <!-- Fontawesome icon offline -->
   <link href="fontawesome/css/all.css" rel="stylesheet">
  <!-- Fontawsome icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>
    .login-body{
      width: 30%;
      color: white;
    }
    .card-head{
      text-align: center;
      font-size: 30px;
      /*margin-top: 50px;*/
      font-weight: bold;
    }

</style>
</head>

<body style="background-color: rgb(29, 53, 73);">
  
  <div class="container-fluid mt-5 login-body">
      <!-- Heading -->
      <div class="card wow fadeIn" style="background-color: rgb(29, 135, 220);">
        <span style="text-align: center;margin-top: 30px;">
          <img src="img/avatar_2x.png" width="150" style="border-radius: 10px;">
          <br>
          Administrator Login
        </span>
        <div class="card-head">
          PERFECTOS
        </div>
        <!--Card content-->
        <div class="card-body" >
          <form method="POST">
            <div class="form-group">
              <label>Username</label>
             <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
             <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group" style="text-align: center;">
             <button class="btn btn-success" name="login">login</button>
           </div>
          </form>
        </div>
      </div>
    </div>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>
</html>
<?php 
include "db-con.php";
if(isset($_POST['login'])){
  $username = mysqli_real_escape_string($connect,$_POST['username']);
  $password = mysqli_real_escape_string($connect,$_POST['password']);
  $enpassword = md5($password);
  
  $cek=mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `login-admin` WHERE username='$username' AND password='$enpassword'"));
  $data=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `login-admin` WHERE username='$username' AND password='$enpassword'"));
  if($cek>0){
    session_start();
    $_SESSION['username']=$data['username'];
    $_SESSION['authority']=$data['authority'];
    echo "<script language=\"javascript\">document.location.href='index.php';</script>";
  }else{
        echo '<script>alert("Invalid User")</script>';
        echo "<script language=\"javascript\">document.location.href='login.php';</script>";
  }

}

 ?>
