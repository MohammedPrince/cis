<?php
$page = "manage_users";
include("include/header.php");

$get_users = Get_users();


?>
<?php
if (isset($_POST['adduser'])) {
    $user_full_name = $_POST['user_full_name'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $adduser = Add_user($user_full_name, $username, $user_email, $password, $user_type);
}
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
                        <li class="breadcrumb-item  ">Manage Users</li>
                    </ol>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- end of nave link active -->

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <form action="manage_users.php" method="POST">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 title='Add a new user' class="card-title">Add User</h3>
                            </div>
                            <!-- start User Fullname-->
                            <div class="card-body">
                                <?php
                                if (isset($_POST['adduser'])) {
                                    if ($adduser == 1) {
                                        // echo $alert = alerts(1,"User Added Done");
                                        echo $alert = alerts(1, "User " . $user_full_name . " Add successfully");
                                    }

                                    if ($adduser == 2) {
                                        echo $alert = alerts(3, "User Not Save or User is already exist");
                                    }
                                }

                                if (isset($_GET['delet_id'])) {
                                    $delet_id = $_GET['delet_id'];
                                    $delet_user = Delet_user($delet_id);
                                    if ($delet_user == 1) {
                                        echo $alert = alerts(4, 'User deleted successfully');
                                    }
                                }
                                ?>
                                <label for="">User Full Name
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                    &ensp;&ensp; &ensp;&ensp; &ensp;Username</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="user_full_name" class="form-control"
                                            placeholder="User Fullname..." required>
                                    </div>

                                    <div class="col-4">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="username..." required>
                                    </div>
                                </div>
                                <!-- User Fullname end -->


                                <!-- start Email-->
                                <br><br>
                                <label for="">User Email
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                    &ensp; &ensp;&ensp;&ensp; &ensp;&ensp; &ensp;&ensp;&ensp;&ensp; User Type</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="email" name="user_email" class="form-control"
                                            placeholder="name@fu.edu.sd..." required>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="user_type" required="required">
                                            <option value="">Chose User Role...</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">CertificateAdmin</option>
                                            <option value="3">Certificate User</option>
                                        </select>
                                        <br>
                                    </div>

                                </div>
                                <!-- Email end -->

                                <!-- start Password-->
                                <label for="">Password</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="password..." required>
                                    </div>
                                    &ensp;&ensp;&ensp;
                                    <div class="col-4 float-right">
                                        <button type="submit" name="adduser" class="btn btn-info">Add User</button>
                                        <!-- <button type="submit" name="submit2" class="btn btn-default float-right">Cancel</button> -->
                                    </div>
                                </div>

                                <!-- start Staff ID-->
                                <!-- <div class="card-body">
                                <label for="">Staff ID</label>
                                <div class="col-6">
                                    <input type="number" name="user_staff_id" class="form-control" placeholder="Staff ID..." required>
                                </div>
                            </div> -->
                                <!-- Staff IDend -->



                                <!-- dev end of card of card and the last line in left side left -->
                            </div>
                            <!-- end of div of left side row -->
                    </form>
                </div>

                <!-- table start -->
                <section class="content-header">
                    <div class="container-fluid"></div>
                    <div class="card">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 title='Manage all User' class="card-title">Manage All Users</h3>

                            </div>
                            <div class="card-tools">
                                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
                            </div>
                        </div>




                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>User Type</th>
                                        <th>User Email</th>
                                        <th>Added Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_array($get_users)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['user_full_name']; ?></td>
                                            <td><?php
                                            if ($row['user_type'] == 1) {
                                                echo "Super Admin";
                                            }
                                            if ($row['user_type'] == 2) {
                                                echo "Certificate Admin";
                                            }
                                            if ($row['user_type'] == 3) {
                                                echo "Certificate User";
                                            }
                                            ?></td>
                                            <td><?php echo $row['user_email']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <!-- <td><a class="btn btn-info btn-sm" href="#" class="btn btn-outline btn-info" target="_self">  -->
                                            <!-- <i class="fas fa-pencil-alt "></i> Update</a></td> -->
                                            <td><a class="btn btn-danger btn-sm"
                                                    href="manage_users.php?delet_id=<?php echo base64_encode($row['user_id']); ?>"
                                                    onClick="return confirm('Are you sure you want  delete this User ?')"
                                                    class="btn btn-outline btn-danger" target="_self">
                                                    <i class="fas fa-trash "></i> Delete</a></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
            </div>

        </div>
</div>
<!-- table end  -->
</section>






</section>
</div>

<?php
include("include/footer.php");
?>