<!DOCTYPE html>
<head>
    <title>Tutor - Timetable</title>
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
                <th>Timetable ID</th>
                <th>Lesson Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Module Code</th>
            <?php
                include_once("mysql_conn.php");
                $sql = "SELECT TimetableID, LessonDay, StartTime, EndTime, ModuleCode
                        FROM Timetable";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row["TimetableID"] ."</td><td>". $row["LessonDay"] ."</td><td>". $row["StartTime"] ."</td></tr>". $row["EndTime"] ."</td></tr>". $row["ModuleCode"] ."</td></tr>";
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
