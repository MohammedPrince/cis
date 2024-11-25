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
    $sqli = "SELECT * FROM `papers` WHERE `dell_paper` = 0 ORDER BY `paper_number` DESC";
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

    // Convert serial numbers to integers for comparison
    $serial_start = (int)$serial_number_start;
    $serial_end = (int)$serial_number_end;

    // Calculate the total number of serial numbers
    $total_serials = $serial_end - $serial_start + 1;

    // Validate that the total number of serials does not exceed paper_number
    if ($total_serials > $paper_number) {
        return 3; // Return a specific code for validation failure
    }

    // Prepare the SQL statement
    $sqli = "INSERT INTO `papers`(`paper_number`,`serial_number_start`,`serial_number_end`) 
             VALUES ('$paper_number', CONCAT('FU', '$serial_number_start'), '$serial_number_end')";

    // Execute the query
    if ($query = mysqli_query($conn, $sqli)) {
        return 1; // Success
    } else {
        return 2; // Query execution failure
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

function  Delete_Requests($delet_id){
    global $conn;

    $NEWdell = base64_decode($delet_id);
    $sqli = "UPDATE `request` SET dell_request = 1 WHERE `request_id` = $NEWdell";


    if ($query = mysqli_query($conn, $sqli)) {
        return 1;
    } else {

        echo $sqli;

        die();

    }

}


function Update_Request_Info($request_id_de, $std_index, $std_full_name_en, $std_full_name_ar, $national_number, $ministery_number) {
    global $conn;

    $sqli = "UPDATE `student_basic_info` SET `std_full_name_en` = '$std_full_name_en', `std_full_name_ar` = '$std_full_name_ar' WHERE `std_index` = '$std_index' AND `dell_std_basic_info` = 0";
    $query_1 = mysqli_query($conn, $sqli);
    
    $sqli_2 = "UPDATE `student_cert_info` SET `national_number` = '$national_number', `ministery_number` = '$ministery_number' WHERE  `dell_std_cert_info` = 0";
    $query_2 = mysqli_query($conn, $sqli_2);

    if ($query_1 && $query_2) {
        // return 1;
        ?>
        <script>
    window.location = './request_process.php?updated&request_id='+ <?php echo json_encode($request_id_de); ?>;
       </script>
        
        <!-- // echo  $sqli; -->
<?php
    } else {
        
        return 2;
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

function Cancel_Request($cancel_id) {
    global $conn;

    $NEWdell = base64_decode($cancel_id);

    $sqli = "UPDATE `request` SET canceled_request = 1 WHERE `request_id` = $NEWdell AND `dell_request` = 0";

    if ($query = mysqli_query($conn, $sqli)) {
        return 1; 
    } else {
        echo $sqli;
        die();
    }
}


// paper_id paramiter in this function 
// function to get paper_id
// http://localhost/gitrepo/cis/set_serial_number.php?paper_id=2

// Function to decrement paper number
function Print_Paper($current_paper_id) {
    global $conn;
    
    // Get the current paper details
    $sql = "SELECT paper_id, paper_number, dell_paper FROM papers WHERE paper_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $current_paper_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $paper = $result->fetch_assoc();
        $paperNumber = $paper['paper_number'];
        $dellPaper = $paper['dell_paper'];
        
        // Check if we have papers to print
        if ($paperNumber > 0) {
            // Decrease paper number and increment dell_paper
            $paperNumber--;
            $dellPaper++;
            
            // Update the paper record in the database
            $updateSql = "UPDATE papers SET paper_number = ?, dell_paper = ?, updated_at = CURRENT_TIMESTAMP WHERE paper_id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("iii", $paperNumber, $dellPaper, $current_paper_id);
            $updateStmt->execute();
            
            echo "Printed paper for paper_id: $current_paper_id. Remaining papers: $paperNumber.\n";
        }
        
        // If paper_number is 0, move to the next paper_id
        if ($paperNumber == 0) {
            echo "Paper number is 0. Moving to the next paper_id.\n";
            
            // Get the next paper_id
            $nextSql = "SELECT paper_id FROM papers WHERE paper_id > ? ORDER BY paper_id ASC LIMIT 1";
            $nextStmt = $conn->prepare($nextSql);
            $nextStmt->bind_param("i", $current_paper_id);
            $nextStmt->execute();
            $nextResult = $nextStmt->get_result();
            
            if ($nextResult->num_rows > 0) {
                $nextPaper = $nextResult->fetch_assoc();
                $nextPaperId = $nextPaper['paper_id'];
                
                // Recursively call the function for the next paper_id
                Print_Paper($nextPaperId);
            } else {
                return 3;
                // echo "No more papers to print.\n";
            }
        }
    } else {
        return 4;
        // echo "Paper Seris not found plase Insert New Seris.\n";
    }
    
    $stmt->close();
    $conn->close();
}




// function Total_Request_Return(){
//     global $conn;
//     $sqli = "SELECT SUM(return_request) AS  total_return_request FROM `request` WHERE `return_request` = '1' AND `dell_request` = '0'";
//     if($sqli_query = mysqli_query($conn, $sqli)){
//         $row = mysqli_fetch_assoc($sqli_query);
//         $num_rows = $row['total_return_request'];
//         return $num_rows;

//     }else{
//             echo $sqli;
//         }

//   }
function Total_Paper(){
    global $conn;
    $sqli = "SELECT SUM(paper_number) AS  total_paper FROM `papers` WHERE `dell_paper` = 0";
    if($sqli_query = mysqli_query($conn, $sqli)){
        $row = mysqli_fetch_assoc($sqli_query);
        $num_rows = $row['total_paper'];
        return $num_rows;

    }else{
            echo $sqli;
        }


}


function Total_Request_Delete(){
    global $conn;
    // $sqli = "SELECT SUM(canceled_request) AS  total_request_canceled FROM `request` WHERE `canceled_request` = '1' AND `dell_request` = '1'";
    $sqli = "SELECT SUM(dell_request) AS  total_request_delete FROM `request` WHERE  `dell_request` = '1'";
    if($sqli_query = mysqli_query($conn, $sqli)){
        $row = mysqli_fetch_assoc($sqli_query);
        $num_rows = $row['total_request_delete'];
        return $num_rows;

    }else{
            echo $sqli;
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

    // Check user type
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 3) {
        // If user type is 3, fetch only their requests
        $user_id = $_SESSION['user_id']; // Assuming you have user_id in session
        $sqli = "SELECT * FROM `student_basic_info` bi, `student_cert_info` si, `request` r, `users` u 
                 WHERE bi.student_basic_info_id = si.student_basic_info_id 
                 AND si.std_cert_id = r.`std_cert_id` 
                 AND u.user_id = r.user_id 
                 AND r.dell_request = 0 
                 AND r.user_id = '$user_id' 
                 ORDER BY r.request_id DESC";
    } else {
        // Fetch all requests for other user types
        $sqli = "SELECT * FROM `student_basic_info` bi, `student_cert_info` si, `request` r, `users` u 
                 WHERE bi.student_basic_info_id = si.student_basic_info_id 
                 AND si.std_cert_id = r.`std_cert_id` 
                 AND u.user_id = r.user_id 
                 AND r.dell_request = 0 
                 ORDER BY r.request_id DESC";
    }

    if ($query = mysqli_query($conn, $sqli)) {
        return $query;
    } else {
        echo $sqli; // For debugging
    }
}




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


// get update data from cis database
function Student_Basic_Info($std_index){
    global $conn;
    $sqli = "SELECT * FROM `student_basic_info` WHERE `std_index` = '$std_index' AND `dell_std_basic_info` = '0'";
    if($sqli = mysqli_query($conn, $sqli)){

        $row = mysqli_fetch_array($sqli);
        return $row;

       }else{
        return 3;
       }
}

function Student_Cert_Info($student_basic_info_id){
    global $conn;
    $sqli = "SELECT * FROM `student_cert_info` WHERE `student_basic_info_id` = '$student_basic_info_id' AND `dell_std_cert_info` = '0' ";
    if($sqli = mysqli_query($conn, $sqli)){

        $row = mysqli_fetch_array($sqli);
        return $row;

       }else{
        return 3;
       }

}


      function student_profile_common_sql($std_index){
        global $sis_con;
            $student_profile_common_sql = "SELECT * FROM `student_profile_common` WHERE `stud_id` = '$std_index' " ;
        //   and `curr_sem` = 10 or 6
           if($student_profile_common_sql = mysqli_query($sis_con, $student_profile_common_sql)){

            $row = mysqli_fetch_array($student_profile_common_sql);
            return $row;

           }else{
            return 3;
           }


      }
    //   old function
//       function stud_course_mark_sql($std_index, $batch, $major, $grade){
//         global $sis_con;
// // add batch + faculty + major + index
//             $stud_course_mark_sql = "SELECT * FROM `stud_course_mark` WHERE `stud_id` = '$std_index' and `batch` = '$batch' and `major_code` = '$major' and `grade` = '$grade' " ;
//             if($stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql)){
//                 $row = mysqli_fetch_array($stud_course_mark_sql_query);
//                 return $row;
//             }else{
//                 echo $stud_course_mark_sql;
                
//             }
//       }

// function stud_course_mark_sql($std_index, $batch, $major) {
//     global $sis_con;

//     // Query to count the number of 'F' grades for the student
//     $stud_course_mark_sql = "SELECT COUNT(*) as f_count FROM `stud_course_mark` WHERE `stud_id` = '$std_index' AND `batch` = '$batch' AND `major_code` = '$major' AND `grade` = 'F'";

//     // Execute the query
//     if ($stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql)) {
//         $row = mysqli_fetch_array($stud_course_mark_sql_query);
//         $f_count = $row['f_count'];
//         return $f_count;

//     } else {
//         // Output the SQL error for debugging
//         echo "Error in query: " . mysqli_error($sis_con);
//         echo "SQL: " . $stud_course_mark_sql;
//     }
// }
// ********************************************** to display the number of F std have and the name of those F's**********************
function stud_course_mark_sql($std_index, $batch, $major, $faculty) {
    global $sis_con;

    // Query to get the course codes and count of 'F' grades for the student
    $stud_course_mark_sql = "SELECT course_code, semester, grade ,sub_grade1, sub_grade2, COUNT(*) as f_count FROM `stud_course_mark` WHERE `stud_id` = '$std_index' AND `batch` = '$batch' AND `major_code` = '$major' AND `faculty_code` = '$faculty' AND `grade` = 'F'  GROUP BY course_code, semester 
                         ORDER BY semester ASC";

    // Execute the query
    $f_grades = [];
    if ($stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql)) {
        while ($row = mysqli_fetch_array($stud_course_mark_sql_query)) {
            $f_grades[] = [
                'course_code' => $row['course_code'],
                'semester' => $row['semester'],
                'f_count' => $row['f_count'],
                'grade' => $row['grade'],
                'sub_grade1' => $row['sub_grade1'],
                'sub_grade2' => $row['sub_grade2']
            ];
        }
        return $f_grades;
         // Return the array of F grades
    } else {
        // Output the SQL error for debugging
        echo "Error in query: " . mysqli_error($sis_con);
        return []; // Return an empty array in case of an error
    }
}


// function stud_course_mark_sql($std_index, $batch, $major, $faculty) {
//     global $sis_con;

//     // Query to get the course codes and count of 'F' grades for the student
//     $stud_course_mark_sql = "SELECT course_code, COUNT(*) as f_count FROM `stud_course_mark`  WHERE `stud_id` = '$std_index' AND `batch` = '$batch' AND `major_code` = '$major' AND `grade` = 'F' GROUP BY course_code";

//     // Execute the query for F grades
//     $f_grades = [];
//     if ($stud_course_mark_sql_query = mysqli_query($sis_con, $stud_course_mark_sql)) {
//         while ($row = mysqli_fetch_array($stud_course_mark_sql_query)) {
//             $f_grades[] = [
//                 'course_code' => $row['course_code'],
//                 'f_count' => $row['f_count']
//             ];
//         }

//         $sub_grades_sql = "SELECT `sub_grade1`,`sub_grade2`,`batch`,`major_code`,`faculty_code` FROM `stud_course_mark` WHERE `stud_id` = '$std_index' AND `batch` = '$batch' AND `faculty_code` = '$faculty' and `major` = '$major' "; // Assuming one record per student
//         $sub_grades1 = [];
//         $sub_grades2 = [];
//         if ($sub_grades_query = mysqli_query($sis_con, $sub_grades_sql)) {
//             if ($row = mysqli_fetch_assoc($sub_grades_query)) {
//                 $sub_grades1['sub_grade1'] = $row['sub_grade1'];
//                 $sub_grades2['sub_grade2'] = $row['sub_grade2'];

//                 stud_course_mark_sql($std_index, $batch, $major, $faculty);
                
//             }
//         }


//     } else {
//         // Output the SQL error for debugging
//         echo "Error in query: " . mysqli_error($sis_con);
//     }
// }


    // get Bachelor cgpa and gpa
       function stud_transcript_sql($std_index, $current_sem){
        global $sis_con;
        // $stud_transcript_sql = "SELECT * FROM `stud_transcript_table` WHERE `stud_id` = '$std_index' AND `faculty_code` =  '$faculty' AND `major_code ` = '$major' AND `semester` = '$current_sem' " ;
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
        // let max batch of stud in  
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

function Grafuation_Date_Format($nudate) {
    // Create a DateTime object from the input date
    $dateTime = new DateTime($nudate);

    // Format the date as "d.m.Y" (day.month.year)
    return $dateTime->format('d.m.Y');
}
function Transcript_Date_Format($nudate) {
    // Create a DateTime object from the input date
    $dateTime = new DateTime($nudate);

    // Format the date as "d.m.Y" (day.month.year)
    return $dateTime->format('d/m/Y');
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
// Function to retrieve the course name based on the course code
function Get_Course_Name($code) {
    global $sis_con;
    $sqli = "SELECT * FROM `course_details` WHERE `course_code` = '$code' ";
    $query = mysqli_query($sis_con, $sqli);
    $row = mysqli_fetch_array($query);
    return $row['course_name'];
}


?>
