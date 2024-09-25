<?php

include ("include/functions.php");


function Get_Course_Name($code){

    global $sis_con;

     $sqli = "SELECT * FROM `course_details` WHERE `course_code` = '$code' ";

    if ($query = mysqli_query($sis_con, $sqli)) {
     $row = mysqli_fetch_array($query);
     return $row['course_name'];

    } else {
        echo $sqli;
    }

}

?>




    <table id="table" width="60%" align="center" border="0" cellpadding="0" cellspacing="0" class="pic_box">
    <!-- style="height: 20px;" -->
        <tr>

            <!-- <td colspan="5" class="titleBar">
                <div align="center"><strong><em>Transcript Report</em></strong></div>
            </td> -->

        </tr>

        
 



        <tr>

            <td colspan="5">
                <div align="center">

                    <table id="my-table" width="95%" border="0" align="center" cellspacing="1" class="bgtableblack">
  <p align="center">
                   
                    
                        <tr class="table_content" style="height: 20px;">
                        
         <center>
                    <tr>

<td colspan="5"><br>
    <table width="137%" border="0" align="center" cellspacing="1" class="bgtableblack" style="border:dotted">
    <center>
    <div align="center"><em>
                            <h3>Transcript Report</h3>
                        </em></div>
                    </p>
                    </center>
        <tr>
            <td class="contentFontBold">
                <div align="right">Major:</div>
            </td>
            <td class="contentFont">
                <?php // echo $main_details['Dept']; ?>
            </td>

            <td class="contentFontBold">
                <div align="right">Student ID</div>
            </td>
            <td class="contentFont">
              <?php //echo $stud_index; ?>  
              <!-- this hidden text field to get std index value into pdf function; -->
             <input id="stdindex" type="hidden" value="<?php // echo $stud_index; ?>" name=""> 
            </td>
        </tr>

        <tr>
            <td class="contentFontBold">
                <div align="right">Batch:</div>
            </td>
            <td class="contentFont">
                <?php //echo $main_details['AcademicYear']; ?>
            </td>

            <td class="contentFontBold">
                <div align="right">Student Name</div>
            </td>


            <td class="contentFont">
                <?php //echo $main_details['StdNameEn']; ?>
                <!-- this hidden text field to get std name value into pdf function; -->
             <input id="stdname" type="hidden" value="<?php //echo $main_details['StdNameEn']; ?>" name=""> 
            </td>
        </tr>


       

    </table>
</td>

</tr>

</center>


                            <td width="10%" style="border:ridge; border-right-style:hidden">
                                <div align="center"><strong>Semester </strong></div>
                            </td>

                            <td width="49%" colspan="2"
                                style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                                <div align="center"><strong>Course</strong></div>
                            </td>


                            <td width="7%" style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                                <div align="center"><strong>Crs Load</strong></div>
                            </td>

                            <td width="7%" style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                                <div align="center"><strong>Grade</strong></div>
                            </td>

                            <td width="7%" style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                                <div align="center"><strong>Sub Grade I</strong></div>
                            </td>

                            <td width="7%" style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                                <div align="center"><strong>Sub Grade II</strong></div>
                            </td>

                            <td width="7%" style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                                <div align="center"><strong>Point</strong></div>
                            </td>

                            <td width="20%" colspan="2" style="border:ridge; border-left-style:hidden">
                                <div align="center"><strong>Remarks</strong></div>
                            </td>


                        </tr>


<!-- data of course -->
<?php   
global $sis_con;

$sem_sql = "select MAX(curr_sem) As newsem FROM  `student_profile_common` WHERE `stud_id` = '201602018'";

$sem_query = mysqli_query($sis_con,$sem_sql);
$sem_res = mysqli_fetch_array($sem_query);

