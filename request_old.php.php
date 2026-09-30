<?php
$page = "request";
include("include/header.php");

$get_users = Get_users();
$get_requests = Get_Requests();


?>


<?php
if (isset($_POST['adduser'])) {
    $user_full_name = $_POST['user_full_name'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];
    // $user_staff_id =  $_POST['user_staff_id'];
    $user_type = $_POST['user_type'];

    $adduser = Add_user($user_full_name, $username, $user_email, $password, $user_type);
}
if (isset($_GET['delet_id'])) {
    $delet_id = $_GET['delet_id'];
    $delet_request = Delete_Requests($delet_id);
    if ($delet_request == 1) {
        echo $alert = alerts(4, 'Request deleted successfully');
    }
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
                        <div class="card-header">
                            <h3 class="card-title">All Requests</h3>
                        </div>
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center-align"># Number</th>
                                        <?php
                                        // Change header based on user type
                                        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 3) {
                                            echo '<th >My Requests</th>
                <th class="center-align">Student Full Name</th>
                <th class="center-align">Student Index</th>
                <th class="center-align">Type</th>
                <th class="center-align">Program Type</th>
                
                <th class="center-align">Action</th>
            
            ';
                                        }
                                        // <th class="center-align">Request Status</th>
                                        else {
                                            echo '<th class="center-align">Request From</th>
                    <th class="center-align">Student Full Name</th>
                    <th class="center-align">Student Index</th>
                    <th class="center-align">Type</th>
                    <th class="center-align">Program Type</th>
                    
                    <th class="center-align">Action</th>
                ';
                                        }
                                        ?>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $i = 1;
                                    while ($row = mysqli_fetch_array($get_requests)) { ?>
                                        <tr>
                                            <td class="center-align"><?php echo $i++; ?></td>

                                            <td class="center-align"><?php echo $row['user_full_name']; ?></td>

                                            <td class="center-align"><?php echo $row['std_full_name_en']; ?></td>
                                            <td class="center-align"><?php echo $row['std_index']; ?></td>
                                            <td class="center-align">
                                                <?php
                                                if ($row['certificate_type'] == "1") {
                                                    echo "Graduation";
                                                } elseif ($row['certificate_type'] == "2") {
                                                    echo "Transcript";
                                                } elseif ($row['certificate_type'] == "3") {
                                                    echo "Graduation & Transcript";
                                                }
                                                ?>
                                            </td>
                                            <td class="center-align">
                                                <?php
                                                if ($row['program'] == 1) {
                                                    echo "Bachelor";
                                                } elseif ($row['program'] == "2") {
                                                    echo "Diploma";
                                                } elseif ($row['program'] == "3") {
                                                    echo "Master";
                                                }
                                                ?>
                                                <!-- </td>

                <td> -->

                                            </td>

                                            <td class="center-align">
                                                <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 3) { ?>
                                                    <a class="btn btn-info btn-sm"
                                                        href="request_process.php?request_id=<?php echo base64_encode($row['request_id']); ?>">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="btn btn-info btn-sm"
                                                        href="request_process.php?request_id=<?php echo base64_encode($row['request_id']); ?>">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="request.php?delet_id=<?php echo base64_encode($row['request_id']); ?>"
                                                        onClick="return confirm('Are you sure you want to delete this Request?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                <?php } ?>
                                            </td>


                                        </tr>
                                    <?php } ?>
                                </tbody>
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