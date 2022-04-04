<?php include 'auth.php';?>
<?php include 'conn.php';?>

<?php 

$edit_id=@$_GET['edit'];
$query = "select * from news where news_id ='$edit_id' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

	// $e_id =  $row['m_id'];
	$e_topic =   $row['news_topic'];
	$e_description = $row['news_description'];
	$e_types = $row['news_types'];
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
                        <h1 class="h3 mb-0 text-gray-800">Edit News</h1>
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
                                            <label >News Topic</label>
                                            <input type="text" class="form-control"  name="n_topic1" value='<?php echo $e_topic ;?>'>
                                        </div>
                                        <div class="form-group">
                                            <label >News Description</label>
                                            <textarea class="form-control" rows="5" name="n_description1"><?php echo $e_description ;?></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label >News Type:</label>
                                        	<select name="n_type1" value="<?php echo $e_types;?>">
                                                        <option disabled selected>:<?php echo $e_types;?></option>
                                                        <?php
                                                        $query2="Select news_type From newsType";
                                                        $records=mysqli_query($conn,$query2);
                                                        while ($data = mysqli_fetch_array($records)){
                                                            echo "<option name='".$data['n_type1']."'>".$data['news_type']."</option>";
                                                        }
                                                        ?>
                                                     </select>
                                            </div>
											<div class="form-group">
                                            <input class="btn btn-success" type="submit" name="update" value="Edit News">
                                        	</div>
											<?php
												if(isset($_POST["update"]))
												{
													$n_topic =   $_POST['n_topic1'];
													$n_description  =  $_POST['n_description1'];
													$n_type = $_POST['n_type1'];

													// $query1="UPDATE INTO `news` (`news_id`, `news_topic`, `news_description`, `news_types`) VALUES (NULL, '$n_topic', '$n_description', '$n_type') where c_id='$edit_id' ";
													$query1= "UPDATE news SET news_topic='$n_topic', news_description='$n_description', news_types='$n_type' where news_id='$edit_id'";
													if(mysqli_query($conn,$query1)){
														echo "<script>window.open('news.php?updated=Record Has Been Updated','_self')</script>";
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


