<!DOCTYPE html>
<head><title>Tutor - Tutor Particular</title></head>
<body>
    <header>
        <a href="index.php">
            <img src="logo.png" alt="EduFi LMS"> 
        </a>
    </header>
    <hr>
    <nav>
        <table cellspacing="5" cellpadding="5">
            <tr>
            <td><a href="index.php">Home</a></td>
                <td><a href="particular.php">Tutor Particular</a></td>
                <td><a href="module.php">Module(s)</a></td>
                <td><a href="classes.php">Classes</a></td>
                <td><a href="timetable.php">Timetable</a></td>
                <td><a href="enrolStudent.php">Enrolled students</a></td>
                <td><a href="rating.php">Ratings and comments</a></td>
                <?php
                $conn = mysql_connect("localhost", "root", "", "company");
                if (Sconn-> connect_error){
                    die("Connection failed:". $conn-> connect_error);
                }

                $sql = "SELECT TutorID, TutorName, TutorDescription FROM Tutors";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row["TutorID"] ."</td><td>". $row["TutorName"] ."</td><td>". $row["TutorDescription"] ."</td><>/tr";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 result";
                }

                $conn-> close();
                ?>
        </table>
    </nav>
</body>