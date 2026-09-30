<?php 
require_once __DIR__ . "/include/functions.php";


?>


<?php

if (isset($_GET['std'])){
  $std_index = $_GET['std'];
  $stud_index = Stud_Index($std_index);
  // Check if the student index is valid firest
  if ($stud_index) {
      // Proceed with fetching and displaying the student's data
      $student_profile_common = student_profile_common_sql($std_index);
      $batch = $student_profile_common['batch'];
      $major = $student_profile_common['major_code'];
      $program=$student_profile_common['program_code'];
      $faculty = $student_profile_common['faculty_code'];
      $current_sem = $student_profile_common['curr_sem'];
      $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
      $total_hours =  Total_Hours($std_index,$batch,$major);
      stud_course_mark_sql($std_index, $batch, $major, $faculty);
      $std_cert_data = Get_std_cert_Data($std_index);

}
else {
        header("Location: ./404.php");
        exit();
  }


}

$condition='';
if( $program==1){
$condition='B.Sc. (Honours)';
}else if ($program==2){
  $condition='Diploma';
}

$major_full = Get_Major_Name($student_profile_common['major_code']);

$parts = explode(' in ', $major_full);

$majortrimmed = isset($parts[1]) ? trim($parts[1]) : $major_full;


$fulltime='';
if($batch<=2016 || $program ==2){
  $fulltime='';
}else{
  $fulltime='(Full Time)';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="include/dist/img/fu.png">
    <link rel="stylesheet" href="./include/dist/css/bachelor_temp.css">
    <title> <?php echo "[" . $std_cert_data['std_full_name_en'] . "-" . $stud_index['stud_id'] . "]-"; ?> Bachelors</title>
</head>
<body>
<div id="print">
    <!-- <p>&nbsp;</p>
<p>&nbsp;</p> -->
<p>&nbsp;</p>
<p>&nbsp;</p>
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
    .main-content p {
 line-height:20spt;
 mso-line-height-rule:exactly;
}

    </style>
    
    </div>
    <br>

    <div class="main-content" style="margin-left:0cm; margin-right:0cm;text-align: justify;">
        <p class="big" style = "font-size:12pt ; font-family: 'Times New Roman', Times, serif;text-align: justify;">This is to certify that /<b style="font-size:14pt ;"><u><?php if(isset($stud_index)) echo $std_cert_data['std_full_name_en'] ; else echo "";?></b></u>/
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
?></b>)<b style="font-size:12pt ;font-weight: normal;"> has successfully passed the prescribed examinations and is hereby awarded the degree of</b>  <b><?php echo $condition; ?></b> in 
<b><?php echo $majortrimmed; ?></b><strong> <?php echo $fulltime ?>,</strong>
<b style=" font-family: 'Times New Roman', Times, serif;font-size:12pt ;"> <b><?php echo  Get_Mode($std_cert_data['mode']) . '' . Get_Division($std_cert_data['division']) ; ?></b>,
<b style="font-size:12pt ;font-weight: normal;">by the University Senate on </b><b><?php
$date = $std_cert_data['senate_on']; // e.g., "2025-11-11"
$timestamp = strtotime($date);

$day = date('d', $timestamp); // e.g., 11
$month = date('F', $timestamp); // e.g., November
$year = date('Y', $timestamp); // e.g., 2025

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

echo $day . " " . " $month $year";
?></b>.

</p>
    </div>
<p>&nbsp;</p>
<!-- <p>&nbsp;</p> -->
<p>&nbsp;</p>
    <table style="width: 100%; border:none;outline:none;border-collapse: collapse;margin-top: 4cm; margin-bottom: 0.6cm;font-family: 'Times New Roman', Times, serif;">
    <tr  class="sig"  style="border:none;">
        <td style="padding-top: 100px;text-align: center; font-size: 10pt;border:none;">
            <strong>
                <p style="margin: 0;font-family: 'Times New Roman', Times, serif;">UST. KAWTHER ABUELNAJA</p>
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

$day = date('d', $timestamp); // e.g., 11
$month = date('F', $timestamp); // e.g., November
$year = date('Y', $timestamp); // e.g., 2025

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

echo $day . " "."$month $year";
?>
           </p>
    </div>
    </div>
</div>
</body>
</html>


<div style="display: flex; justify-content: center; align-items: center;">

    <button id="backButton" onclick="goBack()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">
        Back to Request
    </button>

    <div style="width: 400px;"></div> <!-- Spacer -->
    <button class="exportButton" id="exportButton" onclick="exportToWord()" style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">Export Transcript</button>
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

    
function exportToWord() {
    const content = document.getElementById("print").outerHTML;

    const studentName = <?php echo json_encode($std_cert_data['std_full_name_en']); ?>;
    const studentID = <?php echo json_encode($std_index); ?>;

const css = `
@page {
    size: A4;
    margin: 1cm 1.5cm;
}

body {
    font-family: 'Times New Roman', Times, serif;
    font-size: 12pt;
}

.main-content p {
    line-height: 150%;
    mso-line-height-rule: exactly;
}
`;



    // 👇 Word-specific settings to force A4 and margins
    const wordSettingsXML = `
      <!--[if gte mso 9]>
      <xml>
        <w:WordDocument>
          <w:View>Print</w:View>
          <w:Zoom>100</w:Zoom>
          <w:DoNotOptimizeForBrowser/>
          <w:PaperSize>9</w:PaperSize> <!-- A4 size -->
          <w:TopMargin>0</w:TopMargin>
          <w:BottomMargin>0</w:BottomMargin>
          <w:LeftMargin>0</w:LeftMargin>
          <w:RightMargin>0</w:RightMargin>
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
        <title>Transcript</title>
        <style>${css}</style>
        ${wordSettingsXML}
      </head>
      <body>${content}</body>
      </html>
    `;

    const blob = new Blob(['\ufeff', html], {
      type: 'application/msword'
    });

    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "Transcript_" + studentID + "_" + studentName + ".doc";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}


        let fileURL = "";
</script>