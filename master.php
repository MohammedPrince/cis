<?php 
require_once __DIR__ . "/include/functions.php";
?>

<?php

if (isset($_GET['std'])){
  $std_index = $_GET['std'];
  $stud_index = Stud_Index($std_index);

  if ($stud_index) {
      $student_profile_common = student_profile_common_sql($std_index);
      $batch = $student_profile_common['batch'];
      $major = $student_profile_common['major_code'];
      $program = $student_profile_common['program_code'];
      $faculty = $student_profile_common['faculty_code'];
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

// Determine degree label
$condition = '';
if ($program == 3) {
    $condition = 'Master of Science In';
} elseif ($program == 4) {
    $condition = 'Master of Arts In';
} else {
    $condition = 'Master of Science In';
}

$major_full = Get_Major_Name($student_profile_common['major_code']);
$parts = explode(' in ', $major_full);
$majortrimmed = isset($parts[1]) ? trim($parts[1]) : $major_full;

// Nationality helper
function getNationality($code) {
    if ($code == 0) return 'Foreign';
    if ($code == 1) return 'Sudanese Nationality';
    if ($code == 4) return 'Refugees';
    return '';
}

// Ordinal suffix helper
function ordinalSuffix($number) {
    if (!in_array($number % 100, [11, 12, 13])) {
        switch ($number % 10) {
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

// Format senate date
$senate_date_raw = $std_cert_data['senate_on'];
$senate_ts = strtotime($senate_date_raw);
$senate_day  = (int)date('d', $senate_ts);
$senate_month = date('F', $senate_ts);
$senate_year  = date('Y', $senate_ts);
$senate_formatted = $senate_day . ordinalSuffix($senate_day) . ' of ' . $senate_month . ' ' . $senate_year;

// Format issue date
$issue_date_raw = $std_cert_data['cert_printed_at'];
$issue_ts = strtotime($issue_date_raw);
$issue_day   = (int)date('d', $issue_ts);
$issue_month  = date('F', $issue_ts);
$issue_year   = date('Y', $issue_ts);
$issue_formatted = $issue_day . ordinalSuffix($issue_day) . ' of ' . $issue_month . ' ' . $issue_year;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="include/dist/img/fu.png">
    <title><?php echo "[" . $std_cert_data['std_full_name_en'] . "-" . $stud_index['stud_id'] . "]-"; ?> Masters</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }

        #print {
            width: 19cm;
            margin: 0 auto;
            padding: 0 1cm;
        }

        .nat-uni-numbers p {
            font-size: 10pt;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            margin: 2px 0;
        }

        .faculty-name {
            font-size: 15pt;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin-top: 3cm;
            margin-bottom: 0.8cm;
        }

        .authority-block {
            font-size: 12pt;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            line-height: 1.8;
        }

        .authority-block p {
            margin: 4px 0;
        }

        .student-name {
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
        }

        .nationality-text {
            font-size: 12pt;
            font-weight: bold;
        }

        .main-paragraph {
            font-size: 12pt;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            line-height: 1.8;
            margin-top: 0.5cm;
        }

        .degree-title {
            font-size: 14pt;
            font-weight: bold;
        }

        .signature-table {
            width: 100%;
            border: none;
            border-collapse: collapse;
            margin-top: 4cm;
            margin-bottom: 0.6cm;
            font-family: 'Times New Roman', Times, serif;
        }

        .signature-table td {
            text-align: center;
            font-size: 10pt;
            border: none;
            padding-top: 100px;
            vertical-align: bottom;
        }

        .sig-name {
            margin: 0;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            font-size: 10pt;
        }

        .sig-title {
            font-family: 'Monotype Corsiva', cursive;
            font-weight: normal;
            font-size: 10pt;
        }

        .footer-date {
            font-size: 10pt;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
            margin-top: 1cm;
        }
    </style>
</head>
<body>

<div id="print">
    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div style="margin-top: 3.5cm;">

        <!-- National No & University No -->
        <div class="nat-uni-numbers">
            <p>National No: <?php echo isset($stud_index) ? htmlspecialchars($std_cert_data['national_number']) : ''; ?></p>
            <p>University No: <?php echo isset($stud_index) ? htmlspecialchars($std_cert_data['ministery_number']) : ''; ?></p>
        </div>

        <!-- Faculty Name -->
        <h1 class="faculty-name"><?php echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>

        <!-- Authority Block (matching the Word doc phrasing) -->
        <div class="authority-block">
            <p>In pursuance of the Authority vested in it by the Act of the</p>
            <p>University and upon the recommendation</p>
            <p>Of the Faculty of Postgraduate Studies</p>
            <p>And approval of the Senate</p>
            <p>Confers upon</p>
        </div>

        <!-- Student Name & Nationality -->
        <div class="main-paragraph">
            <p>
                <span class="student-name"><?php echo isset($stud_index) ? htmlspecialchars($std_cert_data['std_full_name_en']) : ''; ?></span>
            </p>
            <p>
                <span class="nationality-text">
                    (<?php echo getNationality($student_profile_common['nationality_code']); ?>)
                </span>
            </p>
        </div>

        <!-- Body Text -->
        <div class="main-paragraph">
            <p>Who has successfully completed the requirements</p>
            <p>The degree of</p>
            <p>
                <span class="degree-title">
                    <?php echo $condition; ?> <?php echo htmlspecialchars($majortrimmed); ?>
                </span>
            </p>
            <p>
                <strong>On <?php echo $senate_formatted; ?></strong>
            </p>
        </div>

        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <!-- Signatures -->
        <table class="signature-table">
            <tr>
                <td>
                    <p class="sig-name">UST. KAWTHER ABUELNAJA</p>
                    <span class="sig-title">The University Registrar</span>
                </td>
                <td>
                    <p class="sig-name">SE. ASSOC. PROF. KHALID SHEIKHIDRIS MOHAMED</p>
                    <span class="sig-title">Assistant President for Academic Affairs</span>
                </td>
            </tr>
        </table>

        <!-- Date of Issue -->
        <div class="footer-date">
            <p>Date of Issue: <?php echo $issue_formatted; ?></p>
        </div>

    </div>
</div>

<!-- Action Buttons -->
<div class="no-print" style="display: flex; justify-content: center; align-items: center; margin-top: 30px;">

    <button id="backButton" onclick="goBack()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">
        Back to Request
    </button>

    <div style="width: 400px;"></div>

    <button class="exportButton" id="exportButton" onclick="exportToWord()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">
        Export Certificate
    </button>

    <div style="width: 400px;"></div>

    <button id="printButton" onclick="printCertificate()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px; margin-right: 40px;">
        Print The Certificate
    </button>

</div>

<script>
function printCertificate() {
    const printButton = document.getElementById("printButton");
    const backButton  = document.getElementById("backButton");
    const exportButton = document.getElementById("exportButton");

    printButton.style.display  = "none";
    backButton.style.display   = "none";
    exportButton.style.display = "none";

    window.onafterprint = () => {
        printButton.style.display  = "block";
        backButton.style.display   = "block";
        exportButton.style.display = "block";
    };

    window.print();
}

function goBack() {
    const printButton  = document.getElementById("printButton");
    const backButton   = document.getElementById("backButton");
    const exportButton = document.getElementById("exportButton");

    printButton.style.display  = "none";
    backButton.style.display   = "none";
    exportButton.style.display = "none";

    window.history.back();
}

function exportToWord() {
    const content = document.getElementById("print").outerHTML;

    const studentName = <?php echo json_encode($std_cert_data['std_full_name_en']); ?>;
    const studentID   = <?php echo json_encode($stud_index); ?>;

    const css = `
        @page { size: A4; margin: 1cm 1.5cm; }
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; }
        .main-paragraph p { line-height: 150%; mso-line-height-rule: exactly; }
    `;

    const wordSettingsXML = `
        <!--[if gte mso 9]>
        <xml>
          <w:WordDocument>
            <w:View>Print</w:View>
            <w:Zoom>100</w:Zoom>
            <w:DoNotOptimizeForBrowser/>
            <w:PaperSize>9</w:PaperSize>
          </w:WordDocument>
        </xml>
        <![endif]-->
    `;

    const html = `
        <html xmlns:o='urn:schemas-microsoft-com:office:office'
              xmlns:w='urn:schemas-microsoft-com:office:word'
              xmlns='http://www.w3.org/TR/REC-html40'>
        <head>
          <meta charset='utf-8'>
          <title>Master Certificate</title>
          <style>${css}</style>
          ${wordSettingsXML}
        </head>
        <body>${content}</body>
        </html>
    `;

    const blob = new Blob(['\ufeff', html], { type: 'application/msword' });
    const url  = URL.createObjectURL(blob);
    const a    = document.createElement("a");
    a.href     = url;
    a.download = "MasterCertificate_" + studentID + "_" + studentName + ".doc";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

</body>
</html>