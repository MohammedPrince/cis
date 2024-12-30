

<?php
include("include/functions.php");


if (isset($_GET['std'])){
    $std_index = $_GET['std'];
    $stud_index = Stud_Index($std_index);
    // Check if the student index is valid firest
    if ($stud_index) {
        // Proceed with fetching and displaying the student's data
        $student_profile_common = student_profile_common_sql($std_index);
        $batch = $student_profile_common['batch'];
        $major = $student_profile_common['major_code'];
        $faculty = $student_profile_common['faculty_code'];
        $current_sem = $student_profile_common['curr_sem'];
        $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
        $total_hours = Total_Hours($std_index);
        stud_course_mark_sql($std_index, $batch, $major, $faculty);
        $std_cert_data = Get_std_cert_Data($std_index);
    
  } 
    
  else {
         // Display error message if student index is not valid
          header("Location: ./404.php");
          exit();
    }
  }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="include/dist/img/fu.png">
    <title> <?php echo "[" . $std_cert_data['std_full_name_en'] . "-" . $stud_index['stud_id'] . "]-"; ?> Master Transcript</title>
</head>

<style>
    
@media print {
    @page {
        size: A4;
    }
}

body {
    margin-block-start: 0px;
    font-family: 'Times New Roman', Times, serif;
    font-size: 4px;
}

.top_main_body{
  margin-top: 20%;
    font-size: 14px;

}
.top_main_body-secand{
    font-size: 14px;

}



.main_body{
    
    font-size: 11px;
    line-height: 1.1;
}

h3 {
    font-size: 5px;
}

.tab {
    display: inline-block;
    margin-left: 25px;
}

h1 {
    text-align: center;
    font-size: 11px;
}
h3 {
    /* display: inline-block; */
    font-size: 5px;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1mm;
}

th{
    /* background: #eeee; */
    background: #D6D6D6;
}
th, td {
    /* border: solid 1px #999; */
   
    font-size: 4px;
    border: 0.5px solid black;
    padding: 1px;
}


/* line of border */
/* tbody tr:last-child td {
    border-bottom: none;
    
} */

.semester_summary {
    text-align: center;
    margin-left: 32px;
    font-size: 5px;
    font-weight: bold;
}

.signatures {

      display: flex;
      justify-content: space-between;
      margin-top:15%;
  }

  .signature {
    text-align: center;
    width: 45%;
}
.grading_system {
font-size: 4px;
}
</style>

<body>

<p class="top_main_body">Nationality No: <?php if(isset($stud_index)) echo $std_cert_data['national_number']; else echo "" ;?></p>
<p class="top_main_body-secand">University No: <?php if(isset($stud_index)) echo $std_cert_data['ministery_number']; else echo "" ;?></p>

<h1><?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>

    <p class="main_body">This is to certify that <b><u>
        <?php echo "/  " . $std_cert_data['std_full_name_en'] . "  /"; ?></u></b>
       <b>(
          <?php   

if($student_profile_common['nationality_code'] == 0){
  echo 'Foreign';
}
if($student_profile_common['nationality_code'] == 1){
  echo 'Sudanese Nationality';

}
if($student_profile_common['nationality_code'] == 4){
  echo 'Refugees';

}
?>)</b>
has successfully passed the prescribed examinations and is hereby awarded the degree of <strong><u><?php echo Get_Major_Name($student_profile_common['major_code']); ?></u></strong> by the senate of the university on the <strong><?php  echo Get_Format_Date($std_cert_data['senate_on']);  ?></strong>. With a <strong>CGPA <?php if(isset($stud_transcript_sql)) echo "/  " . $stud_transcript_sql['cgpa'] . "  /"; else echo "" ;?></strong>.<br> Below are the details of the grades he obtained.</p>

