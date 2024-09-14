<?php include("include/header.php");?>

<?php


$get_faculty = Get_Faculty();
$get_major = Get_Major();

if(isset($_POST['send_request']) ){

   
// && $_SERVER['REQUEST_METHOD'] == 'POST'
//         $std_photo = $_FILES['std_photo'];
    
//         $image_name = $_FILES['std_photo']['name'];
//         $image_type = $_FILES['std_photo']['type'];
//         $image_temp = $_FILES['std_photo']['tmp_name'];
//         $image_size = $_FILES['std_photo']['size'];

//         move_uploaded_file($image_temp, 'C:\xampp\htdocs\GitRepo\cis\uploads\\' . $image_name);

    


    $std_index = $_POST['std_index'];
    $program = $_POST['program'];
    $faculty = $_POST['faculty'];
    $major = $_POST['major'];
    $nationality = $_POST['nationality'];
    $national_number = $_POST['national_number'];
    $ministery_number = $_POST['ministery_number'];

    $certificate_type = $_POST['certificate_type'];
    $cert_printed_place = $_POST['cert_printed_place'];
    $cert_printed_at = $_POST['cert_printed_at'];
    $gpa = $_POST['gpa'];
    $cgpa = $_POST['cgpa'];
    $total_graduate_hour = $_POST['total_graduate_hour'];

    $std_full_name_en = $_POST['std_full_name_en'];
    $std_full_name_ar = $_POST['std_full_name_ar'];

    $std_first_name_en = $_POST['std_first_name_en'];
    $std_second_name_en = $_POST['std_second_name_en'];
    // $std_third_name_en = $_POST['std_third_name_en'];
    $std_fourth_name_en = $_POST['std_fourth_name_en'];

    $std_fourth_name_ar = $_POST['std_fourth_name_ar'];
    // $std_third_name_ar = $_POST['std_third_name_ar'];
    $std_second_name_ar = $_POST['std_second_name_ar'];
    $std_first_name_ar = $_POST['std_first_name_ar'];

    $std_email = $_POST['std_email'];
    $std_mobail = $_POST['std_mobail'];

    $std_photo = $_POST['std_photo'];
    // $ = $_POST['photo'];

    $mode = $_POST['mode'];
    $divition = $_POST['divition'];
    $senate_on = $_POST['senate_on'];


    $insert_student_info = Insert_Student_Info($std_index,
        $program,
        $faculty,
        $major,
        $nationality,
        $national_number,
        $ministery_number,
        $certificate_type,
        $cert_printed_place,
        $cert_printed_at,
        $gpa, 
        $cgpa,
        $total_graduate_hour, 
        $std_full_name_en,
        $std_full_name_ar,
        $std_first_name_en,
        $std_second_name_en, 
        
        $std_fourth_name_en, 
        $std_fourth_name_ar,
       
        $std_second_name_ar, 
        $std_first_name_ar, 
        $std_email, 
        $std_mobail, 
        $mode, 
        $divition, 
        $senate_on);

}

?>

<!-- Depended Select -->
<script type="text/javascript" src="include/dist/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
	$("#faculty").change(function() {
		// $(this).after('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" /></div>');
		$.get('get_majors.php?faculty=' + $(this).val(), function(data) {
			$("#major").html(data);
			$('#loader').slideUp(200, function() {
				$(this).remove();
			});
		});	
    });

});
</script>

<!-- Depended Select -->

<div class="content-wrapper">
    <!-- start of nave link active -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    </div>
                    <!--  -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">New Certificate</li>
                        </ol>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- end of nave link active -->




<!-- start of card one left side -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-6">

<?php 
if (isset($_POST['send_request'])){
    if ($insert_student_info == 1){
        // echo $alert = alerts(1,"User Added Done");
        echo $alert = alerts(1,"Request Send successfully");
    }
}
?>



<!-- start of the card search -->
<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Academic Information</h3>
    </div>

    <!-- search start -->
    <div class="card-body">

    <?php
    if (isset($_POST["check_index"])){

        $std_index = $_POST['std_index'];

        $stud_index = Stud_Index($std_index);

        if($stud_index == ""){

            echo $alert = alerts(3,'Index is not Valid');
           
        }else{
          $student_profile_common = student_profile_common_sql($std_index);
          $current_sem = $student_profile_common['curr_sem'];
          $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
          $total_hours = Total_Hours($std_index);
          stud_course_mark_sql($std_index);
        // stud_sql($std_index);

        }

    }


    ?>
    <!--search  end -->

 



