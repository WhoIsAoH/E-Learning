<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
$countNews = "Select * from news";
    $newsResult = mysqli_query($conn, $countNews);
    $newsNum = mysqli_num_rows($newsResult);

    $countResource= "select * from resource";
    $resourceResult = mysqli_query($conn, $countResource);
    $resourceNum = mysqli_num_rows($resourceResult);
    $resource_id_add = $row['resource_id'];

    $countEnrolled= "select * from record";
    $enrolledResult = mysqli_query($conn, $countEnrolled);
    $enrolledNum = mysqli_num_rows($enrolledResult);

    $countRequest= "select * from resourceRequest";
    $requestResult = mysqli_query($conn, $countRequest);
    $requestNum = mysqli_num_rows($requestResult);
?>