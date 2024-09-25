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
            return 1;
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

    $sqli_check = "SELECT * FROM `users` WHERE `username`='$username' AND `user_type` = '$user_type' AND `dell_user` = 0 ";

    $query_ckeck = mysqli_query($conn, $sqli_check);
    if (mysqli_num_rows($query_ckeck) > 0) {
        return 2;

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

    // $serial_count = $serial_number_end - $serial_number_start + 1;

    // if ($serial_count == $paper_number) {
        
        $sqli = "INSERT INTO `papers`(`paper_number`,`serial_number_start`,`serial_number_end`) VALUES ('$paper_number', CONCAT('FU', '$serial_number_start'), '$serial_number_end')";
        if ($query = mysqli_query($conn, $sqli)) {
            return 1; 
        } else {
            return 2;
        // }
        // } else {
            // return 3;
        }
    }




function Insert_Student_Info($std_index, $program, $faculty, $major, $nationality, $national_number, $ministery_number, $certificate_type, $cert_printed_place, $cert_printed_at, $gpa, $cgpa, $total_graduate_hour, $std_full_name_en, $std_full_name_ar, $std_first_name_en, $std_second_name_en,  $std_fourth_name_en, $std_fourth_name_ar, $std_second_name_ar, $std_first_name_ar, $std_email, $std_mobail, $mode, $division, $senate_on)
{

    global $conn;

    // must me check by std index first

    $sqli_1 = "INSERT INTO
         `student_basic_info`
         (`std_index`, `std_full_name_en`, `std_full_name_ar`, `std_first_name_en`, `std_second_name_en`,  `std_fourth_name_en`, `std_first_name_ar`, `std_second_name_ar`,  `std_fourth_name_ar`, `std_email`, `std_mobail`)
         VALUES 
         ('$std_index', '$std_full_name_en', '$std_full_name_ar', '$std_first_name_en', '$std_second_name_en', '$std_fourth_name_en', '$std_first_name_ar', '$std_second_name_ar',  '$std_fourth_name_ar', '$std_email', '$std_mobail')";
    if ($query_1 = mysqli_query($conn, $sqli_1)) {

        $std_info_last_id = Get_Std_Info_Last_Id();

        $sqli_2 = "INSERT INTO `student_cert_info`(`student_basic_info_id`, `program`, `faculty`, `major`, `nationality`, `national_number`, `ministery_number`, `certificate_type`, `cert_printed_place`, `cert_printed_at`, `gpa`, `cgpa`, `total_graduate_hour`, `mode`, `division`, `senate_on`)
          VALUES
           ('$std_info_last_id','$program','$faculty','$major','$nationality','$national_number','$ministery_number', '$certificate_type', '$cert_printed_place', '$cert_printed_at','$gpa','$cgpa','$total_graduate_hour', '$mode','$division', '$senate_on')";

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

function Get_Requests_Data($request_id_de){
    global $conn;

    $sql = "SELECT * FROM `student_basic_info`bi, `student_cert_info`si, `request`r,`users`u WHERE bi.student_basic_info_id = si.student_basic_info_id AND si.std_cert_id = r.`std_cert_id` AND u.user_id  = r.user_id AND
    r.dell_request = 0 AND r.request_id = '$request_id_de'";

    if($query = mysqli_query($conn, $sql)){

        $row = mysqli_fetch_array($query);
        return $row;

       }

}

function Get_std_cert_Data($std_index){
    global $conn;

    $sql = "SELECT * FROM `student_basic_info`bi, `student_cert_info`si WHERE bi.student_basic_info_id = si.student_basic_info_id and bi.std_index = '$std_index'";

    if($query = mysqli_query($conn, $sql)){

        $row = mysqli_fetch_array($query);
        return $row;

       }

}





function Total_Request(){
    global $conn;
    $total_request_sql = "SELECT SUM(request_id) AS total_request FROM `request` WHERE `dell_request` = '0'";
    if($total_request_query = mysqli_query($conn, $total_request_sql)){
        $row = mysqli_fetch_assoc($total_request_query);
        $num_rows = $row['total_request'];
        return $num_rows;

    }else{
            echo $total_request_sql;
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
function Get_Cert_Type()
{
    global $conn;
    $sql_id = "SELECT MAX(std_cert_id) AS cert_type FROM student_cert_info";
    $query = mysqli_query($conn, $sql_id);
    $values = mysqli_fetch_assoc($query);
    $num_rows = $values['std_cert_id'];
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
// function Get_Program()
// {
//     global $conn;

//     $sqli = "SELECT * FROM `program` WHERE dell_program = 0";
//     if ($query = mysqli_query($conn, $sqli)) {

//         return $query;

//     } else {
//         echo $sqli;
//         die;

//     }
// }



function Get_Faculty() {

    global $conn;
    
    $query = "SELECT * FROM `faculty` WHERE `deleted` = 0 ";

    if ($query = mysqli_query($conn, $query)) {

        return $query;

    } else {
        echo $query;
        die;

    }
}

function  Get_Faculty_Name($faculty_code){

    global $conn;

    $sql = "SELECT * FROM `faculty` WHERE `faculty_code` =  $faculty_code";
    if($query = mysqli_query($conn, $sql)){
        $row = mysqli_fetch_array($query);
            return $row['faculty_desc_e'];

    }else{
            echo $query;
        }

}
// function Get_Class($cert_type){

//     global $conn;

//     $sql = "SELECT * FROM `student_cert_info` WHERE `certificate_type` = '$cert_type' ";
//     if($query = mysqli_query($conn, $sql)){
//         $row = mysqli_fetch_array($query);
//             return $row['certificate_type'];

//     }else{
//             echo $query;
//         }

// }





function Get_Major(){
    global $conn;
    
    $query = "SELECT * FROM `major` WHERE `deleted` = 0 ";

    if ($query = mysqli_query($conn, $query)) {

        return $query;

    } else {
        echo $query;
        die;

    }
  
}

function Get_Major_Name($major_code){
    global $conn;

    $sql = "SELECT * FROM `major` WHERE `major_code` =  $major_code";
    if($query = mysqli_query($conn, $sql)){
        $row = mysqli_fetch_array($query);
            return $row['major_desc_e'];

    }else{
            echo $query;
        }

}

// 
// function Get_Student_Faculty_Code($std_index) {
//     global $sis_con;
//     $query = "SELECT `faculty_code`  FROM `faculty` WHERE `stud_id` =  '$std_index'";
//     $result = mysqli_query($sis_con, $query);
//     $row = mysqli_fetch_assoc($result);
//     return $row['faculty_code'];
// }


// function Get_Student_Major_Code($std_index) {
//     global $sis_con;
//     $query = "SELECT `major_code` FROM `major` WHERE `stud_id` = '$std_index'";
//     $result = mysqli_query($sis_con, $query);
//     $row = mysqli_fetch_assoc($result);
//     return $row['major_code'];
// }
// // 

function Get_Batch($std_index, $batch){
    global $sis_con;

    $sqli = "SELECT * FROM `stud_course_mark` WHERE `stud_id` = '$std_index' AND `batch` = '$batch'";

    if ($query = mysqli_query($sis_con, $sqli)) {
        return $query;
    } else {
        echo $sqli;
        die();
    }
}





function Stud_Index($std_index)
{
    global $sis_con;

    //SIS Tables :
// student_profile
    //student_profile_e
    //student_profile_common
    //stud_course_mark
    //stud_transcript_table
    //faculty
    //major

    /*
    Retrun data in any methods you want to, But avoid DUPLICATION.
    */

    $sqli = "SELECT * FROM `student_profile_e` WHERE `stud_id` = '$std_index'  ";
   
    if ($sqli = mysqli_query($sis_con, $sqli)) {    

        if (mysqli_num_rows($sqli)){

            $row = mysqli_fetch_array($sqli);
            return $row;
        }

    }
    // if true select the data of student to display it into fild.
    else {
        return 2;
    }

    
    // $stud_profile_sql = "SELECT * FROM `student_profile_e` WHERE `stud_id` = '$Stud_Index' " ;
    // $stud_profile_query = mysqli_query($sis_con, $stud_profile_sql);

    
    // $student_profile_common_sql = "SELECT * FROM `student_profile_common` WHERE `stud_id` = '$Stud_Index' " ;
    // $student_profile_common_query = mysqli_query($sis_con, $student_profile_common_sql);

        
    // $stud_course_mark_sql = "SELECT * FROM `stud_course_mark` WHERE `stud_id` = '$Stud_Index' " ;
    // $stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql);

    // $stud_transcript_sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '$Stud_Index' " ;
    // $stud_transcript_query = mysqli_query($sis_con, $stud_transcript_sql);


    // $stud_sql = "SELECT * FROM `student_profile_e` SP, `student_profile_common` SC , `stud_course_mark` SM , `stud_transcript_table` ST  WHERE SC.`stud_id` = '$stud_id' and SM.`stud_id` = '$stud_id' and ST.`stud_id` = '$stud_id' " ;
    // $stud_query = mysqli_query($sis_con, $stud_sql);

 
}




      function student_profile_common_sql($std_index){
        global $sis_con;
           $student_profile_common_sql = "SELECT * FROM `student_profile_common` WHERE `stud_id` = '$std_index' " ;
           if($student_profile_common_sql = mysqli_query($sis_con, $student_profile_common_sql)){

            $row = mysqli_fetch_array($student_profile_common_sql);
            return $row;

           }else{
            return 3;
           }


      }
      function stud_course_mark_sql($std_index){
        global $sis_con;

            $stud_course_mark_sql = "SELECT * FROM `stud_course_mark` WHERE `stud_id` = '$std_index' " ;
            if($stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql)){
                $row = mysqli_fetch_array($stud_course_mark_sql_query);
                return $row;
            }else{
                echo $stud_course_mark_sql;
            }
      }
      
    // get Bachelor cgpa and gpa
       function stud_transcript_sql($std_index, $current_sem){
        global $sis_con;
        $stud_transcript_sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '$std_index' AND `semester` = '$current_sem' " ;
        if($stud_transcript_query = mysqli_query($sis_con, $stud_transcript_sql)){
            $row = mysqli_fetch_array($stud_transcript_query);
                return $row;

        }else{
                echo $stud_transcript_sql;
            }
      }

      function Total_Hours($stud_index){
        global $sis_con;
        $total_hours_sql = "SELECT SUM(course_units) AS unit FROM `stud_course_mark` WHERE `stud_id` = '$stud_index'";
        if($total_hours_query = mysqli_query($sis_con, $total_hours_sql)){
            $row = mysqli_fetch_assoc($total_hours_query);
            $num_rows = $row['unit'];
            return $num_rows;

        }else{
                echo $total_hours_sql;
            }

      }
    //  function stud_sql($std_index){
    //    global $sis_con; 

    //        $stud_sql = "SELECT * FROM `student_profile_e` SP, `student_profile_common` SC , `stud_course_mark` SM , `stud_transcript_table` ST  WHERE SC.`stud_id` = '$std_index' and SM.`stud_id` = '$std_index' and ST.`stud_id` = '$std_index' " ;
    //        if($stud_query = mysqli_query($sis_con, $stud_sql)){
    //         $row = mysqli_fetch_array($stud_query);
    //         return $row;
    //        }else{
    //         echo $stud_sql;
    //        }
    //  }




    function Get_Nationalty($nationality_code){

        if($nationality_code==0){
            return "Foreign";
         }
         if($nationality_code==1){
            return "Sudanese";
         }
         if($nationality_code==4){
            return "Refugees";
         }
         
    }

    function Get_Program($program_code){
         if($program_code==1){
            return "Bachelor";
         }
         if($program_code==2){
            return "Diploma";
         }
         if($program_code==3){
            return "Master";
         }
         if($program_code==4){
            return "PhD";
         }
         if($program_code==5){
            return "CIT";
         }
         if($program_code==6){
            return "COA";
         }
         if($program_code==7){
            return "HND";
         }
    }



// function calculateSerial($numPapers, $startingSerial) {

//     global $conn;
//     $sqli = "SELECT * FROM `papers` WHERE `dell_paper` = 0 ";




// }


function Get_Format_Date($date) {
    $dateTime = DateTime::createFromFormat('Y-m-d', $date);
    
    // Check if the date was created successfully
    if (!$dateTime) {
        return "Invalid date format. Please use d-m-Y format.";
    }

    // Get the day and apply the appropriate suffix (st, nd, rd, th)
    $day = $dateTime->format('j');
    $daySuffix = getDaySuffix($day);

    // Format the date to "jS of F Y"
    return $day . $daySuffix . ' of ' . $dateTime->format('F Y');
}

// Helper function to get the suffix for the day
function getDaySuffix($day) {
    if ($day % 100 >= 11 && $day % 100 <= 13) {
        return 'th';
    }
    switch ($day % 10) {
        case 1: return '<sup>st</sup>';
        case 2: return '<sup>nd</sup>';
        case 3: return '<sup>rd</sup>';
        default: return '<sup>th</sup>';
    }
}

function N_Date($nudate) {
    // Create a DateTime object from the input date
    $dateTime = new DateTime($nudate);

    // Format the date as "d.m.Y" (day.month.year)
    return $dateTime->format('d.m.Y');
}

function Get_Place_Issue($place){
    if($place==1){
        return 'Khartoum';
    }
    if($place==2){
        return 'Cairo';
    }
}

function Get_Mode($get_mode){
    if($get_mode==1){
        return  'First Class';
    }
    if($get_mode==2){
        return  'Second Class';
    }
    if($get_mode==2){
        return  'Third Class';
    }

}
function Get_Division($get_division){
    if($get_division==1){
        return 'Division One';
    }
    if($get_division==2){
        return 'Division Two';
    }
    if($get_division==2){
        return 'Division Three';
    }

}



     

?>

