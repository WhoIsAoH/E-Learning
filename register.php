
<?php
$register = false;
$showError = false;
if(isset($_POST["submit"]))
   {
    $u_username = $_POST['user_name1'];
    $u_email = $_POST['user_email1'];
    $u_contact = $_POST['user_contact1'];

    $u_password = $_POST['user_password1'];
    $u_cpassword = $_POST['user_cpassword1'];

    // echo $u_password;
    // echo "---";
    // echo $u_cpassword;
    // echo $u_username;
    // echo $u_email;
    // echo $u_contact;

    if($u_password == $u_cpassword){
        include 'conn.php';
        
        $query1 = "INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_type_ids`) VALUES (NULL, '$u_username', '$u_email', '$u_password', '$u_contact', '2')";
        if(mysqli_query($conn,$query1)){
            $register = true;
            echo "<script>window.open('login.php','_self')</script>";
            }
        else{
            $showError = "UserName Not available";
        }
    }
    else{
        $showError = "Password Doesnot match";

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Learning - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php
    if($register){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Account Registered!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            r
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="username" name="user_name1">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Contact Number" name="user_contact1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        placeholder="Email Address" name="user_email1">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                         placeholder="Password" name="user_password1">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                             placeholder="Repeat Password" name="user_cpassword1">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!!!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>