<?php
    // Retrieve the maximum semester value (assuming we go up to semester 10)
    $sem_sql = "SELECT MAX(curr_sem) AS newsem FROM `student_profile_common` WHERE `stud_id` = '$std_index'";
    $sem_query = mysqli_query($sis_con, $sem_sql);
    $sem_res = mysqli_fetch_array($sem_query);
    $newsem = $sem_res['newsem'];

    // Loop through each semester (from 1 to the max semester found)
    for ($i = 1; $i <= min(10, $newsem); $i++) {
        // Query to get courses for the current semester
$sql_2 = "SELECT cm.course_code, cm.weightage, cm.grade, cm.sub_grade1, cm.sub_grade2 
FROM `stud_course_mark` cm 
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

$row_count = 0;

// Display courses in pairs for the current semester
while ($stud_res = mysqli_fetch_array($query_2)) {
$CourseCode = $stud_res['course_code'];
$CourseName = Get_Course_Name($stud_res['course_code']);
$CRSLoad = $stud_res['weightage'];  // Credit Hours
$Grade = $stud_res['grade'];
$sub_grade1 = $stud_res['sub_grade1']; // Retrieve sub_grade1
$sub_grade2 = $stud_res['sub_grade2']; // Retrieve sub_grade2

 // Determine the display value for the grade
 if ($Grade !== 'F') {
    $displayGrade = $Grade; // Display the actual grade if not 'F'
} else {
    // If the grade is 'F', check sub_grades
    if ($sub_grade1 !== 'F') {
        $displayGrade = "F/" . $sub_grade1; // Display "F/" followed by sub_grade1 if it's not 'F'
    } elseif ($sub_grade2 !== 'F') {
        $displayGrade = "F/" . $sub_grade2; // Display sub_grade2 if sub_grade1 is 'F'
    } else {
        $displayGrade = "N/G"; // Display "N/G" if both sub_grades are 'F'
    }
}

// Pairing rows (2 subjects per row)
if ($row_count % 2 == 0) {
  echo "<tr>"; // Open a new row
}

// Display subject details
echo "<td align='center'>" . $CourseCode . "</td>";
echo "<td align='center'>" . $CRSLoad . "</td>";
echo "<td align='left'>" . $CourseName . "</td>";
echo "<td align='center'>" . $displayGrade . "</td>";

$row_count++;

if ($row_count % 2 == 0) {
  echo "</tr>"; // Close the row after two courses
}
}

// Close the last row if there is an odd number of subjects
if ($row_count % 2 != 0) {
echo "<td colspan='4'></td></tr>"; // Empty cells for second column if odd number of courses
}
echo "</tbody>";

// Retrieve GPA and CGPA for the current semester
$sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '$std_index' and `semester` = '$i'";
$query = mysqli_query($sis_con, $sql);
$trans_res = mysqli_fetch_array($query);
$gpa = $trans_res['gpa'];
$cgpa = $trans_res['cgpa'];

// End of the table for the current semester
echo "</table>";
echo "<p class='semester_summary'>
<strong>
GPA: {$gpa}<span class='tab'></span>CGPA: {$cgpa}</strong></p>";
}
    }
    ?>
    
<div class="signatures">

        <div class="signature">
          <strong>
            <p>Ust. Kawther Abu Elnaja</p>
            The University Registrar
            </strong>
        </div>
        <div class="signature">
        <strong>
            <p>Dr. Isameldeen Mohamed Khair</p>
            Deputy President for Academic Affairs
          </div>
        </strong>
    </div>

 

        <div class="grading_system">
            <p><u><b>The 4 point system is used CGPA of 2 is required to award degree</b></u></p>
            <p><Strong>A,A- Excellent
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            B+,B, B- Good
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            C+,C Pass&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            C-,D+,D Conditionally Passing</Strong></p>
            <p><Strong>F &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fall &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Z&nbsp;Unauthorized Absence, Falling &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                P Passing a P/F Course</Strong></p>
            <p><Strong>I &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; complete 
            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
            W&nbsp;Withdraw</Strong></p>
        </div>

        <p>Date of Issue: <?php echo  Transcript_Date_Format($std_cert_data['cert_printed_at']); ?></p>
    </div>

</body>
</html>

<div style="display: flex; justify-content: center; align-items: center;">

    <button id="backButton" onclick="goBack()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">
        Back to Request
    </button>

    <div style="width: 400px;"></div> <!-- Spacer -->

    <button id="printButton" onclick="printCertificate()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px; margin-right: 40px;">
        Print The Certificate
    </button>


</div>



<script>
function printCertificate() {
    const printButton = document.getElementById("printButton");
    const backButton = document.getElementById("backButton");

    // Hide both buttons before printing
    printButton.style.display = "none";  
    backButton.style.display = "none";  

    // Listen for print completion and then show the buttons again
    window.onafterprint = () => {
        printButton.style.display = "block";  // Show print button after printing
        backButton.style.display = "block";    // Show back button after printing
    };

    window.print();  // Print page
}

function goBack() {
    const printButton = document.getElementById("printButton");
    const backButton = document.getElementById("backButton");

    // Hide both buttons when going back
    printButton.style.display = "none";  
    backButton.style.display = "none";  

    // Navigate back to the previous page
    window.history.back();
}
</script>