<form action="new_certificate.php" method="POST" enctype="multipart/form-data">

        <label for="">Studaent Index</label>
        <div class="input-group input-group-sm">

            <input type="text" name="std_index" class="form-control" required>

            <span class="input-group-append">
                <button type="submit" name="check_index" class="btn btn-info btn-flat">Check!</button>
            </span>
        </div>



    </div>
</form>
    <!--search  end -->

<form action="new_certificate.php" method="POST">
    <!-- start of the if statment -->
     <!-- start Education card -->
    <div class="card-body">
        <label>Education Program</label>
        <select class="form-control" name="program" readonly>

            <option value="">Chose Education Level...</option>

            <?php if(isset($student_profile_common)) {  ?>

                <option value="<?php  echo $student_profile_common['program_code'];  ?>" selected>

                <?php  
                
                echo Get_Program($student_profile_common['program_code']);
                ?>
            </option>

        <?php }else{ ?>
       
        <?php } ?>
        <option value="1">Bachelor</option>
        <option value="2">Diploma</option>
        <option value="3">Master</option>
        <option value="4">PhD</option>
        <option value="5">CIT</option>
        <option value="6">COA</option>
        <option value="7">HND</option>
        </select>
        
    </div>
    <!-- end -->

    <input type="hidden" value="<?php if(isset($student_profile_common)) echo $student_profile_common['stud_id']; else echo "" ;?>" name="std_index">  

    <!-- Faculty start-->
    <div class="card-body">
    <label>Faculty</label>
    <?php if(isset($student_profile_common)) {  ?>

    <input type="text" class="form-control" readonly value="<?php  echo Get_Faculty_Name($student_profile_common['faculty_code']); ?>" name="faculty">  


    <?php }else{ ?>
        

        <select class="form-control" name="faculty" id="faculty" required="required">
            <option value="">Select Faculty...</option>
            
            <?php while($row=mysqli_fetch_array($get_faculty)){  ?>

            <option value="<?php  echo $row['faculty_code'];  ?>" >

            <?php  
                 echo $row['faculty_desc_e'];
            ?>

            </option>
            <?php } ?>
       
       <?php } ?>


       </select>
       
    </div>
    <!-- Faculty end -->


    <!-- Major start-->
    <div class="card-body">
    <label>Major</label>
    <?php if(isset($student_profile_common)) {  ?>

<input type="text" class="form-control" readonly value="<?php  echo Get_Major_Name($student_profile_common['major_code']); ?>" name="major">  


<?php }else{ ?>
    

    <select class="form-control" name="major" id="major" required="required">
        <option value="">Select Major...</option>
        

   <?php } ?>


   </select>
    </div>
    <!-- Major end -->

    <!-- major original code start !! -->
    <!-- <select class="form-control" name="major" id="major" required="required">
        <option value="">Select Major...</option>
        
        <?php //while($row=mysqli_fetch_array($get_major)){  ?>

        <option value="<?php  //echo $row['major_code'];  ?>" >

        <?php  
             //echo $row['major_desc_e'];
        ?>

        </option>
        <?php //} ?>
   </select> -->
    <!-- major original code end !! -->





    <!-- start Nationality-->
    <div class="card-body">
    <label>Nationality</label>
       
            <select class="form-control" name="nationality"  readonly="readonly" required="required">
            <option value="">Select Nationality...</option>

            <?php if(isset($student_profile_common)) {  ?>


                <option  value="<?php  echo $student_profile_common['nationality_code'];  ?>" selected>

                 <?php  
                 
                echo Get_Nationalty($student_profile_common['nationality_code']);
                 ?>
                </option>

                <?php }else{ ?>
    
            <?php } ?>
            <option value="0">Foreign</option>
            <option value="1">Sudanese</option>
            <option value="4">Refugees</option>
    
        </select>
    </div>
    <!-- end -->




    <!-- start National numbe-->
    <div class="card-body">
        <label for="">National Number</label>
    <div class="col-12">
    <input type="text" name="national_number" value="<?php if(isset($student_profile_common)) echo $student_profile_common['identity_no']; else echo "" ;?>" class="form-control" placeholder="National numbe..." required>
    </div>
    </div>
    <!-- end -->

    <!-- start Ministery numbe-->
    <div class="card-body">
        <label for="">Ministery Numbe</label>
    <div class="col-12">
    <input type="text" value="<?php if(isset($student_profile_common)) echo $student_profile_common['embassy_code']; else echo "" ;?>"  name="ministery_number" class="form-control" placeholder="National numbe..." required>
    </div>
    </div>
    <!-- end -->

    <div class="card-footer">

    </div>
