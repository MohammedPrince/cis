<?php include("include/header.php");?>







<?php

if(isset($_GET['request_id'])){

 $request_id_de = base64_decode($_GET['request_id']);

 $request_data = Get_Requests_Data($request_id_de);
 
}else{

}




if(isset($_POST['send_request'])){

    $std_index = $_POST['std_index'];
    $program = $_POST['program'];
    $faculty = $_POST['Faculty'];
    $majer = $_POST['majer'];
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

    // $ = $_POST['passport'];
    // $ = $_POST['photo'];

    $mode = $_POST['mode'];
    $divition = $_POST['divition'];
    $senate_on = $_POST['senate_on'];


    $insert_student_info = Insert_Student_Info($std_index,
        $program,
        $faculty,
        $majer,
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


<!--  -->
<?php
    if (isset($_POST["check_index"])){

        $std_index = $_POST['std_index'];

        $stud_index = Stud_Index($std_index);

        $student_profile_common = student_profile_common_sql($std_index);
        $current_sem = $student_profile_common['curr_sem'];
        $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
        $total_hours = Total_Hours($std_index);
        stud_course_mark_sql($std_index);
        // stud_sql($std_index);

        
    }
    
?>
<!--  -->


<!-- start of the card search -->
<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Academic Information</h3>
    </div>
    <div class="card-body">
        <label>Student Index</label>
        <input type="text" value="<?php if(isset($request_data))  echo $request_data['std_index']; else echo ""; ?>" name="std_index"  class="form-control" placeholder="Student Full Nmae..." readonly>
        
        
    </div>
    <!-- end -->
    


<form action="new_certificate.php" method="POST">



    <!-- start National numbe-->
    <div class="card-body">
        <label for="">National Number</label>
    <div class="col-12">
    <input type="text" name="national_number" value="<?php if(isset($request_data)) echo $request_data['national_number']; else echo "" ;?>" class="form-control" placeholder="National numbe..." required>
    </div>
    </div>
    <!-- end -->

    <!-- start Ministery numbe-->
    <div class="card-body">
        <label for="">Ministery Numbe</label>
    <div class="col-12">
    <input type="text" value="<?php if(isset($request_data)) echo $request_data['ministery_number']; else echo "" ;?>"  name="ministery_number" class="form-control" placeholder="National numbe..." required>
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
            <!-- <div class="card-body">
        <label>Certificat Type</label>
        <select class="form-control" name="certificate_type" required="required">

            <option value="">Chose type...</option>
            <?php 
            // if (isset($request_data))
            //   {?>
                <option value="<?php
                //  if(isset($request_data))  echo $request_data['certificate_type']; else echo "" ;   ?>" selected></option>
                 <?php
                //  } 
                //  else { ?>
                <?php 
                // if (isset($request_data)) {
                //     if ($request_data['certificate_type']==1) {
                //         echo "Graduation";
                //     }if($request_data['certificate_type']==2) {
                //         echo "Transcript";
                //     }
                    
                // }
                // }?>
        
                    
                    
            <option value="1">Graduation</option>
            <option value="2">Transcript</option>
        </select>
    </div> -->


         <!-- start Printed At -->
         <div class="card-body">
        <label>Printed At</label>
        <input type="date" value="<?php if(isset($request_data))  echo  $request_data['cert_printed_at']; else echo "" ;   ?>" name="cert_printed_at" class="form-control" required>
        
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
             <input type="text" name="std_full_name_en" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_full_name_en'] ?>" class="form-control" placeholder="Student Full Nmae..." required>
            </div>
        </div>
        <!-- Full Name in Arabic end-->
         <!-- Full Name in Arabic -->
         <div class="card-body">
         <label for="">Student Full Nmae in Arabic</label>
         <div class="col-8">
             <input type="text" name="std_full_name_ar" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_full_name_ar'] ?>" class="form-control" placeholder="...أسم الطالب كامل " required>
            </div>
        </div>
        <!-- Full Name in Arabic end-->

    <!-- English name -->
    <div class="card-body">
        <label for="">English Name</label>
        <div class="row">
            <div class="col-3">
                <input type="text" name="std_first_name_en" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_first_name_en'] ; else echo "";  ?>" class="form-control" placeholder="First Name..." required>
            </div>
            <div class="col-3">
                <input type="text" name="std_second_name_en" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_second_name_en']; else echo "";  ?>" class="form-control" placeholder="Second Name..." required>
            </div>
            <!-- <div class="col-3">
                <input type="text" name="std_third_name_en" value="" class="form-control" placeholder="Third Name..." required>
            </div> -->
            <div class="col-3">
                <input type="text" name="std_fourth_name_en" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_fourth_name_en']; else echo "";  ?>" class="form-control" placeholder="Fourth Name..." required>
            </div> 
        </div>
    </div>
    <!-- english name end-->



    <!-- Arabic name -->
    <div class="card-body">
        <label for="">Arabic Name</label>
        <div class="row">
            <div class="col-3">
                <input type="text" name="std_fourth_name_ar" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_fourth_name_ar'] ; else echo "";  ?>" class="form-control" placeholder="...الاسم الرابع" required>
            </div>
            <!-- <div class="col-3">
                <input type="text" name="std_third_name_ar" class="form-control" placeholder="...الاسم الثالث" required>
            </div> -->
            <div class="col-3">
                <input type="text" name="std_second_name_ar" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_second_name_ar'] ; else echo "";  ?>" class="form-control" placeholder="...أسم العائلة" required>
            </div>
            <div class="col-3">
                <input type="text" name="std_first_name_ar" value="<?php if(isset($_GET['request_id'])) echo $request_data['std_first_name_ar'] ; else echo "";  ?>" class="form-control" placeholder="...الاسم الاول" required>
            </div>
        </div>
    </div>
    <!-- Arabic name end-->

</div>


<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Editing Process</h3>
    </div>
    <div class="card-body">
    <label>Reply with Comment(Optional)</label>
    <textarea class="form-control" rows="3" placeholder="Enter your comment here ..."></textarea>
    </div>




 
    <div class="card-footer">
    <?php 
    if (isset($request_data['certificate_type']) && ($request_data['certificate_type'] == "1" || $request_data['certificate_type'] == "2")) {
        if ($request_data['certificate_type'] == "1") {
            ?>
            <a href="bachelor_temp.php?std=<?php echo $request_data['std_index']; ?>" name="print" class="btn btn-info btn-sm float-right">
                <i><ion-icon name="print-outline"></ion-icon></i> Print
            </a>
            <?php 
        } elseif ($request_data['certificate_type'] == "2") {
            ?>
            <a href="bachelor_transcript_temp.php?std=<?php echo $request_data['std_index']; ?>" name="print" class="btn btn-info btn-sm float-right">
                <i><ion-icon name="print-outline"></ion-icon></i> Print
            </a>
            <?php 
        }
    } 
?>

        


?>
        <div class="text-center">
            <a href="request_process.php?return" name="return" class="btn btn-primary btn-sm float-center"><i>
                <ion-icon name="trash-bin-outline"></ion-icon>
            </i>Return</a>

        </div>

    
        <a href="request_process.php?cancel" name="cancel" class="btn btn-danger btn-sm float-left" ><i>
        <ion-icon name="trash-bin-outline"></ion-icon>
        </i>Cancel</a>

        
        

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


