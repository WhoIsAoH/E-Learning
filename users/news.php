<?php
session_start();
if(!isset($_SESSION['loggedinAsStudent']) || $_SESSION['loggedinAsStudent']!=true){
    header("location: login.php");
    exit;
}
?>

<?php include 'conn.php';

// $users_idss = $_SESSION['user_id'];?>

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
    <h1 class="h3 mb-0 text-gray-800">News<?php echo $_SESSION['user_id'];?></h1>
</div>

<?php include "count.php"?>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a h6 href="news.php" class="m-0 font-weight-bold text-primary">News</h6 ></a> 
                <p> </p>

                <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> -->
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                    testing 
                </div> -->
                <?php
                    if (!$conn)
                    {
                    die('Could not connect: ' . mysqli_error());
                    }
                    $sql = "SELECT news_id, news_topic FROM news";
                    $result = mysqli_query($conn,$sql);
                   
                    echo "<table class='table table-borderless  p-3' align='center' >";
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['news_topic'] . "</td>";
                    $id=$row['news_id'];
                    echo "<td style='float: right'>"."<a class='btn btn-success' href='view_news.php?view=$id'>view</a>";
                    // ." \t"."<a class='btn btn-primary' href='edit_news.php?edit=$id'>Edit</a>"." \t"."<a class='btn btn-danger' href='delete_news.php?del=$id'>delete</a>"."</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>



</div>

<?php include 'footer.php';?>
</body>

</html>