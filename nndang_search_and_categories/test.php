<html>
    <head>
        <title> Search Bar </title>
        <link rel="stylesheet" href="style.css" />
        <script type="text/javascript">
            function active(){
                var searchBar = document.getElementById('searchBar');
                if(searchBar.value=='Search...'){
                    searchBar.value =''
                    searchBar.placeholder = 'Search...'
                }
            }
            function inactive(){
                var searchBar = document.getElementById('searchBar');
                if(searchBar.value==''){
                    searchBar.value = 'Search...'
                    searchBar.placeholder = ''
                }
            }
        </script>
    </head>
    <body>
        <form action="test.php" method="GET" id="searchForm">
            <input type="text" name="q" id="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="off" onmousedown="active()" onblur="inactive()"/>
            <input type="submit" name="submit" id="searchBtn" value="Go!"/>
            
        </form>
        <?php
        if(isset($_GET["submit"])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "subject";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $q=trim($_GET["q"]);
            $sql = "SELECT SubjectID, SubjectName, Description FROM subject WHERE SubjectName LIKE '%$q%'" ;
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "id: " . $row["SubjectID"]. " - Subject: " . $row["SubjectName"]. " " . $row["Description"]. "<br>";
                }
            } else {
                echo "0 results";
            }
        }
        ?>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "subject";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            if (isset($_POST["web"])) {
                $sql = "SELECT SubjectID, SubjectName, Description FROM subject WHERE FieldID =1" ;
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) { 
        ?>
                        <tr>
                            <a href="view.php?id=<?php echo $row['SubjectName'] ?>"><li><?= $row['SubjectName']?></li></a>
                        </tr>
        <?php
                    }
                } else {
                    echo "0 results";
                }
                
            }

            if (isset($_POST["marchinelearning"])) {
                $sql = "SELECT SubjectID, SubjectName, Description FROM subject WHERE FieldID =2" ;
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        ?>
                        
                <tr>
                    <a href="view.php?id=<?php echo $row['SubjectName'] ?>"><li><?= $row['SubjectName']?></li></a>
                </tr>
        <?php            }
                } else {
                    echo "0 results";
                }
                
            }

            if (isset($_POST["datascience"])) {
                $sql = "SELECT SubjectID, SubjectName, Description FROM subject WHERE FieldID =3" ;
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
        ?>
                        <tr>
                            <a href="view.php?id=<?php echo $row['SubjectName'] ?>"><li><?= $row['SubjectName']?></li></a>
                        </tr>
        <?php
                    }
                } else {
                    echo "0 results";
                }
                
            }
        ?>
        <form method="post">
            <input type="submit" name="web" value="Website">
            <input type="submit" name="marchinelearning" value="Marchine Learning">
            <input type="submit" name="datascience" value="Data Science">
        </form>
    </body>
</html>