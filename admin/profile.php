<?php include 'auth.php';?>
 <?php include 'conn.php';?>

 <?php 

$edit_id=@$_GET['edit'];
$query = "select * from userProfile where user_ids ='$edit_id' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

    $e_id =  $row['user_ids'];  
	$e_bio = $row['user_bio'];
	$e_interest = $row['user_interest'];
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php';?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'topbar.php';?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
                    </div>

                    <!-- Content Row -->
                  

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div>
                                
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label >User Bio</label>
                                            <textarea class="form-control" rows="5" name="n_bio1"><?php echo $e_bio ;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label >User interest</label>
                                            <textarea class="form-control" rows="2" name="n_interest1"><?php echo $e_interest ;?></textarea>
                                        </div>
                                        <div class="form-group">
                                        <input class="btn btn-success" type="submit" name="update" value="Edit Bio">
                                        </div>
                                         <?php
												if(isset($_POST["update"]))
												{
													$n_bio  =  $_POST['n_bio1'];
													$n_interest = $_POST['n_interest1'];
                                                    if($e_id == NULL){
                                                        $query1= "INSERT INTO `userProfile`(`user_ids`, `user_bio`, `user_interest`) VALUES ('$edit_id','$n_bio','$n_interest')";
                                                    }
                                                    else{
													// $query1="UPDATE INTO `news` (`news_id`, `news_topic`, `news_description`, `news_types`) VALUES (NULL, '$n_topic', '$n_description', '$n_type') where c_id='$edit_id' ";
													$query1= "UPDATE userProfile SET user_bio='$n_bio', user_interest='$n_interest' where user_ids='$e_id'";
                                                    }
                                                    if(mysqli_query($conn,$query1)){
														echo "<script>window.open('index.php?updated=Record Has Been Updated','_self')</script>";
                                                        echo $query1;
													}
													else{
														echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>Error while updating</div>";
													echo $query1;
													}
												}

											?> 
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                

                </div>
                <!-- /.container-fluid -->

            </div>
<?php include 'footer.php';?>
</body>

</html>


