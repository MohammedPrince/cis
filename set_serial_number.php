<?php
include("include/header.php");

$get_paper = Get_paper();

?>


<?php

if(isset($_POST['insert'])){

    $paper_number = $_POST['paper_number'];
    $serial_number_start  = $_POST['serial_number_start'];
    $serial_number_end  = $_POST['serial_number_end'];

    $insert_paper = Insert_paper($paper_number,$serial_number_start, $serial_number_end);

    // if($insert_paper == 1){
    // echo $alert = alerts(1,"Total Paper Added is " . $paper_number . " With serial number Start with FU" . $serial_number_start);
    // }
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
            <div class="row justify-content-center">
                <div class="col-11">
                    
                    <form action="set_serial_number.php" method="POST">
                        
                        <div class="card card-info">
                            <div class="card-header">
                                <!-- <h3 class="card-title">Inserting</h3> -->
                    <h4>Set New Serial and Paper</h4>

                            </div>
                            <div class="card-body">
                                <?PHP
                                if(isset($_POST["insert"])){
                                    
                                if($insert_paper == 1){
                                    echo $alert = alerts(1,"Total Paper Added is " . $paper_number . " With serial number Start with FU" . $serial_number_start);
                                    }
                                    if($insert_paper == 2){
                                        echo $alert = alerts(3,"Something wrong plase Relod the page");
                                        }
                                    }
                            
                                ?>
                                <label for="">New Paper</label>
                                
                                <div class="input-group input-group mb-3">
                                    
                                    <input type="number" name="paper_number" class="form-control form-contro" placeholder="please insert number of paper..." required>&ensp;&ensp;
                                    
                                    
                                    <input type="number" name="serial_number_start" class="form-control form-control" placeholder="Serial number Start with FU..."required> &ensp;&ensp;
                                    
                                    <input type="number" name="serial_number_end" class="form-control form-control" placeholder="Serial number END with...." required>&ensp;&ensp;

                                    <span class="input-group-append">
                                        
                                        <button type="submit" name="insert" class="btn btn-info btn-flat">Inesrting</button>
                                        
                                    </span>
                                </div>
                                
                                
                            </div>
                        </div>
                    </form>
                    <!-- end -->
                </div>
                
            </div>
            

<!-- table start -->
<div class="card">
<div class="card-header">
<h3 class="card-title">Paper and Serial</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Total Paper</th>
<th>Serial Start</th>
<th>Serial End</th>
<th>Created At</th>
</tr>
</thead>
<?php 
$i =1;
while($row = mysqli_fetch_array($get_paper)){ ?>

<tbody>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['paper_number']; ?></td>
        <td><?php echo 'FU ' . $row['serial_number_start']; ?></td>
        <td><?php echo $row['serial_number_end']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
     </tr>
</tbody>
 <?php } ?>

</table>
</div>

</section>
</div>
</div>
<?php
include("include/footer.php");
?>

