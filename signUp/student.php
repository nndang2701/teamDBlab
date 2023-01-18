<?php
include "connectData/connectData.php";
global $conn;
?>

<?php

$err = [];
if ($_POST) {
   if (isset($_POST['login_name']) != 0) {
      $s_name = $_POST['s_name'];
      $email = $_POST['email'];
      $login_name = $_POST['login_name'];
      $password = $_POST['password'];
      $phone_num = $_POST['phone_num'];

      //$ruser_pass = $_POST['ruser_pass'];

      $sql = "SELECT account FROM student where account='$login_name'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);

      if ($row) {
         $err['account'] = 'Tài Khoản Đã Tồn Tại';
      } else {

         //header("Location:login.php");
         $sql = "INSERT INTO student(s_name,email,login_name,password,phone_num) VALUES ('$s_name','$email','$login_name','$password','$phone_num')";

         $query = mysqli_query($conn, $sql);
      }
   }
}

?>

<!DOCTYPE html>
<html>

<head>
   <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
   <!--<form method="post" action="xuly.php">-->
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
         <td>Login name</td>
         <td><input type="text" name="login_name" value="" /></td>
      </tr>

      <tr>
         <td>Password</td>
         <td><input type="text" name="password" value="" /></td>
      </tr>


      <tr>
         <td>Phone</td>
         <td><input type="text" name="phone_num" value="" /></td>
      </tr>


      <tr>
         <td></td>
         <td><input type="submit" name="studentRegister" value="Đăng Ký" /></td>
      </tr>
   </table>
   <!--</form>-->
</body>

</html>