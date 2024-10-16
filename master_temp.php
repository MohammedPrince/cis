<?php 
include("include/functions.php");


?>


<?php

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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree Certificate</title>
    <style>
      @page {
        
        margin: 0;
        size: A4;
      }

      body {
        font-family: 'Times New Roman';
        font-size: 8pt;
        line-height: 1.3;
        /* margin: 2cm; */
        padding: 0;
        
        }
      
        .header {
            /* font-size: smaller; */
            position: relative;
            top: 120px;
            text-align: left;
            margin-left: 1cm;
            margin-bottom: 1cm;
        }
        h1 {
  
  text-align: center;
  font-size: 11pt;
}
        .main-content {
          padding-left: 1cm;
          margin-top: 2.5cm;
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
            line-height: 2;
        }
        /* .name {
            text-decoration: underline;
            font-weight: bold;
            margin: 0.5cm 0;
        } */
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
            width: 45%;
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
        <p class="space"> In pursuance of the Authority vested in it by the Act of the University and upon the recommendation Of the Faculty of Postgraduate Studies And approval of the Senate Confers upon
        <br>
            <b><u> <?php if(isset($stud_index)) echo $stud_index['stud_name'] . " " . $stud_index['stud_surname'] . " " . $stud_index['familyname'] ; else echo "";  ?></b></u> 
           <br>
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
            </b>)
         
   <p >Who has successfully completed the requirements The degree of </p> <b class="font_change"><?php  echo  Get_Major_Name($student_profile_common['program_code']); ?></b> </b> 
  <br>
   <b class="font_change"><?php  echo "(" . Get_Major_Name($student_profile_common['major_code']) . ")" ; ?></b> </b>
   
   <p><b> on <?php  echo Get_Format_Date($std_cert_data['senate_on']);  ?></b>.</p>
   
   
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
        <p>Date and place of issue: <?php $place ="2"; echo Get_Place_Issue($place); ?>, <?php echo  N_Date($std_cert_data['cert_printed_at']); ?></p>
    </div>
</body>
</html>