$newsem = $sem_res['newsem'];


   for ($i=1; $i <=$newsem ; $i++) { 
                
      global $conn;

       $sql_2 = "SELECT * FROM `stud_course_mark` cm WHERE cm.batch = '2016' AND cm.stud_id = '201602018' and `faculty_code` = '2' and `major_code` = '2' AND cm.semester = $i  ORDER BY `semester` ASC " ;
      $query_2 = mysqli_query($sis_con, $sql_2);
      
      
      while ($stud_res = mysqli_fetch_array($query_2)) {
        // $stud_res = sqlsrv_fetch_array($query_2);
          $Semester = $stud_res['semester'];
          $CRSCode = $stud_res['course_code']; 
          $Course = $stud_res['course_code'] . " -- " . Get_Course_Name($stud_res['course_code']);
          $CRSName = Get_Course_Name($stud_res['course_code']);
          $Grade = $stud_res['grade'];
          $S1grade = $stud_res['sub_grade1'];
          $S2grade = $stud_res['sub_grade2'];
          $CRSLoad = $stud_res['weightage'];
          $size = $stud_res['course_units'];

  
  
  ?>
                        <tr class="table_content" style="height: 10px;">
                        <!-- font-size:100% -->
                            <td>
                                <!-- <div align="center">1</div> -->
                                <div align="center"><?php echo $Semester;  ?></div>

                            </td>

                            <td colspan="2">
                                <!-- <div align="left">ITGM201 -- Human Organizations</div> -->
                                <div align="left"><?php echo $Course;  ?></div>

                            </td>


                            <td>
                                <!-- <div align="center">3</div> -->
                                <div align="center"><?php echo $CRSLoad;  ?></div>

                            </td>

                            <td>
                                <!-- <div align="center">C</div> -->
                                <div align="center"><?php echo $Grade;  ?></div>

                            </td>

                            <td >
                                <!-- <div align="center">C</div> -->
                                <div align="center"><?php echo $S1grade;  ?></div>

                            </td>

                            <td>
                                <!-- <div align="center">C</div> -->
                                <div align="center"><?php echo $S2grade;  ?></div>

                            </td>

                            <td>
                                <!-- <div align="center">2.17</div> -->
                                <div align="center"><?php echo  round($size,2)  ?></div>

                            </td>

                            <td colspan="2">
                                <div align="center"> </div>
                            </td>
                        </tr>


  <?php

       }

  ?>

<?php

global $sis_con;



$sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '201602018' and `semester` = '$i' " ;

$query = mysqli_query($sis_con, $sql);
// while ($trans_res = sqlsrv_fetch_array($query)) {
    $trans_res = mysqli_fetch_array($query);
    
    $sem = $trans_res['semester'];
    $cgpa = $trans_res['cgpa'];
    $gpa = $trans_res['gpa'];
    $acc_status = 'Normal';
    // $acc_status = $trans_res['Status'];
?>
<!--<tfoot style="border:thick">-->
<tr class="table_content" style="height: 15px;">
                    <td colspan="2" style="border:ridge; border-right-style:hidden"> <strong>GPA:</strong> <?php echo round($gpa, 2); ?></td>
                    <td colspan="2" style="border:ridge; border-left-style:hidden; border-right-style:hidden;">
                        <strong>CGPA:</strong> <?php echo round($cgpa, 2); ?>
                    </td>
                    <td colspan="5" style="border:ridge; border-left-style:hidden"><strong>Status:</strong> <?php echo $acc_status; ?>
                    </td>
                </tr>
                <!--</tfoot>-->
                <?php
 }

                ?>

                    </table>

            </td>

        </tr>

        <tr>

            <td colspan="5">

        </tr>

        <tr>

            <td width="29%">
                <div align="right"></div>
            </td>

            <td width="4%">&nbsp;</td>

            <td width="14%">
                <div align="center"></div>
            </td>

            <td width="11%">
                <br>
                
                    <input type="button" value=" Print" onClick="window.print();return false;" class="noPrint" /> 
               
                <button id="export-btn"> PDF</button>
               
            </td>

            <td width="42%"></td>

        </tr>

    </table>

</div>
<!-- <button id="export-btn">Export to PDF</button> -->
  
  <!-- manuel export table to pdf -->
    <script>
      document.getElementById('export-btn').addEventListener('click', function() {
        var table = document.getElementById('my-table');
  
        // Create a new HTML2PDF instance
        var element = document.createElement('div');
        var student_index = document.getElementById('stdindex').value;
        var student_name = document.getElementById('stdname').value;

        var pdf_name  = "[" + student_index + "] " +""+ student_name;

        // alert(pdf_name);
        // alert(student_name);

        element.appendChild(table);
  
        // Set the HTML2PDF options
        var options = {

            
            // the name of table spose to be by this name // [index] student name

        //   filename: 'table.pdf',
           filename: pdf_name,

          html2canvas: { scale: 2 },
          jsPDF: { unit: 'pt', format: 'a4', orientation: 'portrait' }
        };
  
        // Generate the PDF
        html2pdf().set(options).from(element).save();
      });
    </script>



    <?php

?>




