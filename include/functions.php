<?php

session_start();


$conn = mysqli_connect("localhost", "root", "", "cis");
mysqli_set_charset($conn, 'UTF8');
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET CHARACTER SET utf8');



$sis_con = mysqli_connect("localhost", "cis_sis", "cis_sis@root*#", "sis");
mysqli_set_charset($sis_con, 'UTF8');
mysqli_query($sis_con, "SET NAMES 'utf8'");
mysqli_query($sis_con, 'SET CHARACTER SET utf8');

if (!$conn && $sis_con) {
    echo "Error," . mysqli_connect_error();
    die;
} else {
    // echo "Success!";
}


//========================= Global Variables =======================//
$alert = '';
$star = "<font style='color:#900;'> * </font>";
//============= Change Date ========================//

function changeDateFormat($date)
{
    return date("Y-m-d", strtotime($date));
}
//======================== Alerts =================//
function alerts($type, $message)
{
    switch ($type) {
        case 1: {
            $res = '<div class="alert alert-success alert-dismissible" role="alert" style="text-align:center">' . $message . '</div>';
            break;
        }//Green
        case 2: {
            $res = '<div class="alert alert-primary alert-dismissible" role="alert" style="text-align:center">' . $message . '</div>';
            break;
        }//Blue
        case 3: {
            $res = '<div class="alert alert-warning alert-dismissible" role="alert" style="text-align:center">' . $message . '</div>';
            break;
        }//Yellow
        case 4: {
            $res = '<div class="alert alert-danger alert-dismissible" role="alert" style="text-align:center">' . $message . '</div>';
            break;
        }//Red	
    }
    return $res;
}


function Login($username, $password)
{

    global $conn;
    $new_password = md5($password);
    // echo ''.$username.''.$new_password.'';
    $sqli = "SELECT * FROM `users` WHERE  `username` = '$username' AND `password` = '$new_password' ";

    if ($query = mysqli_query($conn, $sqli)) {
        if (mysqli_num_rows($query)) {

            $row = mysqli_fetch_array($query);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_full_name'] = $row['user_full_name'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['created_at'] = $row['created_at'];

            header("Location: home.php");

        } else {
            // echo "No user";
            return 1;

            // echo $sqli;
        }
    } else {
        echo $sqli;
    }
}

function Get_users()
{
    global $conn;
    $sqli = "SELECT * FROM `users` WHERE `dell_user` = 0 ";
    if ($query = mysqli_query($conn, $sqli)) {
        return $query;
    } else {
        echo $sqli;
        die();
    }
}

function Add_user($user_full_name, $username, $user_email, $password, $user_type)
{
    global $conn;


    $sqli_check = "SELECT * FROM `users` WHERE `dell_user` = 0 AND `username`='$username' AND `user_type` = '$user_type'  ";
    // $sqli_check  = "SELECT * FROM `users` WHERE `username`='$username' AND `user_type` = '$user_type' AND `user_staff_id` = '$user_staff_id'";
    $query_ckeck = mysqli_query($conn, $sqli_check);
    if (mysqli_num_rows($query_ckeck) > 0) {
        return 1;

    } else {

        $new_pass = md5($password);
        $sqli = "INSERT INTO `users`(`user_full_name`,`username`, `user_email`, `password`, `user_type`) 
          VALUES ('$user_full_name','$username','$user_email','$new_pass',$user_type)";
        // $sqli = "INSERT INTO `users`(`user_full_name`,`username`, `user_email`, `password`, `user_staff_id`, `user_type`) 
        //   VALUES ('$user_full_name','$username','$user_email','$new_pass',$user_type)";
        if ($query = mysqli_query($conn, $sqli)) {
            return 1;

        } else {
            echo $sqli;
            //    return 2;
        }
    }
}

function Delet_user($delet_id)
{
    global $conn;

    $NEWdell = base64_decode($delet_id);
    $sqli = "UPDATE `users` SET dell_user=1 WHERE `user_id` = $NEWdell";


    if ($query = mysqli_query($conn, $sqli)) {
        return 1;
    } else {

        echo $sqli;

        die();

    }
}

function Update_user_info($updated_password)
{
    global $conn;
    $new_updated_password = md5($updated_password);

    $sqli = "UPDATE `users`SET `password`= '$new_updated_password' ";
    if ($query = mysqli_query($conn, $sqli)) {
        return 1;

    } else {
        return 2;

    }

}

function Get_paper()
{
    global $conn;
    $sqli = "SELECT * FROM `papers` WHERE `dell_paper` = 0";
    if ($query = mysqli_query($conn, $sqli)) {
        return $query;
    } else {
        echo $sqli;
        die();
    }
}

function Insert_paper($paper_number, $serial_number_start, $serial_number_end)
{
    global $conn;

    $sqli = "INSERT INTO `papers`(`paper_number`,`serial_number_start`,`serial_number_end`) VALUES ($paper_number, $serial_number_start,$serial_number_end)";
    if ($query = mysqli_query($conn, $sqli)) {
        return $query;

    } else {
        return 2;
    }
}


// function Check_Student_Index(){
global $conn;

//    $sqli = "SELECT * FROM `student_cert_info` WHERE `dell_std_cert_info` = 0";
//    if($query = mysqli_query($conn,$sqli)){
//     return 1;

//          }else{
//          return $sqli;
//          }
// }




