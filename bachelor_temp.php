<?php 
include("include/functions.php");
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
      $faculty = $student_profile_common['faculty_code'];
      $current_sem = $student_profile_common['curr_sem'];
      $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
      $total_hours = Total_Hours($std_index);
      stud_course_mark_sql($std_index, $batch, $major);
      $std_cert_data = Get_std_cert_Data($std_index);

}
else {
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
    <link rel="stylesheet" href="./include/dist/css/bachelor_temp.css">
    <title> <?php echo "[" . $std_cert_data['std_full_name_en'] . "-" . $stud_index['stud_id'] . "]-"; ?> Bachelors</title>
</head>
<body>
    <div class="header" >
        <div class="header" >
        <p style="font-weight: bold;">Nationality No: <?php if(isset($stud_index)) echo $std_cert_data['national_number']; else echo "" ;?></p>
        <!-- un code from darabase -->
        <p style="font-weight: bold;">University No: <?php if(isset($stud_index)) echo $std_cert_data['ministery_number']; else echo "" ;?></p>
        <h1><?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>
    
    </div>
    <br>
    <div class="main-content">
        <p class="big">This is to certify that /<b><u> <?php if(isset($stud_index)) echo $std_cert_data['std_full_name_en'] ; else echo "";  ?></b></u> /
        (<b>
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
?>
</b>
) has successfully passed the prescribed examination and is hereby awarded the degree of <b><?php  echo Get_Major_Name($student_profile_common['major_code']); ?></b>
(<b>Honours</b>) in <b><?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></b>, <b><?php echo  Get_Mode($std_cert_data['mode']) . ' - ' . Get_Division($std_cert_data['division']) ; ?> </b>
by the University Senate on the <b><?php  echo Get_Format_Date($std_cert_data['senate_on']);  ?></b>.
</p>
    </div>

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

    <div class="footer">
        <p>Date and place of issue: <?php $place ="2"; echo Get_Place_Issue($place); ?>, <?php echo  Grafuation_Date_Format($std_cert_data['cert_printed_at']); ?></p>
    </div>
</body>
</html>

<!-- Print button, initially visible -->
<div style="display: flex; justify-content: center;">
    <button id="printButton" onclick="printCertificate()" 
            style="padding: 15px 30px; font-size: 13px; border-radius: 8px;">
        Print Certificate
    </button>
</div>


<div id="certificate" style="display:none;">
    <!-- Certificate content goes here -->
</div>

<script>
    // Function to print the certificate and hide the print button
    function printCertificate() {
        const printButton = document.getElementById("printButton");
        printButton.style.display = "none";  // Hide button before printing

        // Listen for print completion and then show the button again
        window.onafterprint = () => {
            printButton.style.display = "block";  // Show button after printing
        };

        window.print();  // Print page
    }

    
</script>