<?php

$err = [];
if ($_POST) {
   if (isset($_POST['login_name']) != 0) {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $phone_num = $_POST['phone_num'];
      $email = $_POST['email'];
      $degree = $_POST['degree'];
     
      $login_name = $_POST['login_name'];
      $password = $_POST['password'];

      //$ruser_pass = $_POST['ruser_pass'];
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "205174"; //data pass
      $dbname = "onlinecourse"; // data name
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      $sql = "SELECT login_name FROM users where users.login_name='$login_name'";
      $result = mysqli_query($conn, $sql);
      //$row = mysqli_fetch_array($result);
      //mysqli_num_rows($result) > 0
      if (mysqli_num_rows($result) > 0) {
         $err['login_name'] = 'Tài Khoản Đã Tồn Tại';
      } else {

         //header("Location:login.php");
         // $sql = "INSERT INTO users(login_name) VALUES ('$login_name')";
         // $result = mysqli_query($conn, $sql);
         // $sql = "INSERT INTO teachers(first_name,last_name,phone_num,email,degree,login_name,password) VALUES ('$first_name','$last_name','$phone_num','$email','$degree','$login_name','$password')";

         $sql = "INSERT INTO users(users.login_name) VALUES ('$login_name')";
         $result = mysqli_query($conn, $sql);
        // $sql = "INSERT INTO teachers(teachers.first_name,teachers.last_name,teachers.phone_num,teachers.email,teachers.degree,teachers.login_name,teachers.password) VALUES ('$first_name','$last_name','$phone_num','$email','$degree','$login_name','$password')";
         

         //$query = mysqli_query($conn, $sql);
         if ($result) {
            $sql = "INSERT INTO teachers(teachers.first_name,teachers.last_name,teachers.phone_num,teachers.email,teachers.degree,teachers.login_name,teachers.password) VALUES ('$first_name','$last_name','$phone_num','$email','$degree','$login_name','$password')";
            $result = mysqli_query($conn, $sql);
            if($result){
               
               echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
               
            } else {
               echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="";</script>';
            }
         }
      }
   }
}

?>

<!--<!DOCTYPE html>
   <html>

   <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>

   <body>
      <form method="post" action="xuly.php">
<table>
   <tr>
      <td>Fullname</td>
      <td><input type="text" name="s_name" value="" /></td>
   </tr>

   <tr>
      <td>Email</td>
      <td><input type="text" name="email" value="" /></td>
   </tr>

   <tr>
      <td>Phone</td>
      <td><input type="text" name="phone_num" value="" /></td>
   </tr>

   <tr>
      <td>Degree</td>
      <td><input type="text" name="degree" value="" /></td>
   </tr>


   <tr>
      <td>Login name</td>
      <td><input type="text" name="login_name" value="" /></td>
   </tr>

   <tr>
      <td>Password</td>
      <td><input type="text" name="password" value="" /></td>
   </tr>




   <tr>
      <td></td>
      <td><input type="submit" name="teacherRegister" value="Đăng Ký" /></td>
   </tr>
</table>
</form>
</body>

</html>-->
<!DOCTYPE html>
<html>



<head>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <script src="https://kit.fontawesome.com/da3f2c352c.js" crossorigin="anonymous"></script> -->
   <link rel="stylesheet" href="css/signupcss.css">

</head>

<body>
   <!--<div id="id01" class="modal">-->
   <!--    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">times;</span>-->
   <form action="#" method="post" style="border:1px solid #ccc">
      <div class="container">
         <h1>Đăng kí</h1>
         <p>Vui lòng điền đơn dưới đây để tạo tài khoản</p>
         <hr>

         <label for="first_name"><b>First Name</b></label>
         <input class="su" type=" text" value="" placeholder="Enter your first name" name="first_name" required
            oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')"
            type="text">

         <label for="last_name"><b>Last Name</b></label>
         <input class="su" type="text" value="" placeholder="Enter your last name" name="last_name" required
            oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')"
            type="text">

         <label for="phone_num"><b>Phone Number</b></label>
         <input class="su" type="text" value="" placeholder="Enter your phone number" name="phone_num" required
            oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')"
            type="text">

         <label for="email"><b>Email</b></label>
         <input class="su" type="email" value="" placeholder="Enter your email" name="email" required
            oninvalid="this.setCustomValidity('Vui lòng nhập đúng dạng email')" onchange="this.setCustomValidity('')"
            type="text">

         <label for="degree"><b>Degree</b></label>
         <input class="su" type="text" value="" placeholder="Enter your degree" name="degree" required
            oninvalid="this.setCustomValidity('Bạn chưa điền ô này')" onchange="this.setCustomValidity('')" type="text">


         <label for="login_name"><b>Login name</b></label>
         <input class="su" type="text" value="" placeholder="Enter our login name" name="login_name" required
            oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')"
            type="text">
         <div style="margin-top:-10px">
            <span style="color: red">
               <?php echo (isset($err['login_name'])) ? $err['login_name'] : '' ?>
            </span>
         </div>
         <label for="password"><b>Password</b></label>
         <input class="su" type="password" value="" placeholder="Enter your password" name="password" required
            oninvalid="this.setCustomValidity('Bạn chưa điền ô nay!')" onchange="this.setCustomValidity('')"
            type="text">





         <!-- <label for="user_name"><b>DoB</b></label>
            <input type="date" name="dob" id="user_dob"> 
         <div style="margin-top:-10px">
            <span style="color: red">
               <?php echo (isset($err['ruser_pass'])) ? $err['ruser_pass'] : '' ?>
            </span>
         </div>-->


         <!--        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>-->

         <p style="margin-top:20px">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &
               Privacy</a>.</p>

         <div class="clearfix">
            <a href="login.php">
               <button type="button" class="cancelbtn">Cancel</button>
            </a>
            <button type="submit" class="signupbtn">Sign Up</button>
         </div>
      </div>
   </form>
   <!--</div>-->
</body>