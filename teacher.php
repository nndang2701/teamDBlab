<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "subject";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $id = trim($_GET["id"]); 
            $sql = "SELECT * FROM teacher WHERE TeacherID='$id'" ;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
                while($row = mysqli_fetch_assoc($result)) { 
                    echo "<br>" . $row["Last_name"]." ".$row["First_name"]." ".$row["Birthday"]." ".$row["Email"]." ".$row["Contact_phone"]." ".$row["Degree"].$row["Rank"]."<br>";
                }
            } else {
                echo "0 results";
            }
            
?>