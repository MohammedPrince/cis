<?php
include("include/functions.php");

if(isset($_GET['std'])){

    $std_index = $_GET['std'];
  
    $stud_index = Stud_Index($std_index);
  
    $student_profile_common = student_profile_common_sql($std_index);
    $current_sem = $student_profile_common['curr_sem'];
    $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
    $total_hours = Total_Hours($std_index);
    stud_course_mark_sql($std_index);
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

// Retrieve the maximum semester value (assuming we go up to semester 10)
$sem_sql = "SELECT MAX(curr_sem) AS newsem FROM `student_profile_common` WHERE `stud_id` = '201602018'";
$sem_query = mysqli_query($sis_con, $sem_sql);
$sem_res = mysqli_fetch_array($sem_query);
$newsem = $sem_res['newsem'];

// Loop through each semester (from 1 to the max semester found)
for ($i = 1; $i <= min(10, $newsem); $i++) {
    
    // Query to get courses for the current semester
    $sql_2 = "SELECT * FROM `stud_course_mark` cm 
              WHERE cm.batch = '2016' 
              AND cm.stud_id = '201602018' 
              AND `faculty_code` = '2' 
              AND `major_code` = '2' 
              AND cm.semester = $i  
              ORDER BY `semester` ASC";
    
    $query_2 = mysqli_query($sis_con, $sql_2);

    // Check if there are courses for the current semester
    if (mysqli_num_rows($query_2) > 0) {
        // Output semester title
        echo "<h3 align='center'>Semester $i:- February 2021 - July 2021</h3>";
        
        // Start table for the semester
        echo "<table width='90%' align='center' border='1' cellpadding='5' cellspacing='0'>";
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

        // Retrieve GPA and CGPA for the current semester
        $sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '201602018' and `semester` = '$i'";
        $query = mysqli_query($sis_con, $sql);
        $trans_res = mysqli_fetch_array($query);
        $gpa = $trans_res['gpa'];
        $cgpa = $trans_res['cgpa'];

        // Display GPA and CGPA at the end of the table
        echo "<tr>";
        echo "<td colspan='4' align='center'><strong>GPA: $gpa</strong></td>";
        echo "<td colspan='4' align='center'><strong>CGPA: $cgpa</strong></td>";
        echo "</tr>";

        // End of the table for the current semester
        echo "</table><br><br>";
    }
}
?>
