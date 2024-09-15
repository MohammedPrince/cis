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

        <!-- table start-->
        <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card card-info">
                    <div class="card-header"><h3 class="card-title">All Requests</h3></div>
                    <div class="card-body">

                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  class="center-align"># Number</th>
                        <th  class="center-align">Request From</th>
                        <th  class="center-align">Student Full Name</th>
                        <th  class="center-align">Student Index</th>
                        <th  class="center-align">Statuse</th>
                        <th  class="center-align">Action</th>
                        <th  class="center-align">Files</th>
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
            </td>

            <!-- if condyion if the request Statuse hase ben done and Printed this form will be allow nither that
              -->
            <form action="request.php"  method="POST" enctype="multipart/form-data">
            <td>       
                    <input type="file" name="doc"  value="">
                   <button class="btn btn-success btn-sm"><ion-icon name="cloud-upload-outline"></ion-icon> Upload</button> 
                </td>

            </form>
            
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
            </table>
        </div>
    </div>
</div>
</div>
</div>

</div>

<?php
include("include/footer.php");

?>