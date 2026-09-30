<?php
require_once __DIR__ . "/include/functions.php";

if (isset($_GET['std'])) {
    $std_index = $_GET['std'];
    $stud_index = Stud_Index($std_index);

    if ($stud_index) {
        $student_profile_common = student_profile_common_sql($std_index);
        $batch    = $student_profile_common['batch'];
        $major    = $student_profile_common['major_code'];
        $program  = $student_profile_common['program_code'];
        $faculty  = $student_profile_common['faculty_code'];
        $current_sem = $student_profile_common['curr_sem'];
        $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
        $total_hours = Total_Hours($std_index, $batch, $major);
        stud_course_mark_sql($std_index, $batch, $major, $faculty);
        $std_cert_data = Get_std_cert_Data($std_index);
    } else {
        header("Location: ./404.php");
        exit();
    }
}

$condition = '';
if ($program == 1) {
    $condition = 'B.Sc. (Honours)';
} elseif ($program == 2) {
    $condition = 'Diploma';
}

$major_full   = Get_Major_Name($student_profile_common['major_code']);
$parts        = explode(' in ', $major_full);
$majortrimmed = isset($parts[1]) ? trim($parts[1]) : $major_full;

$fulltime='';
if($batch<=2016 || $program ==2){
  $fulltime='';
}else{
  $fulltime='(Full Time)';
}

$SemestersNo = ($program == 1) ? 'Ten' : 'Six';

