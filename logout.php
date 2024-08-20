
<?php
// include('includes/functions.php');
session_start();
if (isset($_SESSION['user_id'])){

    unset($_SESSION['user_id']);
    session_destroy();
    
}

if (isset($_SESSION['username'])){

    unset($_SESSION['username']);
    session_destroy();
}

if (isset($_SESSION['user_type'])){
    
    unset($_SESSION['user_type']);
    session_destroy();
}


// session_destroy();
header("location: index.php");

?> 