<?php include 'auth.php';?>
<?php include 'conn.php';?>

<?php 

$view_id=@$_GET['view'];
$query = "select * from resourceRequest where request_id ='$view_id' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

	// $e_id =  $row['m_id'];
	$e_name =   $row['request_name'];
    $e_origin =   $row['request_origin'];
    $e_description  =  $row['request_description'];
?>

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
    <h1 class="h2 mb-0 text-gray-800"><?php echo $e_name;?></h1>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
            <!-- <h3>Origin:</h3> -->
            <p class="h3"><?php echo $e_origin;?></h3>
            <br><br>
            	<p class="h4"><?php echo $e_description;?></h4>
                <!-- <p class="h4"><?php echo $e_file;?></h4> -->
                <p class="h5"><?php echo $e_type;?></h5>
            </div>
        </div>
    </div>



</div>

</body>
<?php include 'footer.php';?>
</html>