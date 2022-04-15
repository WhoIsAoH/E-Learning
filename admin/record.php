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
    <h1 class="h3 mb-0 text-gray-800">Enrolled Resources</h1>
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
                <a h6 href="resource.php" class="m-0 font-weight-bold text-primary">Resources</h6 ></a> 
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
                    // $sql = "SELECT record_id, resource_ids FROM resourceRequest";
                    $sql= " select record.record_id, record.resource_ids ,resource.resource_name FROM record, resource where (record.resource_ids=resource.resource_id AND user_ids= $id_user)";
                    $result = mysqli_query($conn,$sql);
                   
                    echo "<table class='table table-borderless  p-3' align='center' >";
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['resource_name'] . "</td>";
                    $id=$row['resource_ids'];
                    echo "<td style='float: right'>"."<a class='btn btn-success' href='enroll_resource.php?enroll=$id'>Enroll</a>"." \t"."<a class='btn btn-primary' href='edit_resource.php?edit=$id'>Edit</a>"." \t"."<a class='btn btn-danger' href='delete_resource.php?del=$id'>delete</a>"."</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>



</div>

</body>
<?php include 'footer.php';?>
</html>