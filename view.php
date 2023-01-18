<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "subject";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password,$dbname);
            $id = trim($_GET["id"]);
            echo $id ."<br>";
            $sql = "SELECT SubjectName,Description FROM subject WHERE SubjectName='$id'" ;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
                while($row = mysqli_fetch_assoc($result)) { 
                    echo "<br>"." - Description: " . $row["Description"]."<br>";
                }
            } else {
                echo "0 results";
            }
            echo "<br>"." Classes: "."<br>";
            //print out the classes
            $sql1 = "SELECT * FROM class ,teacher,subject WHERE class.TeacherID=teacher.TeacherID and class.SubjectID=subject.SubjectID and subject.SubjectName='$id'" ;
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) > 0) {
            // output data of each row
                while($row1 = mysqli_fetch_assoc($result1)) { 
?>
                    
                <tr>
                    <td><a href="teacher.php?id=<?php echo $row1['TeacherID'] ?>"><li><?= $row1['Last_name']." ".$row1["First_name"]?></li></a></td>
                    <td><?php echo " ".$row1["Level"]."  ".$row1["Fee"]."<br>"; ?> </td>
                </tr>
<?php
                }
            } else {
                echo "0 results";
            }
?>