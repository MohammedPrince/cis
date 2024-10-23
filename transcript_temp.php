<?php
include("include/functions.php");

if(isset($_GET['std'])){
    $std_index = $_GET['std'];
    $stud_index = Stud_Index($std_index);
    $student_profile_common = student_profile_common_sql($std_index);
    $batch = $student_profile_common['batch'];
    $major = $student_profile_common['major_code'];
    $faculty = $student_profile_common['faculty_code'];
    $current_sem = $student_profile_common['curr_sem'];
    $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
    $total_hours = Total_Hours($std_index);
    stud_course_mark_sql($std_index, $batch, $major);
    $std_cert_data  = Get_std_cert_Data($std_index);
}

// Function to retrieve the course name based on the course code
function Get_Course_Name($code) {
    global $sis_con;
    $sqli = "SELECT * FROM `course_details` WHERE `course_code` = '$code' ";
    $query = mysqli_query($sis_con, $sqli);
    $row = mysqli_fetch_array($query);
    return $row['course_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Transcript</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 4px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 5mm;
        }
        th, td {
            font-size: 4px;
            border: 0.5px solid black;
            padding: 1px;
        }
        h3 {
            font-size: 4px;
        }
        tbody tr:last-child td {
            border-bottom: none;
        }
        tfoot td {
            font-size: 4px;
            padding: 2px;
            border: none;
        }
        @media print {
            @page {
                size: A4;
            }
        }
        .semester_summary {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 0px;
            font-size: 4px;
            font-weight: bold;
        }
        .tab {
            display: inline-block;
            margin-left: 25px;
        }
        h1 {
            text-align: center;
            font-size: 5px;
        }
        h3 {
            /* display: inline-block; */
            font-size: 5px;
        }
    </style>
</head>
<body>
    <br>
    <br>
<p>Nationality No: <?php if(isset($student_profile_common)) echo $student_profile_common['identity_no']; else echo "" ;?></p>
<p>University No:</p>

<h1><?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>

    <h3>This is to certify that
        <?php echo isset($stud_index) ? $stud_index['stud_name'] . " " . $stud_index['stud_surname'] . " " . $stud_index['familyname'] : "____________"; ?>
        has successfully passed the Administration <?php echo  Get_Mode($std_cert_data['mode']); ?>, by the senate of the university on the <?php  echo Get_Format_Date($std_cert_data['senate_on']);  ?>. He/She has completed all the <?php  echo $total_hours;?> Credit Hours of the program (Full Time) with a /<?php if(isset($stud_transcript_sql)) echo $stud_transcript_sql['cgpa']; else echo "" ;?>/.<br> Below are the details of his/her grades throughout the Ten semesters of the course of study.
    </h3>

    <?php
    // Retrieve the maximum semester value (assuming we go up to semester 10)
    $sem_sql = "SELECT MAX(curr_sem) AS newsem FROM `student_profile_common` WHERE `stud_id` = '201403018'";
    $sem_query = mysqli_query($sis_con, $sem_sql);
    $sem_res = mysqli_fetch_array($sem_query);
    $newsem = $sem_res['newsem'];

    // Loop through each semester (from 1 to the max semester found)
    for ($i = 1; $i <= min(10, $newsem); $i++) {
        // Query to get courses for the current semester
        $sql_2 = "SELECT * FROM `stud_course_mark` cm 
                  WHERE cm.batch = '$batch' 
                  AND cm.stud_id = '$std_index' 
                  AND `faculty_code` = '$faculty' 
                  AND `major_code` = '$major' 
                  AND cm.semester = $i  
                  ORDER BY `semester` ASC";
        
        $query_2 = mysqli_query($sis_con, $sql_2);

        // Check if there are courses for the current semester
        if (mysqli_num_rows($query_2) > 0) {
            // Output semester title
            echo "<h3 align='left'>Semester $i:- February 2021 - July 2021</h3>";
            
            // Start table for the semester
            echo "<table>";
            echo "<tr>";
            echo "<th>Code</th>";
            echo "<th>Cr.H</th>";
            echo "<th>Subject</th>";
            echo "<th>Grade</th>";
            echo "<th>Code</th>";
            echo "<th>Cr.H</th>";
            echo "<th>Subject</th>";
            echo "<th>Grade</th>";
            echo "</tr>";

            echo "<tbody>";

            $row_count = 0;

            // Display courses in pairs for the current semester
            while ($stud_res = mysqli_fetch_array($query_2)) {
                $CourseCode = $stud_res['course_code'];
                $CourseName = Get_Course_Name($stud_res['course_code']);
                $CRSLoad = $stud_res['weightage'];  // Credit Hours
                $Grade = $stud_res['grade'];
                
                // Pairing rows (2 subjects per row)
                if ($row_count % 2 == 0) {
                    // Open a new row
                    echo "<tr>";
                }
                
                // Display subject details
                echo "<td align='center'>" . $CourseCode . "</td>";
                echo "<td align='center'>" . $CRSLoad . "</td>";
                echo "<td align='left'>" . $CourseName . "</td>";
                echo "<td align='center'>" . $Grade . "</td>";

                $row_count++;

                if ($row_count % 2 == 0) {
                    // Close the row after two courses
                    echo "</tr>";
                }
            }

            // Close the last row if there is an odd number of subjects
            if ($row_count % 2 != 0) {
                echo "<td colspan='4'></td></tr>"; // Empty cells for second column if odd number of courses
            }
            echo "</tbody>";

            // Retrieve GPA and CGPA for the current semester
            $sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '201602018' and `semester` = '$i'";
            $query = mysqli_query($sis_con, $sql);
            $trans_res = mysqli_fetch_array($query);
            $gpa = $trans_res['gpa'];
            $cgpa = $trans_res['cgpa'];

            // End of the table for the current semester
            echo "</table>";
            echo "<p class='semester_summary'>
            <strong>
            GPA: {$gpa}<span class='tab'></span>CGPA: {$cgpa}.</strong></p>";
        }
    }
    ?>

</body>
</html>