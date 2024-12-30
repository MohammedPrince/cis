<?php
$page = "request";
include("include/header.php");
$get_users = Get_users();
$get_requests = Get_Requests();
?>


<?php

if (isset($_GET['request_id'])) {

    $request_id_de = base64_decode($_GET['request_id']);
    $request_encrypted = $_GET['request_id'];
    $request_data = Get_Requests_Data($request_id_de);

}

if (isset($_GET['std'])) {
    $std_index = $_GET['std'];
    $stud_index = Stud_Index($std_index);
    $student_profile_common = student_profile_common_sql($std_index);
    $batch = $student_profile_common['batch'];
    $major = $student_profile_common['major_code'];
    $faculty = $student_profile_common['faculty_code'];
    $current_sem = $student_profile_common['curr_sem'];
    $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
    $total_hours = Total_Hours($std_index);
    stud_course_mark_sql($std_index, $batch, $major, $grade);
    $std_cert_data = Get_std_cert_Data($std_index);
}




if (isset($_POST['send_request'])) {

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


    $insert_student_info = Insert_Student_Info(
        $std_index,
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
        $senate_on
    );

}

if (isset($_POST['update_request_info'])) {

    // $request_id_de = base64_decode($_GET['request_id']);

    $request_id_de = $_POST['request_id_de'];
    $std_index = $_POST['std_index'];

    $national_number = $_POST['national_number'];
    $ministery_number = $_POST['ministery_number'];

    $std_full_name_en = $_POST['std_full_name_en'];
    $std_full_name_ar = $_POST['std_full_name_ar'];

    // Check if all required fields are not empty
    if (
        !empty($request_id_de) &&
        !empty($std_index) &&
        !empty($national_number) &&
        !empty($ministery_number) &&
        !empty($std_full_name_en) &&
        !empty($std_full_name_ar)
    ) {

        $update_request_info = Update_Request_Info($request_id_de, $std_index, $std_full_name_en, $std_full_name_ar, $national_number, $ministery_number);
    } else {
        echo "<p>Error: All fields are required.</p>";
    }

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
                        <li class="breadcrumb-item active">Request Process</li>
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
                    if (isset($_POST["check_index"])) {

                        $std_index = $_POST['std_index'];

                        $stud_index = Stud_Index($std_index);

                        $student_profile_common = student_profile_common_sql($std_index);
                        $current_sem = $student_profile_common['curr_sem'];
                        $stud_transcript_sql = stud_transcript_sql($std_index, $current_sem);
                        $total_hours = Total_Hours($std_index);
                        stud_course_mark_sql($std_index, $batch, $major, $grade);

                    }

                    ?>

                    <form action="request_process.php" method="POST">

                        <!-- start of the card search -->
                        <?php

                        if (isset($_GET['updated'])) {
                            echo $alert = alerts(1, "Student Information Change successfully");
                        }

                        ?>
                        <div class="card card-info">
                            <div class="card-header">

                                <h3 class="card-title">Academic Information</h3>
                            </div>

                            <div class="card-body">
                                <label>Student Index</label>
                                <input type="text" value="<?php if (isset($request_data))
                                    echo $request_data['std_index'];
                                else
                                    echo ""; ?>" name="std_index" class="form-control"
                                    placeholder="Student Full name" readonly>


                            </div>
                            <!-- end -->
                            <input type="hidden" value="<?php if (isset($request_data))
                                echo $request_encrypted; ?>" name="request_id_de">

                            <!-- start National numbe-->
                            <div class="card-body">
                                <label for="">National Number</label>
                                <div class="col-12">
                                    <input type="text" name="national_number" value="<?php if (isset($request_data))
                                        echo $request_data['national_number'];
                                    else
                                        echo ""; ?>" class="form-control" placeholder="National number" required>
                                </div>
                            </div>
                            <!-- end -->

                            <!-- start Ministery numbe-->
                            <div class="card-body">
                                <label for="">Ministry Number</label>
                                <div class="col-12">
                                    <input type="text" value="<?php if (isset($request_data))
                                        echo $request_data['ministery_number'];
                                    else
                                        echo ""; ?>" name="ministery_number" class="form-control"
                                        placeholder="Ministry number" required>
                                </div>
                            </div>
                            <!-- end -->

                            <div class="card-footer">

                            </div>
                        </div>
                </div>

                <!-- start of the right sid  -->
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Personal Information</h3>
                        </div>

                        <!-- Full Name in Arabic -->
                        <div class="card-body">
                            <label for="">Student Full Name in English</label>
                            <div class="col-8">
                                <input type="text" name="std_full_name_en" value="<?php if (isset($_GET['request_id']))
                                    echo $request_data['std_full_name_en'] ?>" class="form-control"
                                        placeholder="Student Full Nmae..." required>
                                </div>
                            </div>
                            <!-- Full Name in Arabic end-->
                            <!-- Full Name in Arabic -->
                            <div class="card-body">
                                <label for="">Student Full Nmae in Arabic</label>
                                <div class="col-8">
                                    <input type="text" name="std_full_name_ar" value="<?php if (isset($_GET['request_id']))
                                    echo $request_data['std_full_name_ar'] ?>" class="form-control"
                                        placeholder="...أسم الطالب كامل " required>
                                </div>
                            </div>

                        </div>


                        <div class="card card-info">


                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="mr-auto">
                                    <a href="request.php" name="cancel_request_info"
                                        class="btn btn-danger btn-sm btn-equal">
                                        <i><ion-icon name="return-down-back-outline"></ion-icon></i> Back
                                    </a>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="update_request_info"
                                        class="btn btn-primary btn-sm btn-equal">
                                        <i><ion-icon name="arrow-up-circle-outline"></ion-icon></i> Update
                                    </button>
                                </div>

                                <div class="ml-auto">
                                    <?php
                                if (isset($request_data['certificate_type']) && ($request_data['certificate_type'] == "1" || $request_data['certificate_type'] == "2" || $request_data['certificate_type'] == "3")) {
                                    if ($request_data['certificate_type'] == "1") {
                                        ?>
                                        <a href="bachelor_temp.php?std=<?php echo $request_data['std_index']; ?>" name="print"
                                            class="btn btn-info btn-sm btn-equal">
                                            <i><ion-icon name="print-outline"></ion-icon></i> Print Graduation
                                        </a>
                                        <?php
                                    } elseif ($request_data['certificate_type'] == "2") {
                                        ?>
                                        <a href="transcript_temp.php?std=<?php echo $request_data['std_index']; ?>" name="print"
                                            class="btn btn-info btn-sm btn-equal">
                                            <i><ion-icon name="print-outline"></ion-icon></i> Print Transcript
                                        </a>
                                        <?php
                                    } elseif ($request_data['certificate_type'] == "3") {
                                        ?>
                                        <a href="bachelor_temp.php?std=<?php echo $request_data['std_index']; ?>" name="print"
                                            class="btn btn-dark btn-sm btn-equal">
                                            <i><ion-icon name="print-outline"></ion-icon></i> Print Graduation
                                        </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <a href="transcript_temp.php?std=<?php echo $request_data['std_index']; ?>" name="print"
                                            class="btn btn-info btn-sm btn-equal">
                                            <i><ion-icon name="print-outline"></ion-icon></i> Print Transcript
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
    </section>
    </form>

</div>


<?php include("include/footer.php");
?>