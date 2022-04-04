<?php
session_start();
if(!isset($_SESSION['loggedinAsStudent']) || $_SESSION['loggedinAsStudent']!=true){
    header("location: login.php");
    exit;
}
?>

<?php include 'conn.php';?>

<?php 

$view_id=@$_GET['view'];
$query = "select * from news where news_id ='$view_id' ";
$run= mysqli_query($conn,$query);

$row=mysqli_fetch_array($run);

	// $e_id =  $row['m_id'];
	$e_topic =   $row['news_topic'];
	$e_description = $row['news_description'];
	$e_types = $row['news_types'];
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
    <h1 class="h3 mb-0 text-gray-800"><?php echo $e_topic;?></h1>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <!-- <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 href="news.php" class="m-0 font-weight-bold text-primary"><?php echo $e_topic;?></h5 >
                <p> </p>
            </div> -->
            <!-- Card Body -->
            <div class="card-body">
				<p class="h4"><?php echo $e_description;?></h4>
            </div>
        </div>
    </div>



</div>

</body>
<?php include 'footer.php';?>
</html>