function suffix($number) {
    if (!in_array($number % 100, [11, 12, 13])) {
        switch ($number % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

function suffixx($number) {
    if (!in_array($number % 100, [11, 12, 13])) {
        switch ($number % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

function formatCertDate($dateStr) {
    $ts    = strtotime($dateStr);
    $day   = date('d', $ts);
    $month = date('F', $ts);
    $year  = date('Y', $ts);
    return $day . " $month $year";
}

function semesterDuration($batch, $sem, $faculty) {
    $conn = new mysqli('localhost', 'root', '', 'calendar_db');
    if ($conn->connect_error) {
        die("DB Connection Failed: " . $conn->connect_error);
    }
    $conn->set_charset('utf8mb4');

    $stmt = $conn->prepare("SELECT id FROM batches WHERE name = ?");
    $stmt->bind_param("s", $batch);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$row = $result->fetch_assoc()) {
        return "not found";
    }
    $batch_id     = $row['id'];
    $faculty_code = in_array($faculty, [1, 5, 4]) ? 1 : 2;

    $startResult = mysqli_query($conn,
        "SELECT MIN(event_date) AS start_date FROM events
         WHERE batch_id = $batch_id AND event_type_id = 4
         AND major_id = $faculty_code AND semester = $sem");
    $startRow   = mysqli_fetch_assoc($startResult);
    $start_date = $startRow['start_date'];

    if (!$startRow) {
        return "not found";
    }

    $endResult = mysqli_query($conn,
        "SELECT MAX(event_date) AS end_date FROM events
         WHERE batch_id = $batch_id AND event_type_id = 13
         AND major_id = $faculty_code AND semester = $sem");
    $endRow   = mysqli_fetch_assoc($endResult);
    $end_date = $endRow['end_date'];

    $startFormatted = date("F Y", strtotime($start_date));
    $endFormatted   = date("F Y", strtotime($end_date));

    $words        = ["","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten"];
    $semesterName = "Semester " . ($words[$sem] ?? $sem);

    return "$semesterName: $startFormatted - $endFormatted";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="include/dist/img/fu.png">

    <!-- Original stylesheets from each page, unchanged -->
    <link rel="stylesheet" href="./include/dist/css/bachelor_temp.css">
    <link rel="stylesheet" href="./include/dist/css/transcript_temp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous"/>

    <title><?php echo "[" . $std_cert_data['std_full_name_en'] . "-" . $stud_index['stud_id'] . "]-"; ?> Both</title>

    <style>
      /* ── Copied verbatim from bachelor page inline style ── */
      body {
          font-family: 'Times New Roman', Times, serif;
      }
      @media print {
          .exportButton {
              display: none !important;
          }
      }
      .main-content p {
          line-height: 20pt;
          mso-line-height-rule: exactly;
      }

      /* ── Copied verbatim from transcript page inline style ── */
      iframe {
          display: none;
      }
      h3 {
          font-size: 10pt;
      }
      th, td {
          font-size: 8pt;
      }
      .semester_summary {
          font-size: 9pt;
      }
      .semester-title {
          background-color: transparent !important;
          color: black !important;
          font-family: 'Times New Roman', Times, serif;
      }
      @media print {
          th {
              background-color: #D3D3D3 !important;
              -webkit-print-color-adjust: exact;
              print-color-adjust: exact;
              color: black !important;
              font-weight: bold;
          }
          .semester-title {
              background-color: transparent !important;
              color: black !important;
          }
      }
      @page {
          margin-bottom: 2.5cm;
          margin-right: 2cm;
          margin-left: 2cm;
          size: A4;
      }
      @media print {
          .exportButton {
              display: none !important;
          }
          @page {
              size: A4;
              margin-bottom: 2.5cm;
              margin-right: 2cm;
              margin-left: 2cm;
          }
          .footnote {
              display: none;
          }
      }
      table {
          page-break-inside: avoid;
          font-family: 'Times New Roman', Times, serif;
          border-collapse: collapse;
      }
      .grading_system {
          margin-top: 10px;
          font-size: 3pt;
      }
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
          max-width: 50%;
      }
      .sig {
          margin-top: 3cm;
      }
      td {
          line-height: 1;
      }
      th {
          line-height: 0.3;
      }
      p {
          line-height: 8pt;
      }
      @media print {
          .repeat-header {
              page-break-inside: avoid;
              font-size: 10pt;
              font-family: 'Times New Roman', Times, serif;
          }
      }

      /* ── section divider (screen only) ── */
      .section-divider {
          border: none;
          border-top: 2px dashed #aaa;
          margin: 2cm 0;
      }
      @media print {
          .section-divider { display: none; }
      }

      /* ── button bar (hidden on print) ── */
      @media print {
          .btn-bar { display: none !important; }
      }
      .btn-bar {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 20px 40px;
      }
      .btn-bar button {
          padding: 15px 30px;
          font-size: 13px;
          border-radius: 8px;
      }
    </style>
</head>
<body>

<div id="print">

    <!-- ══ SECTION 1: BACHELOR CERTIFICATE ══ -->
    <div id="bachelor-section">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="header" style="margin-top: 3.5cm;">
            <div class="header">
                <p style="font-size:10pt;font-weight:bold;font-family:'Times New Roman',Times,serif;margin:2px 0;">Nationality No: <?php if(isset($stud_index)) echo $std_cert_data['national_number']; else echo ""; ?></p>
                <p style="font-size:10pt;font-weight:bold;font-family:'Times New Roman',Times,serif;margin:2px 0;">University No: <?php if(isset($stud_index)) echo $std_cert_data['ministery_number']; else echo ""; ?></p>

                <h1 style="margin-top:3cm;font-size:15pt;font-weight:bold;font-family:'Times New Roman',Times,serif;margin-bottom:0.8cm;text-align:center;"><?php echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>
            </div>
        </div>
        <br>

        <div class="main-content" style="margin-left:0cm;margin-right:0cm;text-align:justify;">
            <p class="big" style="font-size:12pt;font-family:'Times New Roman',Times,serif;text-align:justify;">This is to certify that /<b style="font-size:14pt;"><u><?php if(isset($stud_index)) echo $std_cert_data['std_full_name_en']; else echo ""; ?></u></b>/
            (<b style="font-family:'Times New Roman',Times,serif;"><?php
                if($student_profile_common['nationality_code'] == 0) echo 'Foreign';
                if($student_profile_common['nationality_code'] == 1) echo 'Sudanese Nationality';
                if($student_profile_common['nationality_code'] == 4) echo 'Refugees';
            ?></b>)<b style="font-size:12pt;font-weight:normal;"> has successfully passed the prescribed examinations and is hereby awarded the degree of</b> <b><?php echo $condition; ?></b> in
            <b><?php echo $majortrimmed; ?></b><strong> <?php echo $fulltime; ?>,</strong>
            <b style="font-family:'Times New Roman',Times,serif;font-size:12pt;"> <b><?php echo Get_Mode($std_cert_data['mode']) . '' . Get_Division($std_cert_data['division']); ?></b>,
            <b style="font-size:12pt;font-weight:normal;">by the University Senate on </b><b><?php echo formatCertDate($std_cert_data['senate_on']); ?></b>.
            </p>
        </div>

        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <table style="width:100%;border:none;outline:none;border-collapse:collapse;margin-top:4cm;margin-bottom:0.6cm;font-family:'Times New Roman',Times,serif;">
            <tr class="sig" style="border:none;">
                <td style="padding-top:100px;text-align:center;font-size:10pt;border:none;">
                    <strong>
                        <p style="margin:0;font-family:'Times New Roman',Times,serif;">UST. KAWTHER ABUELNAJA</p>
                        <span style="font-family:'Monotype Corsiva';font-weight:normal;">The University Registrar</span>
                    </strong>
                </td>
                <td style="text-align:center;font-size:10pt;border:none;">
                    <strong>
                        <p style="margin:0;font-family:'Times New Roman',Times,serif;">SE. ASSOC. PROF. KHALID SHEIKHIDRIS MOHAMED</p>
                        <span style="font-family:'Monotype Corsiva';font-weight:normal;">Assistant President for Academic Affairs</span>
                    </strong>
                </td>
            </tr>
        </table>

        <div class="footer" style="margin-left:0cm;margin-right:0.5cm;margin-top:1cm;">
            <p style="font-size:10pt;font-weight:bold;font-family:'Times New Roman',Times,serif;">Date of issue:<?php echo formatCertDate($std_cert_data['cert_printed_at']); ?></p>
        </div>
    </div><!-- /bachelor-section -->


    <!-- visual separator on screen, hidden on print -->
    <hr class="section-divider">


    <!-- ══ SECTION 2: TRANSCRIPT ══ -->
    <div id="transcript-section">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="top_main_body" style="margin-top:3.5cm;" id="top_main_body">
            <p style="font-size:10pt;font-weight:bold;font-family:'Times New Roman',Times,serif;margin:2px 0;">Nationality No: <?php if(isset($stud_index)) echo $std_cert_data['national_number']; else echo ""; ?></p>
            <p style="font-size:10pt;font-weight:bold;font-family:'Times New Roman',Times,serif;margin:2px 0;">University No: <?php if(isset($stud_index)) echo $std_cert_data['ministery_number']; else echo ""; ?></p>
        </div>

        <h1 style="margin-top:0.8cm;font-size:15pt;font-weight:bold;font-family:'Times New Roman',Times,serif;margin-bottom:0.8cm;text-align:center;"><?php echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>

        <p class="main_body" style="font-size:12pt;text-align:justify;font-family:'Times New Roman',Times,serif;">This is to certify that <b><u style="font-size:14pt;"><?php echo "/" . $std_cert_data['std_full_name_en'] . "/"; ?></u></b>
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
        has successfully passed the prescribed examinations and is hereby awarded the degree of <b><?php echo $condition; ?></b> in
        <b><?php echo $majortrimmed; ?></b>,</b>
        <b></b> <b><?php echo Get_Mode($std_cert_data['mode']) . '' . Get_Division($std_cert_data['division']); ?></b>, by the University Senate on <strong><?php echo formatCertDate($std_cert_data['senate_on']); ?></strong>. He/She has completed all the <strong><?php echo $total_hours; ?> Credit Hours</strong> of the program <strong><?php echo $fulltime; ?></strong> with a <strong>CGPA
        <?php
        if (isset($stud_transcript_sql)) {
            echo "/" . number_format((float)$stud_transcript_sql['cgpa'], 2) . "/";
        }
        ?></strong>.<br> Below are the details of his/her grades throughout the <strong><?php echo $SemestersNo; ?></strong> semesters of the course of study.</p>

        <?php
        $sem_sql   = "SELECT MAX(curr_sem) AS newsem FROM student_profile_common WHERE stud_id = '$std_index'";
        $sem_query = mysqli_query($sis_con, $sem_sql);
        $sem_res   = mysqli_fetch_array($sem_query);
        $newsem    = $sem_res['newsem'];
        $header_printed = false;

        for ($i = 1; $i <= min(10, $newsem); $i++) {

            $sql_2 = "SELECT cm.course_code,Crs.course_name, cm.grade, cm.sub_grade1, cm.sub_grade2 ,Crs.course_units,Crs.course_semester
FROM stud_course_mark cm , course_details Crs
WHERE
Crs.course_code=cm.course_code and Crs.major_code=cm.major_code
and Crs.batch=cm.batch
and cm.batch = '$batch'
AND cm.stud_id = '$std_index'
AND cm.faculty_code = '$faculty'
AND cm.major_code = '$major'
And Crs.course_semester = $i
AND cm.semester = $i
ORDER BY cm.semester ASC";

            $query_2 = mysqli_query($sis_con, $sql_2);
            if (!$query_2) {
                die("SQL Error: " . mysqli_error($sis_con) . "<br><br>Query:<br>" . $sql_2);
            }

            if ($i == 5 && !$header_printed) {
                echo "<div style='page-break-before: always;'></div>";
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

            if (mysqli_num_rows($query_2) > 0) {

                $numberToWord = [
                    1=>'One',2=>'Two',3=>'Three',4=>'Four',5=>'Five',
                    6=>'Six',7=>'Seven',8=>'Eight',9=>'Nine',10=>'Ten'
                ];
                $semesterWord   = isset($numberToWord[$i]) ? $numberToWord[$i] : $i;
                $durationresult = semesterDuration($batch, $i, $faculty);

                echo "<table style='margin: 0; padding: 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt;margin-top:-5px;'>";
                echo "<tr>";
                if ($durationresult === "not found") {
                    echo "<th colspan='8' class='semester-title' style='border: none; font-size: 8pt; text-align: left; line-height: 1;'>Batch not found</th>";
                } else {
                    echo "<th colspan='8' class='semester-title' style='border: none; font-size: 8pt; text-align: left; line-height: 1;'>$durationresult</th>";
                }
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

                $row_count      = 0;
                $printedCourses = [];

                while ($stud_res = mysqli_fetch_array($query_2)) {
                    $CourseCode = $stud_res['course_code'];
                    if (in_array($CourseCode, $printedCourses)) {
                        continue;
                    }
                    $printedCourses[] = $CourseCode;
                    $CourseName  = $stud_res['course_name'];
                    $CRSLoad     = $stud_res['course_units'];
                    $Grade       = $stud_res['grade'];
                    $sub_grade1  = $stud_res['sub_grade1'];
                    $sub_grade2  = $stud_res['sub_grade2'];

                    $displayGrade = $Grade;
                    if (!empty($sub_grade1)) {
                        $displayGrade .= "/" . $sub_grade1;
                    }
                    if (!empty($sub_grade2)) {
                        $displayGrade .= "/" . $sub_grade2;
                    }
                    if ($Grade === 'F' &&
                        (empty($sub_grade1) || $sub_grade1 === 'F') &&
                        (empty($sub_grade2) || $sub_grade2 === 'F')) {
                        $displayGrade = "N/G";
                    }

                    if ($row_count % 2 == 0) {
                        echo "<tr style='height:1px;'>";
                    }

                    echo "<td style='" . (empty($CourseCode) ? "border: none;" : "border: 1px solid #000;padding-left: 10px;") . "'> " . $CourseCode . "</td>";
                    echo "<td align='center' style='" . (empty($CRSLoad) ? "border: none;" : "border: 1px solid #000;") . "'> " . $CRSLoad . "</td>";
                    echo "<td style='" . (empty($CourseName) ? "border: none;" : "border: 1px solid #000;padding-left: 10px;") . "'> " . $CourseName . "</td>";
                    echo "<td style='" . (empty($displayGrade) ? "border: none;" : "border: 1px solid #000;padding-left: 10px;") . "'> " . $displayGrade . "</td>";

                    $row_count++;

                    if ($row_count % 2 == 0) {
                        echo "</tr>";
                    }
                }

                if ($row_count % 2 != 0) {
                    echo "<td colspan='4'></td></tr>";
                }
                echo "</tbody>";

                $sql   = "SELECT * FROM stud_transcript_table WHERE stud_id = '$std_index' and semester = '$i' and major_code = '$major'";
                $query = mysqli_query($sis_con, $sql);
                $trans_res     = mysqli_fetch_array($query);
                $gpa           = $trans_res['gpa'];
                $cgpa          = $trans_res['cgpa'];
                $gpaFormatted  = number_format((float)$gpa,  2, '.', '');
                $cgpaFormatted = number_format((float)$cgpa, 2, '.', '');

                echo "<tr style='border: none; background: none;'>";
                echo "<tr style='border: none; background: none;'>";
                echo "<td colspan='8' style='text-align: right; border: none; padding-bottom: 5px; font-weight: bold;padding-right: 100px;'>
                        <span style='margin-right: 60px;'>GPA: {$gpaFormatted}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='margin-left: 80px;'>CGPA: {$cgpaFormatted}</span>
                      </td>";
                echo "</tr>";
                echo "</table>";
            }
        }
        ?>
   <p>&nbsp;</p>
   <p>&nbsp;</p>

        <table style="width:100%;border:none;outline:none;border-collapse:collapse;margin-top:1.5cm;margin-bottom:0.5cm;font-family:'Times New Roman',Times,serif;">
            <tr class="sig" style="border:none;">
                <td style="padding-top:100px;text-align:center;font-size:10pt;border:none;">
                    <strong>
                        <p style="margin:0;font-family:'Times New Roman',Times,serif;">UST. KAWTHER ABUELNAJA</p>
                        <span style="font-family:'Monotype Corsiva';font-weight:normal;">The University Registrar</span>
                    </strong>
                </td>
                <td style="text-align:center;font-size:10pt;border:none;">
                    <strong>
                        <p style="margin:0;font-family:'Times New Roman',Times,serif;">SE. ASSOC. PROF. KHALID SHEIKHIDRIS MOHAMED</p>
                        <span style="font-family:'Monotype Corsiva';font-weight:normal;">Assistant President for Academic Affairs</span>
                    </strong>
                </td>
            </tr>
        </table>

        <p style="font-size:8pt;margin-left:0px"><u><b>The 4 point system is used. CGPA of 2 is required to award the degree.</b></u></p>
        <table style="width:60%;border-collapse:collapse;margin-left:0px;font-family:'Times New Roman',Times,serif;">
            <tr style="border:none;">
                <td style="padding:1px;border:none;font-size:6pt;"><strong>A, A- Excellent</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>B+, B, B- Very Good</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>C+, C Good</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>C-, D+, D Conditionally Passing</strong></td>
            </tr>
            <tr style="border:none;">
                <td style="padding:1px;border:none;font-size:6pt;"><strong>F Fail</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>Z Unauthorized Absence, Failing</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>P Passing a P/F Course</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>IP In Progress</strong></td>
            </tr>
            <tr style="border:none;">
                <td style="padding:1px;border:none;font-size:6pt;"><strong>I Incomplete</strong></td>
                <td style="padding:1px;border:none;font-size:6pt;"><strong>W Withdraw</strong></td>
            </tr>
            <tr style="border:none;">
                <td colspan="4" style="padding:0px;border:none;font-size:8pt;">
                    <p style="font-weight:bold;">Date of Issue: <?php echo formatCertDate($std_cert_data['cert_printed_at']); ?>
                    </p>
                </td>
            </tr>
        </table>
    </div><!-- /transcript-section -->

</div><!-- /print -->


<!-- BUTTON BAR -->
<div class="btn-bar">
    <button id="backButton" onclick="goBack()">Back to Request</button>
    <button class="exportButton" id="exportBothBtn" onclick="exportBoth()">Export Both</button>
    <button id="printButton" onclick="printBoth()">Print Both</button>
</div>


<script>
const studentName = <?php echo json_encode($std_cert_data['std_full_name_en']); ?>;
const studentID   = <?php echo json_encode($std_index); ?>;

function hideBtns() { document.querySelectorAll('.btn-bar button').forEach(b => b.style.display = 'none'); }
function showBtns() { document.querySelectorAll('.btn-bar button').forEach(b => b.style.display = ''); }

function printBoth() {
    hideBtns();
    window.onafterprint = showBtns;
    window.print();
}

function goBack() {
    hideBtns();
    window.history.back();
}

function exportBoth() {
    const bachelorContent   = document.getElementById("bachelor-section").outerHTML;
    const transcriptContent = document.getElementById("transcript-section").outerHTML;

    const css = `
@page { size: A4; margin: 1cm 1.5cm; }
body  { font-family: 'Times New Roman', Times, serif; font-size: 9pt; margin:0; padding:0; }
.main-content p { line-height: 150%; mso-line-height-rule: exactly; }
table { border-collapse: collapse; width: 100%; page-break-inside: auto; }
tr    { page-break-inside: avoid; page-break-after: auto; }
td, th { font-size: 8pt; line-height:1; padding:1px 4px; }
.semester-title { font-size:8.5pt; font-weight:bold; }`;

    const wordXML = `<!--[if gte mso 9]><xml>
      <w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom>
      <w:DoNotOptimizeForBrowser/></w:WordDocument></xml><![endif]-->`;

    const sectPr = `<style>
      @page Section1 { size:595.3pt 841.9pt; margin:28.35pt 42.5pt;
        mso-header-margin:.5in; mso-footer-margin:.5in; mso-paper-source:0; }
      div.Section1 { page: Section1; }
    </style>`;

    const html = `<html xmlns:o='urn:schemas-microsoft-com:office:office'
        xmlns:w='urn:schemas-microsoft-com:office:word'
        xmlns='http://www.w3.org/TR/REC-html40'>
      <head><meta charset='utf-8'><title>Certificate &amp; Transcript</title>
      ${wordXML}${sectPr}<style>${css}</style></head>
      <body>
        <div class="Section1">
        ${bachelorContent}
          <br clear="all" style="page-break-before:always;" />
          ${transcriptContent}
        </div>
      </body></html>`;

    const blob = new Blob(['\ufeff', html], { type: 'application/msword' });
    const url  = URL.createObjectURL(blob);
    const a    = document.createElement("a");
    a.href = url; a.download = "Certificate_Transcript_" + studentID + "_" + studentName + ".doc";
    document.body.appendChild(a); a.click();
    document.body.removeChild(a);
}

let fileURL = "";
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>