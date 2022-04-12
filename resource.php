<?php include 'auth.php';?>
<?php include 'conn.php';?>

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
        <h1 class="h3 mb-0 text-gray-800">Available Resources</h1>
        <a href="new_request.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Request Resource</a>
    </div>

    <!-- Content Row -->
    <?php include "count.php"?>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a h6 href="news.php" class="m-0 font-weight-bold text-primary">Resources</h6 ></a> 
                    <p> </p>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                <?php
                    $id_user = $_SESSION['user_id'];
                    if (!$conn)
                    {
                        die('Could not connect: ' . mysqli_error());
                    }
                    // $sql = "Select DISTINCT resource.resource_id, resource.resource_name, record.resource_ids,record.user_ids from resource,record where (record.resource_ids<>resource.resource_id AND record.user_ids<>$id_user)";
                    // $sql = "select * from resource";
                    $sql = "SELECT * from resource where not exists (select resource_ids from record where ((record.resource_ids = resource.resource_id) AND record.user_ids=$id_user))";
                    $result = mysqli_query($conn,$sql);
                
                    echo "<table class='table table-borderless  p-3' align='center' >";
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['resource_name'] . "</td>";
                    $id=$row['resource_id'];
                    echo "<td style='float: right'>"."<a class='btn btn-success' href='enroll_resource.php?enroll=$id'>Enroll</a>";
                    echo "</tr>";
                    }
                    echo "</table>";
                        mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
<?php include 'footer.php';?>
</html>