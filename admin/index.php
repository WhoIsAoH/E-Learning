<?php include 'auth.php';?>
<?php include 'conn.php';?>

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
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<?php include "count.php"?>


                    <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a h6 href="news.php" class="m-0 font-weight-bold text-primary">News</h6 ></a> 
                <p> </p>
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
                    $Nsql = "SELECT news_id, news_topic FROM news";
                    $Nresult = mysqli_query($conn,$Nsql);
                   
                    echo "<table class='table table-borderless  p-3' align='center' >";
                    while($row = mysqli_fetch_array($Nresult))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['news_topic'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a h6 href="resource.php" class="m-0 font-weight-bold text-primary">Resources</h6 ></a> 
                <p> </p>
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
                    $Rsql = "SELECT resource_name FROM resource";
                    $Rresult = mysqli_query($conn,$Rsql);
                    
                    echo "<table class='table table-borderless  p-3' align='center' >";
                    while($row = mysqli_fetch_array($Rresult))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['resource_name'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($conn);
                ?>
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