</div>

<!--  end of first card  in left side left -->
<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Graduates information</h3>
    </div>
            <!-- start certificat type  -->
            <div class="card-body">
        <label>Certificat Type</label>
        <select class="form-control" name="certificate_type" required="required">
            <option value="">Chose type...</option>
            <option value="1">Graduation</option>
            <option value="2">Transcript</option>
        </select>
    </div>
    <!-- end  certificat type -->

        <!-- start Printed Place -->
        <div class="card-body">
        <label>Printed Place</label>
        <select class="form-control" name="cert_printed_place" required="required">
            <option value="">Chose place...</option>
            <option value="1">Khartoum</option>
            <option value="2">Cairo</option>
        </select>
        
    </div>
    <!-- end Printed Place -->

         <!-- start Printed At -->
         <div class="card-body">
        <label>Printed At</label>
        <input type="date" name="cert_printed_at" class="form-control" required>
        
    </div>
    <!-- end Printed Place -->

         <!-- current sem  -->
         <div class="card-body">
        <label>Current Semester </label>
        <input type="text" value="<?php if(isset($stud_transcript_sql)) echo $stud_transcript_sql['semester']; else echo "" ;?>" name="curr_semester" class="form-control" readonly>
        
    </div>
    <!-- end current sem  -->


<!-- start GPA numbe-->
<div class="card-body">
    <div class="row">
        <div class="col-4">
            <label for="">GPA</label>
            <input type="number" name="gpa" value="<?php if(isset($stud_transcript_sql)) echo $stud_transcript_sql['gpa']; else echo "" ;?>" class="form-control" placeholder="GPA..." readonly>
        </div>
        
        <div class="col-4">
            <label for="">CGPA</label>
            <input type="number" name="cgpa" value="<?php if(isset($stud_transcript_sql)) echo $stud_transcript_sql['cgpa']; else echo "" ;?>"  class="form-control" placeholder="CGPA..." readonly>
        </div>

        <div class="col-4">
            <label for="">Total Hours</label>
            <input type="number" name="total_graduate_hour" value="<?php if(isset($total_hours)) echo $total_hours; else echo "" ;?>" name="total_graduate_hour" min="0" step="1" class="form-control" placeholder="Hours..." readonly>
        </div>

    </div>
    
    </div>
    <div class="card-footer"><br></div>

    




    </div>
<!-- end of div of left side row -->
</div>



