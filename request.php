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
        <th  class="center-align"># Number</th>
        <th  class="center-align">Request From</th>
        <th  class="center-align">Student Full Name</th>
        <th  class="center-align">Student Index</th>
        <th  class="center-align">Statuse</th>
        <th  class="center-align">Action</th>
        <!-- <th>Cancel</th> -->
        <!-- <th>Upload Document</th> -->

    </tr>
</thead>
    
    <?php
    $i = 1;
    while($row = mysqli_fetch_array($get_requests)){ ?>
    <tbody>
        <tr>
            <td class="center-align"><?php
            echo $i++; 
            ?></td>
             <td class="center-align"><?php
             echo $row['user_full_name']; 
             ?></td>
             <td class="center-align"><?php
              echo $row['std_full_name_en']; 
             ?></td>
               <td class="center-align">
            <?php
              echo $row['std_index']; 
             ?></td>

            <td class="center-align">
            <a  class="btn btn-primary"  class="btn btn-info btn-sm" href="#">
           </i>Printed</a>
            </td>

            <td class="center-align">
                <a  class="btn btn-info"  class="btn btn-info btn-sm" href="request_process.php?request_id=<?php echo base64_encode($row['request_id']); ?>">
                    <i class="fas fa-eye"></i> View</a>
                    &nbsp;&nbsp;
                    <!-- <button  class="btn btn-info"  class="btn btn-info btn-sm" href="#"> -->
                    <button href="request.php?reject_id=<?php  echo base64_encode($row['user_id']);  ?>"   class="btn btn-success btn-sm"  target="_self">
                    <ion-icon name="cloud-upload-outline"></ion-icon> Upload</button>
            </td>
            
            
        </tr>
        <style>
            .center-align {
                text-align: center;
            }
        </style>
    </tbody>
 <?php 
} 
?> 
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=". bd-example-modal-lg">Large modal</button> -->

   
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

<!--  -->

</div>

</div>

</div>
<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
Launch Extra Large Modal
</button> -->
<!--  -->

</div>

</div>

</section>
<!--  -->

</div>

<?php
include("include/footer.php");

?>