<?php

$page = "manage_paper";
include("include/header.php");

$get_paper = Get_paper();

?>


<?php

if (isset($_POST['insert'])) {

    $paper_number = $_POST['paper_number'];
    $serial_number_start = $_POST['serial_number_start'];
    $serial_number_end = $_POST['serial_number_end'];

    $insert_paper = Insert_paper($paper_number, $serial_number_start, $serial_number_end);


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
                        <li class="breadcrumb-item active">Set Serial Number</li>
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

                    <form action="set_serial_number.php" method="POST">

                        <div class="card card-info">
                            <div class="card-header">
                                <!-- <h3 class="card-title">Inserting</h3> -->
                                <h4>Set New Serial and Paper</h4>

                            </div>
                            <div class="card-body">
                                <?PHP
                                if (isset($_POST["insert"])) {


                                    if ($insert_paper == 1) {
                                        echo $alert = alerts(1, "Total Paper Added is " . $paper_number . " With serial number Start with FU" . $serial_number_start);
                                    }
                                    if ($insert_paper == 3) {
                                        echo $alert = alerts(4, "Mismatch! The number of serial numbers does not match the number of papers.");
                                    }

                                }


                                ?>
                                <label for="">New Paper</label>

                                <div class="input-group input-group mb-3">

                                    <input type="number" name="paper_number" class="form-control form-contro"
                                        placeholder="Number of Paper" required>&ensp;&ensp;


                                    <input type="number" name="serial_number_start" class="form-control form-control"
                                        placeholder="Serial number Start with FU" required> &ensp;&ensp;

                                    <input type="number" name="serial_number_end" class="form-control form-control"
                                        placeholder="Serial number END with" required>&ensp;&ensp;

                                    <span class="input-group-append">

                                        <button type="submit" name="insert"
                                            class="btn btn-info btn-flat">Insert</button>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end -->

                    <!-- table start-->
                    <section class="content">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">All Paper</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Total Paper</th>
                                                        <th>Serial Start</th>
                                                        <th>Serial End</th>
                                                        <th>Created At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $i = 1;
                                                        while ($row = mysqli_fetch_array($get_paper)) { ?>

                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $row['paper_number']; ?></td>
                                                            <td><?php echo $row['serial_number_start']; ?></td>
                                                            <td><?php echo $row['serial_number_end']; ?></td>
                                                            <td><?php echo $row['created_at']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
    </section>
    <!-- table end-->
</div>
</div>


</div>




<?php
include("include/footer.php");
?>