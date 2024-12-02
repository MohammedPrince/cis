
<?php
$page = "home";
include("include/header.php");


?>

<?php 

$total_request = Total_Request();
$total_paper = Total_Paper();
$total_request_delete = Total_Request_Delete();
// $total_request_return = Total_Request_Return();

// http://localhost/gitrepo/cis/set_serial_number.php?paper_id=2
// $current_paper_id = "";
// $current_paper_id = Print_Paper($current_paper_id);

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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- end of nave link active -->


<section class="content">
<div class="container-fluid">

<div class="row justify-content-center">
<div class="col-lg-3 col-4">

<div class="small-box bg-info">
<div class="inner">
<h3><?php if(isset($total_paper)) echo $total_paper; else echo "" ;?></h3>
<p>Total Reminded Paper</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>

</div>
</div>

<div class="col-lg-2 col-4">

<div class="small-box bg-success">
<div class="inner">
<h3>13</sup></h3>
<p>Total Printed</p>

</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
</div>
</div>

<!-- <div class="col-lg-2 col-8"> -->

<!-- <div class="small-box bg-warning">
<div class="inner"> -->
<h3><?php //if(isset($total_request_return)) echo $total_request_return; else echo "" ;?></h3>
<!-- <p>Total Request Return</p> -->
<!-- </div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div> -->
<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
<!-- </div> -->
<!-- </div> -->

<!-- <div class="col-lg-2 col-4">
<div class="small-box bg-green">
<div class="inner">
<h3>65</h3>
<p>Request Inprogress</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div> -->


<!--  -->
<div class="col-lg-2 col-4">
<div class="small-box bg-warning">
<!-- <div class="small-box bg-secondary"> -->
<div class="inner">
<h3 >
   <?php if(isset($total_request)) echo $total_request; else echo "" ;?>
</h3>
<p>Total Request Inprogress</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
</div>
</div>

<!--  -->
<div class="col-lg-3 col-4">
<div class="small-box bg-danger">
<div class="inner">
<h3><?php if(isset($total_request_delete)) echo $total_request_delete; else echo "" ;?></h3>
<p>Total Request Delete</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
</div>
</div>

<!--  -->







</div>
</div>
</div>
</section>

</div>



<?php

include("include/footer.php");

?>