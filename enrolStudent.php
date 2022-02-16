<!DOCTYPE html>
<head>
    <title>Tutor - Enrolled students</title>
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
                <th>Tutor ID</th>
                <th>Module Code</th>
                <th>Student ID</th>
            <?php
                include_once("mysql_conn.php");
                $sql = "SELECT TutorID, ModuleCode, StudentID
                        FROM EnrolledStudents";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        echo "<tr><td>". $row["TutorID"] ."</td><td>". $row["ModuleCode"] ."</td><td>". $row["StudentID"] ."</td></tr>";
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