function Insert_Student_Info($program, $department, $majer, $nationality, $national_number, $ministery_number, $certificate_type, $cert_printed_place, $cert_printed_at, $gpa, $cgpa, $total_graduate_hour, $std_full_name_en, $std_full_name_ar, $std_first_name_en, $std_second_name_en, $std_third_name_en, $std_fourth_name_en, $std_fourth_name_ar, $std_third_name_ar, $std_second_name_ar, $std_first_name_ar, $std_email, $std_mobail, $mode, $divition, $senate_on)
{

    global $conn;

    // must me check by std index first

    $sqli_1 = "INSERT INTO
         `student_basic_info`
         (`std_full_name_en`, `std_full_name_ar`, `std_first_name_en`, `std_second_name_en`, `std_third_name_en`, `std_fourth_name_en`, `std_first_name_ar`, `std_second_name_ar`, `std_third_name_ar`, `std_fourth_name_ar`, `std_email`, `std_mobail`)
         VALUES 
         ('$std_full_name_en', '$std_full_name_ar', '$std_first_name_en', '$std_second_name_en', '$std_third_name_en', '$std_fourth_name_en', '$std_first_name_ar', '$std_second_name_ar', '$std_third_name_ar', '$std_fourth_name_ar', '$std_email', '$std_mobail')";
    if ($query_1 = mysqli_query($conn, $sqli_1)) {

        $std_info_last_id = Get_Std_Info_Last_Id();

        $sqli_2 = "INSERT INTO `student_cert_info`(`student_basic_info_id`, `program`, `department`, `majer`, `nationality`, `national_number`, `ministery_number`, `certificate_type`, `cert_printed_place`, `cert_printed_at`, `gpa`, `cgpa`, `total_graduate_hour`, `mode`, `divition`, `senate_on`)
          VALUES
           ('$std_info_last_id','$program','$department','$majer','$nationality','$national_number','$ministery_number', '$certificate_type', '$cert_printed_place', '$cert_printed_at','$gpa','$cgpa','$total_graduate_hour', '$mode','$divition', '$senate_on')";

        if ($query_2 = mysqli_query($conn, $sqli_2)) {

            Request();
            return 1;
        } else {

            echo "Query No 2" . " " . $sqli_2;
        }
    } else {
        echo "Query No 1" . " " . $sqli_1;
    }
}

function Request()
{
    global $conn;
    $user_id = $_SESSION['user_id'];


    $std_cert_info_last_id = Get_Std_Cert_Info_Last_Id();
    $sqli = "INSERT INTO `request`(`std_cert_id`, `user_id`) VALUES ('$std_cert_info_last_id', '$user_id')";

    if ($query = mysqli_query($conn, $sqli)) {
        return $query;

    } else {
        echo $sqli;
    }
}

function Get_Std_Info_Last_Id()
{
    global $conn;
    $sql_id = "SELECT MAX(student_basic_info_id) AS student_info_id FROM student_basic_info";
    $query = mysqli_query($conn, $sql_id);
    $values = mysqli_fetch_assoc($query);
    $num_rows = $values['student_info_id'];
    return $num_rows;

}
function Get_Std_Cert_Info_Last_Id()
{
    global $conn;
    $sql_id = "SELECT MAX(std_cert_id) AS cert_id FROM student_cert_info";
    $query = mysqli_query($conn, $sql_id);
    $values = mysqli_fetch_assoc($query);
    $num_rows = $values['cert_id'];
    return $num_rows;

}

function Get_Requests()
{
    global $conn;

    $sqli = "SELECT * FROM `student_basic_info`bi, `student_cert_info`si, `request`r,`users`u WHERE bi.student_basic_info_id = si.student_basic_info_id AND si.std_cert_id = r.`std_cert_id` AND u.user_id  = r.user_id AND
    r.dell_request = 0 ORDER BY r.request_id ASC";

    if ($query = mysqli_query($conn, $sqli)) {
        return $query;

    } else {
        echo $sqli;
    }
}


// sis
function Get_Program()
{
    global $conn;

    $sqli = "SELECT * FROM `program` WHERE dell_program = 0";
    if ($query = mysqli_query($conn, $sqli)) {

        return $query;

    } else {
        echo $sqli;
        die;

    }
}
function Get_Department()
{
    // global $conn;

    // $sqli = "SELECT * FROM `department` WHERE dell_department = 0";
    // if($query = mysqli_query($conn,$sqli)){

    //     return $query;

    // }else{
    //     echo $sqli;
    //     die;

    // }
}



function Stud_Info($stud_id)
{
    global $sis_con;

    //SIS Tables :

    //student_profile_e
    //student_profile_common
    //stud_course_mark
    //stud_transcript_table
    //faculty
    //major

    /*
    Retrun data in any methods you want to, But avoid DUPLICATION.
    */

    
    $stud_profile_sql = "SELECT * FROM `student_profile_e` WHERE `stud_id` = '$stud_id' " ;
    $stud_profile_query = mysqli_query($sis_con, $stud_profile_sql);

    
    $student_profile_common_sql = "SELECT * FROM `student_profile_common` WHERE `stud_id` = '$stud_id' " ;
    $student_profile_common_query = mysqli_query($sis_con, $student_profile_common_sql);

        
    $stud_course_mark_sql = "SELECT * FROM `stud_course_mark` WHERE `stud_id` = '$stud_id' " ;
    $stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql);

    $stud_transcript_sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '$stud_id' " ;
    $stud_transcript_query = mysqli_query($sis_con, $stud_transcript_sql);


    // $stud_sql = "SELECT * FROM `student_profile_e` SP, `student_profile_common` SC , `stud_course_mark` SM , `stud_transcript_table` ST  WHERE SC.`stud_id` = '$stud_id' and SM.`stud_id` = '$stud_id' and ST.`stud_id` = '$stud_id' " ;
    // $stud_query = mysqli_query($sis_con, $stud_sql);

 



}











?>