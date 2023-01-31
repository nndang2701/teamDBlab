
<?php
if ($_POST) {
   $login_name = $_POST['login_name'];
   $password = $_POST['password'];
   //connectdata
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "205174"; //data pass
   $dbname = "onlinecourse"; // data name
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

   $result = mysqli_query($conn, "SELECT * FROM students where login_name='$login_name' and password='$password'");
   $row = mysqli_fetch_array($result);


   if (mysqli_num_rows($result) == 0) {
      echo "Tên đăng nhập hoặc mật khẩu không hợp lệ. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
      //echo '<p style="color: red">Tai khoan hoac mat khau khong chinh xac </p>';
      exit;
   }
   // else if ($password != $row['password']) {
   //    //So sánh 2 mật khẩu có trùng khớp hay không
   //    echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
   //    exit;
   // } 
   else if ($result) {
      // $_SESSION['user'] = $row;
      // header("Location:page1.php");
      echo '<script language="javascript">alert("Đăng nhập thành công"); window.location="";</script>';
   }
}

?>

<!DOCTYPE html>

<head>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/logincss.css">
   <script type="text/javascript" src="js/loginjs.js"></script>

</head>


<body>
   <form action="#" method="post">
      <div class="imgcontainer">
         <img style="width:200px;height:200px;" src="default_avatar.png" alt="Avatar" class="avatar">
         <div><strong>Đăng nhập vào tài khoản học sinh</strong></strong></div>
      </div>

      <div class="container">
         <label for="uname"><b>Username</b></label>
         <input type="text" placeholder="Enter Loginname" name="login_name" required>

         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="password" required>

         <!--<button type="submit">Login</button>-->
         <a href="?students.student_id="><button type="submit">Sign up</button></a>
         <a href="register.php"><button type="button">Sign up</button></a>

         <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
         </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
         <a href="admin.php">
            <button type="button" class="cancelbtn">Login with admin</button>
         </a>
         <a href="page1.php">
            <button type="button" class="cancelbtn">Cancel</button>
         </a>
         <span class="psw"><a href="#">Forgot password?</a></span>
      </div>
   </form>
</body>