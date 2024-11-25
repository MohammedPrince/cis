<?php 
include("include/functions.php");


?>


<?php

if(!isset($_GET['std'])){

  $std_index = $_GET['std'];

  $stud_index = Stud_Index($std_index);

  $student_profile_common = student_profile_common_sql($std_index);
  $batch = $student_profile_common['batch'];
  $major = $student_profile_common['major_code'];
  $faculty = $student_profile_common['faculty_code'];
  $current_sem = $student_profile_common['curr_sem'];
  $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
  $total_hours = Total_Hours($std_index);
  stud_course_mark_sql($std_index, $batch, $major, $faculty);
  $std_cert_data  = Get_std_cert_Data($std_index);

}  else {
  // Display error message if student index is not valid
   header("Location: ./404.php");
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="include/dist/img/fu.png">
    <title> <?php echo "[" . $std_cert_data['std_full_name_en'] . "-" . $stud_index['stud_id'] . "]-"; ?> Master</title>
    <style>
      @page {
        
        margin: 0;
        size: A4;
      }

      body {
        margin-inline-start: -0.5px;
        font-family: 'Times New Roman';
        font-size: 8pt;
        line-height: 1.3;
        /* margin: 2cm; */
        padding: 0;
        
        }
      
        .header {
          font-weight: bold;
            font-size: 6px;
            position: relative;
            top: 100px;
            text-align: left;
            margin-top: 0cm;
            margin-left: 1cm;
            margin-bottom: 1cm;
        }
        h1 {
  
  text-align: center;
  font-size: 9pt;
}
        .main-content {
          padding-left: 1cm;
          margin-top: 45px;
          /* margin-bottom: 0 cm; */
          text-align: center; 
        }
        /* p.big {
  line-height: 1.9;
} */
            p{
            /* position: relative; */
            top: 80px;
            }

        .font_change {
            font-family: 'Algerian';
        }
        .space{
          font-size: 8px;
            /* line-height: 1.5; */
        }
        .name {
          font-size: 18px;
            text-decoration: underline;
            font-weight: bold;
            margin: 0.5cm 0;
        }
        .degree {
            
            font-weight: bold;
            margin: 0.5cm 0;
        }
        
        .signatures {
          font-family: 'Monotype Corsiva';
            display: flex;
            justify-content: space-between;
            margin-top: 2cm;
        }
        .signatures p {
            font-family: 'Times New Roman', Times, serif; /* Change to Times New Roman */
        }
        .signature {
          text-align: center;
          margin-left: 15px;
          font-size: 10px;
            width: 35%;
            
        }
        .footer {
          margin-left: 1cm;
        }
     
      
    </style>
</head>
<body>
    <div class="header" >
        <p>Nationality No: <?php if(isset($student_profile_common)) echo $student_profile_common['identity_no']; else echo "" ;?></p>
        <p>University No:</p>
        <h1><?php  //echo Get_Faculty_Name($student_profile_common['faculty_code']); ?></h1>
    </div>
    <br>
    <div class="main-content">
        <p class="space" >In pursuance of the Authority vested in it by the Act of<br>
        the University and upon the recommendation<br>
        Of the Faculty of Postgraduate Studies<br>
        And approval of the Senate<br>
        <br>
        Confers upon
        <br>
      

        <div class="name">
            <b><u> <?php if(isset($stud_index)) echo $stud_index['stud_name'] . " " . $stud_index['stud_surname'] . " " . $stud_index['familyname'] ; else echo "";  ?></b></u> 
           <br>
           </div>
        (<b style="font-size: 8px">
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
            </b>)
         
   <p style="font-size: 8px">Who has successfully completed the requirements The degree of </p> <b class="font_change"><?php  echo  Get_Major_Name($student_profile_common['program_code']); ?></b> </b> 
  <br>
   <b class="font_change"><?php  echo "(" . Get_Major_Name($student_profile_common['major_code']) . ")" ; ?></b> </b>
   
   <p><b> on <?php  echo Get_Format_Date($std_cert_data['senate_on']);   ?></b>.</p>
   
   
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