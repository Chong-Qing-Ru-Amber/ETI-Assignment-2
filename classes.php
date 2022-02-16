<!DOCTYPE html>
<head>
    <title>Tutor - Classes</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th{
            background-color: #588c7e;
            color: white;
        }

        
    </style>
</head>
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
            </tr>
        </table>
    </nav>

    <table>
            <tr>
                <th>Class Code</th>
                <th>Class Schedule</th>
                <th>Class Capacity</th>
                <th>Tutor ID</th>
            <?php
                include_once("mysql_conn.php");
                $sql = "SELECT c.ClassCode, c.ClassSchedule, c.ClassCapacity, t.TutorID 
                        FROM Classes c INNER JOIN Tutors t ON c.TutorID=t.TutorID";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row["ClassCode"] ."</td><td>". $row["ClassSchedule"] ."</td><td>". $row["ClassCapacity"] ."</td><>/tr". $row["TutorID"] ."</td><>/tr";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 result";
                }

                $conn-> close();
            ?>
        </table>
</body>
