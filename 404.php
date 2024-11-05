<?php 

include("include/header.php");
?>



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
                            <li class="breadcrumb-item active">404 Error Page</li>
                        </ol>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- end of nave link active -->
<style>
    

.pragraph{
    font-family:'Times New Roman', Times, serif;
    font-size: 37px;
    text-align: center;
    }
   
    .image{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 60%;    
     height: auto;
    }
</style>
     
         <p class="pragraph" >OOPS! Request Not Found.
            <a href="request.php" >Back to Requests</a>       
        <div class="container">
            <img class="image" src="./include/dist/img/404looking_.png" alt="404 Not Found">
        </div>



<?php
include("include/footer.php");
?>