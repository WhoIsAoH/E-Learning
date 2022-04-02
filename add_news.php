<?php include 'conn.php';?>
<?php
if(isset($_POST["update"]))
   {
    $n_topic =   $_POST['n_topic1'];
    $n_description  =  $_POST['n_description1'];
    $n_type = $_POST['n_type1'];

    $query1="INSERT INTO `news` (`news_topic`, `news_description`, `news_types`) VALUES ('$n_topic', '$n_description', '$n_type')";
    
    if(mysqli_query($conn,$query1))
	{
	   echo "<script>window.open('news.php?updated=Record Has Been Updated','_self')</script>";
	}
	else{
		echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
	echo $query1;
	}
}

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
                        <h1 class="h3 mb-0 text-gray-800">Add news</h1>
                    </div>

                    <!-- Content Row -->
                  

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <!-- <div class="card shadow mb-4"> -->
                        
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                    <form method="post" action="">
										<div class="form-group">
											<label>News Topic</label>
											<input type="text" class="form-control"  placeholder="News Topic" name="n_topic1">
										</div>
										<div class="form-group">
											<label >News Description</label>
											<textarea class="form-control"  rows="5" placeholder="News Description" name="n_description1"></textarea>
										</div>
										<div class="form-group">
                                        <label >News Type:</label>
										<select name="n_type1">
                                                        <option disabled selected>Select</option>
                                                        <?php
                                                        $query2="Select news_type_name From resourceType";
                                                        $records=mysqli_query($conn,$query2);
                                                        while ($data = mysqli_fetch_array($records)){
                                                            echo "<option name='".$data['n_type1']."'>".$data['resource_type_name']."</option>";
                                                        }
                                                        ?>
                                                     </select>
											</div>
										<div class="form-group">
											<input class="btn btn-success" type="submit" name="update" value="Add New">
										</div>
										</form>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>

                    <!-- Content Row -->
                

                </div>
                <!-- /.container-fluid -->

            </div>
<?php include 'footer.php';?>
</body>

</html>