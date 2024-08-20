<?php include("include/header.php");?>

<?php

// if (isset($_POST['check_index'])){

    //  = $_POST['questions'];
//     $check_index = Check_Student_Index();
// }


if(isset($_POST['send_request'])){

    $program = $_POST['program'];
    $department = $_POST['department'];
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
    $std_third_name_en = $_POST['std_third_name_en'];
    $std_fourth_name_en = $_POST['std_fourth_name_en'];

    $std_fourth_name_ar = $_POST['std_fourth_name_ar'];
    $std_third_name_ar = $_POST['std_third_name_ar'];
    $std_second_name_ar = $_POST['std_second_name_ar'];
    $std_first_name_ar = $_POST['std_first_name_ar'];

    $std_email = $_POST['std_email'];
    $std_mobail = $_POST['std_mobail'];

    // $ = $_POST['passport'];
    // $ = $_POST['photo'];

    $mode = $_POST['mode'];
    $divition = $_POST['divition'];
    $senate_on = $_POST['senate_on'];


    $insert_student_info = Insert_Student_Info($program,
        $department,
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
        $std_third_name_en, 
        $std_fourth_name_en, 
        $std_fourth_name_ar,
        $std_third_name_ar, 
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

<?php 
if (isset($_POST['send_request'])){
    if ($insert_student_info == 1){
        // echo $alert = alerts(1,"User Added Done");
        echo $alert = alerts(1,"Request Send successfully");
    }



}
?>


<?php 
// if(isset($_POST['check_index'])){
//     if($check_index == 1){  
//         echo $alert = alerts(1,'Index is Valid');
//     }else{
//         echo $alert = alerts(3,'Index is not Valid');
//     }
// }
?>

<!-- start of the card search -->
<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Academic Information</h3>
    </div>

    <!-- search start -->
    <div class="card-body">

        <form action="new_certificate.php" method="POST">

        <label for="">Studaent Index</label>
        <div class="input-group input-group-sm">
            <input type="number" name="std_index" class="form-control">
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
        <select class="form-control" name="program" required="required">
            <option value="">Chose Education Level...</option>
           
            <?php   $get_program = Get_Program();  ?>

            <?php   while( $row = mysqli_fetch_array($get_program)) { ?>
                
            <option value = "<?php echo $row['program_name'];?>"> <?php echo $row['program_name'];?> </option>

            <?php } ?>
        </select>
    </div>
    <!-- end -->


    <!-- start Department-->
    <div class="card-body">
    <label>Department</label>
        <select class="form-control" name="department" required="required">
            <option value="">Select Department...</option>
            <!-- git  Get_Department() function here-->
        </select>
    </div>
    <!-- end -->


    <!-- start Specialization-->
    <div class="card-body">
    <label>Majer</label>
        <select class="form-control" name="majer" required="required">
            <option value="">Select Specialization...</option>
            <option value="1">B.Sc.BA</option>
            <option value="2">B.Sc.IT</option>
            <option value="3">B.Sc.EN</option>
            <option value="4">B.Sc.TCOM</option>
            <option value="5">B.Sc.ART</option>
            <option value="6">B.Sc.SCI</option>
            <option value="7">B.Sc.ARCH</option>
            <option value="8">B.Sc.GIS</option>
        </select>
    </div>
    <!-- end -->


    <!-- start Nationality-->
    <div class="card-body">
    <label>Nationality</label>
        <select class="form-control" name="nationality" required="required">
            <option value="">Select Nationality...</option>
            <option value="1">Sudanese</option>
            <option value="2">Somali</option>
            <option value="3">Nigerian</option>
    
        </select>
    </div>
    <!-- end -->


    <!-- start National numbe-->
    <div class="card-body">
        <label for="">National Numbe</label>
    <div class="col-12">
    <input type="text" name="national_number" class="form-control" placeholder="National numbe..." required>
    </div>
    </div>
    <!-- end -->

    <!-- start Ministery numbe-->
    <div class="card-body">
        <label for="">Ministery Numbe</label>
    <div class="col-12">
    <input type="text" name="ministery_number" class="form-control" placeholder="National numbe..." required>
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


<!-- start GPA numbe-->
<div class="card-body">
    <div class="row">
        <div class="col-4">
            <label for="">GPA</label>
            <input type="number" name="gpa" min="0" max="4" step="0.01" class="form-control" placeholder="GPA..." required>
        </div>
        
        <div class="col-4">
            <label for="">CGPA</label>
            <input type="number" name="cgpa" min="0" max="4" step="0.01" class="form-control" placeholder="CGPA..." required>
        </div>

        <div class="col-4">
            <label for="">Total Hours</label>
            <input type="number" name="total_graduate_hour" min="0" step="1" class="form-control" placeholder="Hours..." required>
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
             <input type="text" name="std_full_name_en" class="form-control" placeholder="Student Full Nmae..." required>
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
                <input type="text" name="std_first_name_en" class="form-control" placeholder="First Name..." required>
            </div>
            <div class="col-3">
                <input type="text" name="std_second_name_en"  class="form-control" placeholder="Second Name..." required>
            </div>
            <div class="col-3">
                <input type="text" name="std_third_name_en"  class="form-control" placeholder="Third Name..." required>
            </div>
            <div class="col-3">
                <input type="text" name="std_fourth_name_en"  class="form-control" placeholder="Fourth Name..." required>
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
            <div class="col-3">
                <input type="text" name="std_third_name_ar" class="form-control" placeholder="...الاسم الثالث" required>
            </div>
            <div class="col-3">
                <input type="text" name="std_second_name_ar" class="form-control" placeholder="...الاسم الثاني" required>
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
                     <input type="file" name="std_photo" class="custom-file-input" id="exampleInputFile" >
                     <label class="custom-file-label" for="exampleInputFile">Choose Photograph</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text btn-info">Upload</span>
                    </div>
                </div>
                <br><br>
             <div class="input-group">
                 <div class="custom-file">
                     <input type="file" name="std_passport" class="custom-file-input" id="exampleInputFile" >
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
        <select class="form-control" name="mode" required="required">
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
        <select class="form-control" name="divition" required="required">
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
        <input type="date" name="senate_on" class="form-control"   required>
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


