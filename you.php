<?php

include("include/functions.php");


?>


<?php
    // Assuming you have a database connection $conn
    for ($i = 1; $i <= 10; $i++) {
        $sql = "SELECT * FROM course_details WHERE course_code = " . $i;
        $result = $sis_con->query($sql);
        $courses = array();
        $result = $sis_con->query($sql);
        if ($result === false) {
            echo "Error: " . $sis_con->error;
        }
        
        // Pass the $courses array to the HTML page
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Semester Courses</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        for ($i = 1; $i <= 5; $i++) {
            
            echo "<h2>Semester " . $i . "</h2>";
            echo "<table>";
            echo "<tr><th>Code</th><th>Cr.H</th><th>Subject</th><th>Grade</th></tr>";
            // Assuming $courses is an array of courses for the semester
            foreach ($courses as $course) {
                echo "<tr>";
                echo "<td>" . $course['code'] . "</td>";
                echo "<td>" . $course['credit_hours'] . "</td>";
                echo "<td>" . $course['subject'] . "</td>";
                echo "<td>" . $course['grade'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>