<!-- start of the right sid  -->
<div class="col-md-6">
    <div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Personal Information</h3>
    </div>

         <!-- Full Name in Arabic -->
         <div class="card-body">
         <label for="">Student Full Nmae in English</label>
         <div class="col-8">
             <input type="text" name="std_full_name_en" value="<?php if(isset($stud_index)) echo $stud_index['stud_name'] . " " . $stud_index['stud_surname'] . " " . $stud_index['familyname'] ; else echo "";  ?>" class="form-control" placeholder="Student Full Nmae..." required>
            </div>
        </div>
        <!-- Full Name in Arabic end-->
         <!-- Full Name in Arabic -->
         <div class="card-body">
         <label for="">Student Full Nmae in Arabic</label>
         <div class="col-8">
             <input type="text" name="std_full_name_ar" class="form-control" placeholder="...أسم الطالب كامل " required>
            </div>
        </div>
        <!-- Full Name in Arabic end-->

    <!-- English name -->
    <div class="card-body">
        <label for="">English Name</label>
        <div class="row">
            <div class="col-3">
                <input type="text" name="std_first_name_en" value="<?php if(isset($stud_index)) echo $stud_index['stud_name'] ; else echo "";  ?>" class="form-control" placeholder="First Name..." required>
            </div>
            <div class="col-3">
                <input type="text" name="std_second_name_en" value="<?php if(isset($stud_index)) echo $stud_index['stud_surname']; else echo "";  ?>" class="form-control" placeholder="Second Name..." required>
            </div>
            <!-- <div class="col-3">
                <input type="text" name="std_third_name_en" value="<?php if(isset($stud_index)) echo $stud_index['stud_name']; else echo "";  ?>" class="form-control" placeholder="Third Name..." required>
            </div> -->
            <div class="col-3">
                <input type="text" name="std_fourth_name_en" value="<?php if(isset($stud_index)) echo $stud_index['familyname']; else echo "";  ?>" class="form-control" placeholder="Fourth Name..." required>
            </div>
        </div>
    </div>
    <!-- english name end-->

    <!-- Arabic name -->
    <div class="card-body">
        <label for="">Arabic Name</label>
        <div class="row">
            <div class="col-3">
                <input type="text" name="std_fourth_name_ar" class="form-control" placeholder="...الاسم الرابع" required>
            </div>
            <!-- <div class="col-3">
                <input type="text" name="std_third_name_ar" class="form-control" placeholder="...الاسم الثالث" required>
            </div> -->
            <div class="col-3">
                <input type="text" name="std_second_name_ar" class="form-control" placeholder="...أسم العائلة" required>
            </div>
            <div class="col-3">
                <input type="text" name="std_first_name_ar" class="form-control" placeholder="...الاسم الاول" required>
            </div>
        </div>
    </div>
    <!-- Arabic name end-->



    <!-- email  and mobail-->
    <div class="card-body">
        <label for="">Email &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;  &ensp;&ensp; &ensp;&ensp; &ensp;&ensp;Mobail</label>           
        <div class="row">
            <div class="col-5">
                <input type="email" name="std_email" class="form-control" placeholder="name@mail.com" required>
            </div>
            <div class="col-5">
                <input type="tel" name="std_mobail" class="form-control" placeholder="+249-110-104-257" required>
            </div>
        </div>
    </div>
    <!-- email  and mobail end-->
    

<!-- upload file -->

     <div class="card-body">
         <div class="form-group">
             <label for="exampleInputFile">Documents Upload</label>
             <div class="input-group">
                 <div class="custom-file">
                     <input type="file" name="std_photo" value="" class="custom-file-input"  >
                     <label class="custom-file-label" for="exampleInputFile">Choose Photograph</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text btn-info">Upload</span>
                    </div>
                </div>
                <br><br>
             <div class="input-group">
                 <div class="custom-file">
                     <input type="file" name="std_passport" value="" class="custom-file-input"  >
                     <label class="custom-file-label" for="exampleInputFile">Choose Passport</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text btn-info">Upload</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
           
        </div>

<!-- upload file end-->










</div>


<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Graduates information</h3>
    </div>
    <!-- start -->
     <!-- dependant multi select -->
    <div class="card-body">
        <label>Graduation Mode(Class) </label>
        <select class="form-control" name="mode" readonly>
            <option value="">Chose Mod...</option>
            <option value="1">First Class</option>
            <option value="2">Second Class</option>
            <option value="3">Third Class</option>
        </select>
        
    </div>
    <!-- end -->
     <!-- dependant multi select -->
    <div class="card-body">
        <label>Graduation Mod(Divition) </label>
        <select class="form-control" name="divition" readonly>
            <option value="">Chose Mod...</option>
            <option value="1">Divistion One</option>
            <option value="2">Divistion Two</option>
            <option value="3">Divistion Three</option>
        </select>
        
    </div>
    <!-- end -->


    <!-- start -->
    <div class="card-body">
        <label>Senate Date</label>
        <input type="date" name="senate_on" class="form-control" required>
    </div>
    <br><br>    
    <div class="card-footer">
        <button type="submit" name="send_request" class="btn btn-info float-right"><i>
        <ion-icon name="send-outline"></ion-icon>
        </i>Send Request</button>
        <!-- <button type="submit"class="btn btn-default " >Cancel</button> -->
    </div>
    <!-- end -->

</div>







</div>
</div>
</div>
</section>
</form>

</div>

<?php include("include/footer.php");?>


