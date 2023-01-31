<!DOCTYPE html>
<html lang="en">



<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/style.css">
   <title>Course</title>
</head>

<body>
   <header>
      <div class="logo">
         <a href="self.php"><img src="pic/logo.png"></a>
      </div>


      <div class="menu">
         <li><a href="teach.php">Teacher information</a></li>
         <li><a href="">Your information</a></li>
      </div>

      <div class="shop">
         <a href="" class='fas fa-shopping-cart'></a>
      </div>

      <div class="search">
         <form action="search.php" method="GET" id="searchForm">
            <input type="text" name="q" id="searchBar" placeholder="What you are looking for?" value="" maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()" />
            <button type="submit" name="submit" id="searchBtn">Search</button>
         </form>
      </div>
   </header>

   <form action="#" method="post">

      <div class="imgcontainer">
         <img style="width:200px;height:200px;" src="default_avatar.png" alt="Avatar" class="avatar">
         <div><strong>Chọn thành phần bạn muốn đăng kí</strong></strong></div>
         <a href="teacher.php"><button type="button">Giáo viên</button></a>
         <a href="student.php"><button type="button">Học sinh</button></a>
         <a href="login.php"><button type="button">Đăng nhập</button></a>
         <a href=""><button type="button">Trang chủ</button></a>
      </div>
      <!--<div class="containerr">

            <button type="submit">Login</button>
            <a href="teacher.php"><button type="button">Giáo viên</button></a>
            <a href="student.php"><button type="button">Học sinh</button></a>
            <a href="login.php"><button type="button">Đăng kí</button></a>


         </div>-->

   </form>
</body>