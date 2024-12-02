<?php
$page = "settings";
include("include/header.php");

?>

<?php 
    if(isset($_POST['Update_user_info'])){
        $updated_password = $_POST['password'];

        $update_user_info = Update_user_info($updated_password);
    }
?>
<!--  -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-6">
                <div class="col-sm-6">
                    <!-- <h1>Profile</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-md-12">
                    
        <div class="card card-info ">
        <div class="card-header">
            <h3 class="card-title">Profile Information</h3>
        </div>


        
        <div class="card-body box-profile">
        <?php
        if(isset($_POST['Update_user_info'])){
            if ($update_user_info == 1){
                // echo $alert = alerts(1,"User Added Done");
                echo $alert = alerts(1,"Password Change  successfully");
            }
        }
        ?>
            <div class="text-center">
                <img width="100" height="100" src="include/dist/img/fu.png" alt="User profile picture">
             </div>
             <h3 class="profile-username text-center">
            <?php
            if (isset($_SESSION)) {
                echo $_SESSION['user_full_name'];
            } else {
                echo 'No session message found.';
            }
            ?>
            </h3>
            <p class="text-muted text-center">Joined <?php if (isset($_SESSION)) {
                echo $_SESSION["created_at"];
                } ?>
                </p>
                
                <p class="text-muted text-center">
                    <?php
                    if (isset($_SESSION)) {
                        if ($_SESSION['user_type']==1) {
                            echo "Super Admin";
                        }if($_SESSION['user_type']==2) {
                            echo "Admin";
                        }if($_SESSION['user_type']== 3) {
                            echo "User";
                        }
                    }
                    ?>
                </p>

        
<form action="profile.php" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <?php
            if (isset($_SESSION)) {
                echo "<input title='Current User Email' type='email' class='form-control' id='exampleInputEmail1' disabled value=' " . $_SESSION['user_email'] . "'> ";}?>
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">Current Password</label>
            <?php
            if (isset($_SESSION)) {
                echo "<input title='Current User Password' type='password' class='form-control' id='exampleInputPassword1' disabled value=' placeholder='Password'> ";}?>
         </div>
         
         <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input title="Enter User Password" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
         </div>
        </div>
       
        <button type="submit" name="Update_user_info" class="btn btn-info btn-block">Update</button>

    </form>
</div>
</div>
</section>
</div>

<?php
    include("include/footer.php");
?>