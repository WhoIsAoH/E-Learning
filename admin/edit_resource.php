<?php include 'auth.php';?>
<?php include 'conn.php';?>

<?php 

$edit_id=@$_GET['edit'];
$query = "select * from resource where resource_id ='$edit_id' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

    $e_name =   $row['resource_name'];
    $e_origin =   $row['resource_origin'];
    $e_description  =  $row['resource_description'];
    $e_file = $row['resource_file_name'];
    $e_type = $row['resource_type'];
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Resource</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-10 col-lg-8">
                            <div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                    <form method="post" action="" enctype="multipart/form-data">
										<div class="form-group">
											<label>Resource Name</label>
											<input type="text" class="form-control"  name="n_name1" value='<?php echo $e_name;?>' >
										</div>
                                        <!-- <div class="form-group">
											<label>Resource Origin</label>
											<input type="text" class="form-control"  name="n_origin1" value="<?php echo $e_origin;?>">
										</div> -->
										<div class="form-group">
											<label >Resource Description</label>
											<textarea class="form-control"  rows="5" name="n_description1"><?php echo $e_description;?></textarea>
										</div>
                                        <div class="form-group">
                                            <label >Upload File</label>
                                            <input type="file" class="form-control-file" name="file" value="<?php echo $e_file;?>" >
                                        </div>
										<div class="form-group">
                                            <label >News Type:</label>
										    <select name="n_type1" value="<?php echo $e_types;?>">
                                                        <option disabled selected>:<?php echo $e_type;?></option>
                                                        <?php
                                                        $query2="Select resource_type_name From resourceType";
                                                        $records=mysqli_query($conn,$query2);
                                                        while ($data = mysqli_fetch_array($records)){
                                                            echo "<option name='".$data['n_type1']."'>".$data['resource_type_name']."</option>";
                                                        }
                                                        ?>
                                                     </select>
										</div>
										<div class="form-group">
											<input class="btn btn-success" type="submit" name="submit" value="Edit Resource">
										</div>
                                        <?php
                                            if(isset($_POST["submit"]))
                                            {
                                             $n_name =   $_POST['n_name1'];
                                             $n_origin =   $_POST['n_origin1'];
                                             $n_description  =  $_POST['n_description1'];
                                             $n_type = $_POST['n_type1'];
                                             
                                             $file= $_FILES['file'];
                                             $fileName= $file['name'];
                                             $fileTmpName = $_FILES['file']['tmp_name'];
                                             
                                             // $fileExt = explode('.',$filename);
                                             // $fileActualExt = strtolower(end($fileExt));
                                             // $allowed = array('jpg','jpeg','png','pdf');
                                         
                                             // $fileNameNew = $n_name.".".$fileActualExt;
                                         
                                             $fileDestination = '../uploads/'.$fileName;
                                             move_uploaded_file($fileTmpName, $fileDestination);
                                             header("location: resource.php");
                                             $query1= "UPDATE resource set resource_name='$n_name' ,resource_origin='$fileDestination',resource_description='$n_description',resource_file_name='$fileName',resource_type='$n_type' where resource_id='$edit_id'";
                                             if(mysqli_query($conn,$query1))
                                             {
                                                echo "<script>window.open('resource.php?updated=Record Has Been Updated','_self')</script>";
                                            //  echo $query1;
                                             }   
                                             else{
                                                 echo "<div class='alert alert-danger' role='alert'> <b> Error!!! </b> <br>This Number is already in use. Please check the number you are trying to update</div>";
                                            //  echo $query1;
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
