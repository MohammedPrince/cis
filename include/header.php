<?php   include("functions.php");          ?>


<?php

if(!isset($_SESSION["user_id"])){

    header("location: ./index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CIS</title>

        <link rel="icon" type="image" href="include/dist/img/fu.png">

        
        <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
        
        <link rel="stylesheet" href="include/plugins/fontawesome-free/css/all.min.css">
        
        <link rel="stylesheet" href="include/../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <link rel="stylesheet" href="include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        
        <link rel="stylesheet" href="include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        
        <link rel="stylesheet" href="include/plugins/jqvmap/jqvmap.min.css">
        
        <link rel="stylesheet" href="include/dist/css/adminlte.min2167.css?v=3.2.0">
        
        <link rel="stylesheet" href="include/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        
        <link rel="stylesheet" href="include/plugins/daterangepicker/daterangepicker.css">
        
        <link rel="stylesheet" href="include/plugins/summernote/summernote-bs4.min.css">
        <!-- datatable -->
        <link rel="stylesheet" href="include/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="include/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="include/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li> -->
                    
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="home.php" class="nav-link"><ion-icon name="home-outline"></ion-icon> &ensp; Home</a>
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="./new_certificate.php" class="nav-link"><ion-icon name="document-outline"></ion-icon> &ensp; New Certificate</a>
                    </li>
<!-- <ion-icon name="cloud-upload-outline"></ion-icon> -->
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="./request.php" class="nav-link"><ion-icon name="git-compare-outline"></ion-icon> &ensp; All Requests</a>
                        
                    </li>

                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="./profile.php" class="nav-link"><ion-icon name="person-circle-outline"></ion-icon> &ensp; Profile</a>
                        
                    </li>
                </ul>
                
                <ul class="navbar-nav ml-auto">
                    
<!-- <li class="nav-item">
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
    <form class="form-inline">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </form>
</div>
</li> -->


<!-- setting -->
<!-- <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class=""><ion-icon name="options-outline"></ion-icon></i>
        <span class="badge badge-warning navbar-badge">15</span>
    </a>

    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li> -->
<!-- setting -->


    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>

</ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="./home.php" class="brand-link">
        <!-- <img src="include/dist/img/fu_logo.png" alt="Futuer University Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <a href="#" class="h5">Certificat Information System</a> -->
        
        <span class="h6" >Cirtificat Information System</span>
    </a>
    
    <div class="sidebar">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="include/dist/img/fu.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> 
                    
                    <?php
// Check if the session variable exists and display it
if (isset($_SESSION)) {
    // echo $_SESSION['id'];
            echo $_SESSION['username'];
            // Optionally, unset the session variable if no longer needed
            // unset($_SESSION['message']);
        } else {
            echo 'No session message found.';
        }
        ?>


</a>
</div>
</div>

<!-- <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div> -->

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <!-- <li class="nav-item menu-open"> -->
        <li class="nav-item active">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
</a>
<ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="home.php" class="nav-link">
            <i class="nav-icon">
                <ion-icon name="analytics-outline"></ion-icon>
            </i>
            <p>Dashboard </p>
        </a>
    </li>
    
    
</ul>
</li>


<?php
if(isset($_SESSION['user_type']) &&  ($_SESSION['user_type'])== 1 || ($_SESSION['user_type'])== 2){
?>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon">
        <ion-icon name="copy-outline" ></ion-icon>   
        </i>
        <p>
            Manage Paper
            <i class="fas fa-angle-left right"></i>
            <!-- <span class="badge badge-info right">6</span> -->
        </p>
    </a>
    <ul class="nav nav-treeview">
        <!-- start of pages -->
        <li class="nav-item">
            <a href="set_serial_number.php" class="nav-link">
            <ion-icon name="keypad-outline"></ion-icon>
                <p> &ensp;&ensp; Set Serial Number</p>
            </a>
        </li>
      <!-- <li class="nav-item">
          <a href="upload_document.php" class="nav-link">
          <ion-icon name="cloud-upload-outline"></ion-icon>
              <p> &ensp;&ensp; Upload a document</p>
            </a>
        </li> -->
    </ul>
</li>
<?php } ?> 


<li class="nav-item">
    <a href="#" class="nav-link">
    <ion-icon name="git-compare-outline"></ion-icon>
        <p>
            Requests
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="./request.php" class="nav-link">
            <!-- <ion-icon name="reorder-four-outline"></ion-icon> -->
            <ion-icon name="git-pull-request-outline"></ion-icon>
                <p> &ensp;&ensp; All Requests</p>
            </a>
        </li>
    </ul>
</li> 



<li class="nav-item">
    <a href="header.php" class="nav-link">
        <i class="nav-icon">
        <ion-icon name="print-outline"></ion-icon>
        </i>
        <p>
            Print Certificate
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    
    <ul class="nav nav-treeview">
        <!--  -->
        <li class="nav-item">
            <a href="new_certificate.php" class="nav-link">
            <ion-icon name="document-outline"></ion-icon>
                <p> &ensp;&ensp; New Cirtificat</p>
            </a>
        </li>
        <!--  -->
        

</ul>


<!-- Here -->
<?php
if(isset($_SESSION['user_type']) &&  ($_SESSION['user_type'])== 1 || ($_SESSION['user_type'])== 2){
?>
<li class="nav-item">
    <a href="#" class="nav-link">
    
        <i class="nav-icon">
        <ion-icon name="person-add-outline"></ion-icon>
        </i>
        <p>
            Manage Users
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="manage_users.php" class="nav-link">
            <ion-icon name="people-outline"></ion-icon>
                
                <p> &ensp;&ensp; All Users</p>
            </a>
        </li>
    </ul>
</li>
<?php } ?>  
<!-- there -->


<!-- <a href="#" class="btn btn-sm btn-primary">
<i class="fas fa-user"></i> View Profile
</a> -->
<!-- Here -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon">
            <ion-icon name="settings-outline"></ion-icon>
        </i>
        <p>&ensp;Settings<i class="fas fa-angle-left right"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="profile.php" class="nav-link">
            <ion-icon name="people-outline"></ion-icon>
                
                <p> &ensp;&ensp; View Profile</p>
            </a>
        </li>
    </ul>

    
        <li class="nav-item">
            <a href="logout.php" class="nav-link">
            <ion-icon name="log-out-outline"></ion-icon>
                
                <p> &ensp;&ensp; Log Out</p>
            </a>
        </li>
   

    </ul>
</li>
<!-- there -->




</aside>

