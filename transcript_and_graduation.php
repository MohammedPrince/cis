
<?php
require_once __DIR__ . "/include/functions.php";
require_once __DIR__ . "/include/helpers.php";


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
        $total_hours =Total_Hours($std_index,$batch,$major);
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
    <title>Transcript & Graduation</title>

    <link rel="stylesheet" href="./include/dist/css/transcript_temp.css">
    <link rel="stylesheet" href="./include/dist/css/bachelor_temp.css">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        
        @media print {
            .no-print { 
                display: none !important; 
            }
            .page-break { 
                page-break-before: always; 
            }
        }
        
        .page-break { 
            page-break-before: always;
            display: block;
            height: 1px;
            margin: 0;
            padding: 0;
        }
    
      iframe {
        display: none; /* Hide iframe to avoid showing preview */
      }
     h3 {
        font-size: 10pt;}

th, td {
    font-size: 8pt;

}

 .semester_summary{
    font-size : 9pt
 }
 .semester-title {

        background-color: transparent !important;
        color: black !important; /* Ensure the text color is also visible */
        font-family: 'Times New Roman', Times, serif;
    }
 @media print {
    th {
        background-color: #D3D3D3 !important;
        -webkit-print-color-adjust: exact; /* For Safari/Chrome */
        print-color-adjust: exact; /* For modern browsers */
        color: black  !important;
        font-weight:bold ;
    }
    
@media print {
    .semester-title {
        background-color: transparent !important;
        color: black !important; /* Ensure the text color is also visible */
    }
}

}
 /* Ensure page numbers appear on every page */
 @page {
    margin-bottom: 2.5cm;
        margin-right:2cm;
        margin-left:2cm;
    size: A4;
 
        @bottom-right {
            /* content: "Page " counter(page) " of " counter(pages); */
            font-size: 8pt; /* Adjust font size here */
        }}
@media print {
    .exportButton {
        display: none !important;
    }
    @page {
       size: A4;
        margin-bottom: 2.5cm;
        margin-right:2cm;
        margin-left:2cm;
     
    }
    .footnote{
        display:none;
    }
}
table {
        page-break-inside: avoid;
        font-family: 'Times New Roman', Times, serif;
        border-collapse: collapse; 
       
    }
    
.grading_system {
margin-top:10px;
font-size: 3pt;}

.signature {
    text-align: center;
    width: 45%;
} 


.signatures {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 3cm;
}

.signature {
    text-align: center;
    flex: 1;
    max-width: 50%; /* Limit each signature to half the width */
}
.sig{
    margin-top:3cm;
}

td {
    line-height: 1; /* smaller than default */
   
  }
  th{
    line-height: 0.3;
  }
 
p{
    line-height: 8pt;
}@media print {
  .repeat-header {
    page-break-inside: avoid;
    font-size: 10pt;
    font-family: 'Times New Roman', Times, serif;
  }
}


    </style>
</head>

<body>
    <div id="printContent">
  <!-- Your transcript content here -->


<div class="top_main_body" style="margin-top: 3.5cm;" id="top_main_body">
<p  style= "font-size : 10pt;font-weight: bold;font-family: 'Times New Roman', Times, serif; margin:2px 0; ">Nationality No: <?php if(isset($stud_index)) echo $std_cert_data['national_number']; else echo "" ;?></p>
<p  style= "font-size : 10pt;font-weight: bold; font-family: 'Times New Roman', Times, serif; margin:2px 0;">University No: <?php if(isset($stud_index)) echo $std_cert_data['ministery_number']; else echo "" ;?></p>

</div>

