<?php include 'auth.php';?>
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
    <h1 class="h3 mb-0 text-gray-800">News</h1>
    <a href="add_news.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add News</a>
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