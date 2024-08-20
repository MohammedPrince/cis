<?php
include("include/header.php");

$get_users = Get_users();
$get_requests = Get_Requests();

?>


<?php
    if(isset($_POST['adduser'])){
        $user_full_name = $_POST['user_full_name'];
        $username = $_POST['username'];
        $user_email =  $_POST['user_email'];
        $password =  $_POST['password'];
        // $user_staff_id =  $_POST['user_staff_id'];
        $user_type =  $_POST['user_type'];

        $adduser = Add_user($user_full_name,$username,$user_email,$password,$user_type);
         }                 
 ?>
<div class="content-wrapper">


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">All Requests</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!--  -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">All Requests</h3>
</div>



<div class="card">
<div class="card-header">
<!-- <h3 class="card-title">DataTable with default features</h3> -->
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
    <tr>
        <th># Number</th>
        <th>Request From</th>
        <th>Student Name</th>
        <th>Student Index</th>
        <th>Action</th>
        <!-- <th>Cancel</th> -->
        <!-- <th>Upload Document</th> -->
    </tr>
</thead>
    
    <?php
    $i = 1;
    while($row = mysqli_fetch_array($get_requests)){ ?>
    <tbody>
        <tr>
            <td><?php
            echo $i++; 
            ?></td>
             <td><?php
             echo $row['user_full_name']; 
             ?></td>
             <td><?php
              echo $row['std_full_name_en']; 
             ?></td>
               <td>
            <?php
              echo $row['std_index']; 
             ?></td>

            <td><a data-toggle="modal" data-target="#modal-xl" class="btn btn-info btn-sm" href="#"  >
            <i class="fas fa-eye"></i> View</a></td>
            
        </tr>
    </tbody>
 <?php 
} 
?> 


   
<!-- <tfoot>
<tr>
<th>Rendering engine</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot> -->
</table>
</div>

</div>

</div>

</div>

</div>

</section>
<!--  -->

</div>

<?php
include("include/footer.php");

?>