<h1  style="margin-top:0.8cm;  font-size:15pt;font-weight: bold; font-family: 'Times New Roman', Times, serif;margin-bottom:0.8cm;text-align:center;" ><?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>

    <p class="main_body" style=" font-size:12pt;text-align: justify;font-family: 'Times New Roman', Times, serif;">This is to certify that <b><u style= "font-size : 14pt;">
        <?php echo "/" . $std_cert_data['std_full_name_en'] . "/"; ?></u></b>
       <b>(<?php   

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
has successfully passed the prescribed examinations and is hereby awarded the degree of <b><?php  echo Get_Major_Name($student_profile_common['major_code']); ?></b>
<b></b> <b><?php echo  Get_Mode($std_cert_data['mode']) . '' . Get_Division($std_cert_data['division']) ; ?></b>, by the University Senate on the <strong><?php
$date = $std_cert_data['senate_on']; // e.g., "2025-11-11"
$timestamp = strtotime($date);

$day = date('j', $timestamp); // e.g., 11
$month = date('F', $timestamp); // e.g., November
$year = date('Y', $timestamp); // e.g., 2025

// function suffix($number) {
//     if (!in_array($number % 100, [11, 12, 13])) {
//         switch ($number % 10) {
//             case 1: return 'st';
//             case 2: return 'nd';
//             case 3: return 'rd';
//         }
//     }
//     return 'th';
// }

echo $day . "<sup>" . suffix($day) . "</sup> $month $year";
?>
</strong>. He/She has completed all the <strong><?php  echo $total_hours;?> Credit Hours</strong> of the program <strong>(Full Time)</strong> with a <strong>CGPA <?php if(isset($stud_transcript_sql)) echo "/" . $stud_transcript_sql['cgpa'] . "/"; else echo "" ;?></strong>.<br> Below are the details of his/her grades throughout the <strong>Ten</strong> semesters of the course of study.</p>

    <?php
    // Retrieve the maximum semester value (assuming we go up to semester 10)
    $sem_sql = "SELECT MAX(curr_sem) AS newsem FROM student_profile_common WHERE stud_id = '$std_index'";
    $sem_query = mysqli_query($sis_con, $sem_sql);
    $sem_res = mysqli_fetch_array($sem_query);
    $newsem = $sem_res['newsem'];
    $header_printed = false;
    // Loop through each semester (from 1 to the max semester found)
    for ($i = 1; $i <= min(10, $newsem); $i++) {
        // Query to get courses for the current semester
        
$sql_2 = "SELECT cm.course_code,crs.course_name,  cm.grade, cm.sub_grade1, cm.sub_grade2 ,Crs.course_units,crs.course_semester
FROM stud_course_mark cm , course_details Crs 
WHERE 
crs.course_code=cm.course_code and crs.major_code=cm.major_code
and crs.batch=cm.batch 
and cm.batch = '$batch' 
AND cm.stud_id = '$std_index' 
AND cm.faculty_code = '$faculty' 
AND cm.major_code = '$major' 
And crs.course_semester = $i
AND cm.semester = $i
ORDER BY cm.semester ASC";
 
$query_2 = mysqli_query($sis_con, $sql_2);
if ($i == 5 && !$header_printed) {

    echo "<div style='page-break-before: always;'></div>"; // Page break
    echo "<div class='repeat-header' style='margin-top:1.5cm; margin-bottom: 0.5cm; font-size: 10pt;'>
            <table style='width: 100%; border-collapse: collapse; font-family: \"Times New Roman\", Times, serif; border:none;'>
              <tr>
                <td style='font-weight: bold;border:none;'>University No: " . $std_cert_data['ministery_number'] . "</td>
                <td style='font-weight: bold; text-align: right;border:none;'>Name: <u>" . $std_cert_data['std_full_name_en'] . "</u></td>
              </tr>
            </table>
          </div>";
    $header_printed = true;
}

// Check if there are courses for the current semester
if (mysqli_num_rows($query_2) > 0) {

  $numberToWord = [
    1 => 'One',
    2 => 'Two',
    3 => 'Three',
    4 => 'Four',
    5 => 'Five',
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten'

  ];
  
  $semesterWord = isset($numberToWord[$i]) ? $numberToWord[$i] : $i;
  
  

// Start table for the semester
echo "<table style=' margin: 0; padding: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt;margin-top:-5px;'>";
// First row with semester title spanning all columns
echo "<tr>";
echo "<th colspan='8' class='semester-title' style='border: none; font-size: 8pt; text-align: left;line-height: 1;'>
Semester $semesterWord: February 2021 - July 2021
</th>";
echo "</tr>";

echo "<tr>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 4%;background-color:#D3D3D3;padding-left: 10px;'>Code</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 0.8%;background-color:#D3D3D3;padding-left: 10px;'>Cr.H</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 16.5%;background-color:#D3D3D3;padding-left: 10px;'>Subject</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 0.8%;background-color:#D3D3D3;padding-left: 10px;'>Grade</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 4%;background-color:#D3D3D3;padding-left: 10px;'>Code</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 0.8%;background-color:#D3D3D3;padding-left: 10px;'>Cr.H</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 16.5%;background-color:#D3D3D3;padding-left: 10px;'>Subject</th>";
echo "<th style='border: 1px solid #000; padding: 1px; width: 0.8%;background-color:#D3D3D3;padding-left: 10px;'>Grade</th>";
echo "</tr>";

$row_count = 0;
// added to prevent dublication
$printedCourses = [];

// Display courses in pairs for the current semester
while ($stud_res = mysqli_fetch_array($query_2)) {

$CourseCode = $stud_res['course_code'];
//$CourseName = Get_Course_Name($stud_res['course_code']);

// added to prevent dublication
  if (in_array($CourseCode, $printedCourses)) {
        continue;
    }
    //  Mark this course as printed
    $printedCourses[] = $CourseCode;
$CourseName=$stud_res['course_name'];
$CRSLoad = $stud_res['course_units'];  // Credit Hours
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
  echo "<tr style='height:1px;'>"; // Open a new row
}

// Display subject details
// echo "<td c>" . $CourseCode . "</td>";
// echo "<td align='center'>" . $CRSLoad . "</td>";
// echo "<td align='left'>" . $CourseName . "</td>";
// echo "<td align='center'>" . $displayGrade . "</td>";
echo "<td  style='" . (empty($CourseCode) ? "border: none;" : "border: 1px solid #000;padding-left: 10px;") . "'> " . $CourseCode . "</td>";
echo "<td  align='center'style='" . (empty($CRSLoad) ? "border: none;" : "border: 1px solid #000;") . "'> " . $CRSLoad . "</td>";
echo "<td  style='" . (empty($CourseName) ? "border: none;" : "border: 1px solid #000;padding-left: 10px;") . "'> " . $CourseName . "</td>";
echo "<td  style='" . (empty($displayGrade) ? "border: none;" : "border: 1px solid #000;padding-left: 10px;") . "'> " . $displayGrade . "</td>";

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
$sql = "SELECT * FROM stud_transcript_table WHERE stud_id = '$std_index' and semester = '$i'";
$query = mysqli_query($sis_con, $sql);
$trans_res = mysqli_fetch_array($query);
$gpa = $trans_res['gpa'];
$cgpa = $trans_res['cgpa'];
echo "<tr style='border: none; background: none;'>";

// echo "<td colspan='8' style='text-align: right; border: none; padding-top: 10px; padding-bottom: 10px; font-weight: bold;padding-right: 280px;'>
//         GPA: {$gpa}  
//       </td>";
// echo "</tr>";
echo "<tr style='border: none; background: none;'>";
echo "<td colspan='8' style='text-align: right; border: none; padding-bottom: 5px; font-weight: bold;padding-right: 100px;'>
        <span style='margin-right: 60px;'>GPA: {$gpa}</span>  <span>CGPA: {$cgpa}</span>
      </td>";
echo "</tr>";

// End of the table for the current semester
echo "</table>";
}
    }
    ?>


<table style="width: 100%; border:none;outline:none;border-collapse: collapse;margin-top: 1.5cm; margin-bottom: 0.5cm;font-family: 'Times New Roman', Times, serif;">
    <tr  class="sig"  style="border:none;">
        <td style="padding-top: 100px;text-align: center; font-size: 10pt;border:none;">
            <strong>
                <p style="margin: 0;font-family: 'Times New Roman', Times, serif;">MRS. KAWTHER ABUELNAJA</p>
                <span style="font-family: 'Monotype Corsiva';font-weight: normal;">The University Registrar</span>
            </strong>
        </td>
        <td style="text-align: center; font-size: 10pt;border:none;">
            <strong>
                <p style="margin: 0;font-family: 'Times New Roman', Times, serif;">SE. ASSOC. PROF. KHALID SHEIKHIDRIS MOHAMED</p>
                <span style="font-family: 'Monotype Corsiva';font-weight: normal;">Assistant President for Academic Affairs</span>
            </strong>
        </td>
    </tr>
    
   
</table>

<p style="font-size: 8pt; margin-left:0px"><u><b>The 4 point system is used. CGPA of 2 is required to award the degree.</b></u></p>
<table style="width: 60%; border-collapse: collapse; margin-left:0px; font-family: 'Times New Roman', Times, serif;">
    <tr style="border:none;">
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>A, A- Excellent</strong></td>
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>B+, B, B- Very Good</strong></td>
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>C+, C Good</strong></td>
        <td style="padding:1px; border:none; font-size: 6pt;"><strong>C-, D+, D Conditionally Passing</strong></td>
    </tr>
    <tr style="border:none;">
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>F Fail</strong></td>
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>Z Unauthorized Absence, Failing</strong></td>
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>P Passing a P/F Course</strong></td>
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>IP In Progress</strong></td>
    </tr>
    <tr style="border:none;">
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>I Incomplete</strong></td>
        <td style="padding: 1px; border:none; font-size: 6pt;"><strong>W Withdraw</strong></td>
    </tr>
    <tr style="border:none;">
        <td colspan="4" style="padding: 10px; border:none; font-size: 8pt;">
            <!-- <p style="margin: 0;font-weight: bold; ">Date of Issue: <?php echo Transcript_Date_Format($std_cert_data['cert_printed_at']); ?></p> -->
        <p style="margin: 1;font-weight: bold;">
  Date of Issue: 
  <?php
$date = $std_cert_data['cert_printed_at']; // e.g., "2025-11-11"
$timestamp = strtotime($date);

$day = date('j', $timestamp); // e.g., 11
$month = date('F', $timestamp); // e.g., November
$year = date('Y', $timestamp); // e.g., 2025

// function suffixx($number) {
//     if (!in_array($number % 100, [11, 12, 13])) {
//         switch ($number % 10) {
//             case 1: return 'st';
//             case 2: return 'nd';
//             case 3: return 'rd';
//         }
//     }
//     return 'th';
// }

echo $day . "<sup>" . suffixx($day) . "</sup> $month $year";
?>

</p>

          </td>
    </tr>
</table>
</div>
    </div>
  <div class="page-break"></div>
 <div class="header" style="margin-top: 3.5cm;">
        <div class="header" >
        <p  style= "font-size : 10pt;font-weight: bold;font-family: 'Times New Roman', Times, serif; margin:2px 0; ">Nationality No: <?php if(isset($stud_index)) echo $std_cert_data['national_number']; else echo "" ;?></p>
        <p  style= "font-size : 10pt;font-weight: bold; font-family: 'Times New Roman', Times, serif; margin:2px 0;">University No: <?php if(isset($stud_index)) echo $std_cert_data['ministery_number']; else echo "" ;?></p>

        <h1  style="margin-top:3cm;  font-size:15pt;font-weight: bold; font-family: 'Times New Roman', Times, serif;margin-bottom:0.8cm;text-align:center;" ><?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>

    
    <style>
    
    body{
        font-family: 'Times New Roman', Times, serif;
    }
    
@media print {
    .exportButton {
        display: none !important;
    }}
    </style>
    
    </div>
    <br>

    <div class="main-content" style="margin-left:0cm; margin-right:0cm;text-align: justify;">
        <p class="big" style = "font-size:12pt ; font-family: 'Times New Roman', Times, serif;text-align: justify;">This is to certify that /<b style="font-size:14pt ;"><u> <?php if(isset($stud_index)) echo $std_cert_data['std_full_name_en'] ; else echo "";  ?></b></u>/
        (<b style="font-family: 'Times New Roman', Times, serif;"><?php   

if($student_profile_common['nationality_code'] == 0){
  echo 'Foreign';
}
if($student_profile_common['nationality_code'] == 1){
  echo 'Sudanese Nationality';

}
if($student_profile_common['nationality_code'] == 4){
  echo 'Refugees';

}
?></b>)<b style="font-size:12pt ;font-weight: normal;"> has successfully passed the prescribed examination and is hereby awarded the degree of</b> <b> <?php  echo Get_Major_Name($student_profile_common['major_code']); ?></b> <strong>(Full Time)</strong>
<b style=" font-family: 'Times New Roman', Times, serif;font-size:12pt ;"> <b><?php echo  Get_Mode($std_cert_data['mode']) . '' . Get_Division($std_cert_data['division']) ; ?></b>,
<b style="font-size:12pt ;font-weight: normal;">by the University Senate on the </b><b><?php
$date = $std_cert_data['senate_on']; // e.g., "2025-11-11"
$timestamp = strtotime($date);

$day = date('j', $timestamp); // e.g., 11
$month = date('F', $timestamp); // e.g., November
$year = date('Y', $timestamp); // e.g., 2025

// function suffix($number) {
//     if (!in_array($number % 100, [11, 12, 13])) {
//         switch ($number % 10) {
//             case 1: return 'st';
//             case 2: return 'nd';
//             case 3: return 'rd';
//         }
//     }
//     return 'th';
// }

echo $day . "<sup>" . suffix($day) . "</sup> $month $year";
?></b>.
</p>
    </div>

    <table style="width: 100%; border:none;outline:none;border-collapse: collapse;margin-top: 4cm; margin-bottom: 0.6cm;font-family: 'Times New Roman', Times, serif;">
    <tr  class="sig"  style="border:none;">
        <td style="padding-top: 100px;text-align: center; font-size: 10pt;border:none;">
            <strong>
                <p style="margin: 0;font-family: 'Times New Roman', Times, serif;">MRS. KAWTHER ABUELNAJA</p>
                <span style="font-family: 'Monotype Corsiva';font-weight: normal;">The University Registrar</span>
            </strong>
        </td>
        <td style="text-align: center; font-size: 10pt;border:none;">
            <strong>
                <p style="margin: 0;font-family: 'Times New Roman', Times, serif;">SE. ASSOC. PROF. KHALID SHEIKHIDRIS MOHAMED</p>
                <span style="font-family: 'Monotype Corsiva';font-weight: normal;">Assistant President for Academic Affairs</span>
            </strong>
        </td>
    </tr>
    
   
</table>

    <div class="footer"style="margin-left:0cm; margin-right:0.5cm;margin-top:1cm;">
        <p style=" font-size:10pt;font-weight: bold; font-family: 'Times New Roman', Times, serif;">Date of issue:<?php
$date = $std_cert_data['cert_printed_at']; // e.g., "2025-11-11"
$timestamp = strtotime($date);

$day = date('j', $timestamp); // e.g., 11
$month = date('F', $timestamp); // e.g., November
$year = date('Y', $timestamp); // e.g., 2025

// function suffixx($number) {
//     if (!in_array($number % 100, [11, 12, 13])) {
//         switch ($number % 10) {
//             case 1: return 'st';
//             case 2: return 'nd';
//             case 3: return 'rd';
//         }
//     }
//     return 'th';
// }

echo $day . "<sup>" . suffixx($day) . "</sup> $month $year";
?>
           </p>
    </div>
    </div>

   
</div>
</div>
<!-- ✅ ONE set of buttons -->
<div class="no-print" style="display:flex; gap:10px; justify-content: center; margin: 20px;">
    <button onclick="history.back()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">Back</button>
    <button onclick="window.print()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">Print</button>
    <button onclick="exportToWord()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">Export</button>
</div>

<script>
function exportToWord() {
    const content = document.getElementById("printContent").innerHTML;
    
    const studentName = <?php echo json_encode($std_cert_data['std_full_name_en']); ?>;
    const studentID = <?php echo json_encode($stud_index['stud_id']); ?>;

    const css = `
        @page {
            size: A4;
            margin: 1cm 1.5cm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 9pt;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            page-break-inside: auto;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        td, th {
            font-size: 8pt;
            line-height: 1;
            padding: 1px 4px;
        }
        th {
            background-color: #D3D3D3 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            font-weight: bold;
        }
        .semester-title {
            font-size: 8.5pt;
            font-weight: bold;
            background-color: transparent !important;
        }
        .page-break {
            page-break-before: always !important;
            display: block !important;
            height: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        div[style*="page-break-before: always"] {
            page-break-before: always !important;
        }
    `;

    const wordSettingsXML = `
        <!--[if gte mso 9]>
        <xml>
            <w:WordDocument>
                <w:View>Print</w:View>
                <w:Zoom>100</w:Zoom>
                <w:DoNotOptimizeForBrowser/>
            </w:WordDocument>
            <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
                DefSemiHidden="true" DefQFormat="false" DefPriority="99"
                LatentStyleCount="267">
            </w:LatentStyles>
        </xml>
        <![endif]-->
    `;

    const sectPr = `
        <!--[if gte mso 9]>
        <xml>
            <w:WordDocument>
                <w:View>Print</w:View>
                <w:Zoom>100</w:Zoom>
            </w:WordDocument>
            <o:OfficeDocumentSettings>
                <o:AllowPNG/>
            </o:OfficeDocumentSettings>
            <w:WordDocument>
                <w:SpellingState>Clean</w:SpellingState>
                <w:GrammarState>Clean</w:GrammarState>
                <w:ValidateAgainstSchemas/>
                <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
                <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
                <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
            </w:WordDocument>
        </xml>
        <![endif]-->
        <style>
            @page Section1 {
                size: 595.3pt 841.9pt;
                margin: 28.35pt 42.5pt;
                mso-header-margin: 0.5in;
                mso-footer-margin: 0.5in;
                mso-paper-source: 0;
            }
            div.Section1 { page: Section1; }
        </style>
    `;

    const html = `
        <html xmlns:o='urn:schemas-microsoft-com:office:office'
              xmlns:w='urn:schemas-microsoft-com:office:word'
              xmlns='http://www.w3.org/TR/REC-html40'>
        <head>
            <meta charset='utf-8'>
            <title>Complete Certificate</title>
            ${wordSettingsXML}
            ${sectPr}
            <style>${css}</style>
        </head>
        <body>
            <div class="Section1">
                ${content}
            </div>
        </body>
        </html>
    `;

    const blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });

    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "Complete_Certificate_" + studentID + "_" + studentName + ".doc";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}
</script>

</body>
</html>