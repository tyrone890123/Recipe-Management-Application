<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Recipes</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<!--Main Navigation-->
<header>
    <style>
        #intro {
            background-image: url(img/bgreglog.png);
            height: 100vh;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #intro {
                margin-top: -58.59px;
            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }
    </style>

    <form class="d-flex input-group w-auto" name="firstform" action="index.php" method="post">
        <input type="hidden" value="all" name="filter" id="filter"/>
    </form>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <i class="fas fa-utensils"></i>
            <a class="navbar-brand nav-link" target="_blank" href="#">
                <strong>D.T. Recipes</strong>
            </a>

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#intro" onclick="document.forms['firstform'].submit();">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->


    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">

            <?php
            session_start();
            $sqlconnect = mysqli_connect("localhost","root","");
            if(!$sqlconnect){
                die("Failed".mysqli_connect_error());
            }

            $selectDB = mysqli_select_db($sqlconnect,'proj');
            if(!$selectDB){
                die("Cant find".mysqli_error($sqlconnect));
            }

            $result_out=mysqli_query($sqlconnect,"select * from users where Email='$_SESSION[email]'");
            if(!$result_out){
                die("query error!".mysqli_error($sqlconnect));
            }
            $SR=mysqli_fetch_array($result_out);

            $auth=$SR['Auth_ID'];

            if(isset($_POST['lname'])){
                if($_POST['pass']==$_POST['cpass']){
                    mysqli_query($sqlconnect,"update users set LastName = '$_POST[lname]' where Auth_ID='$auth'");
                    mysqli_query($sqlconnect,"update users set FirstName = '$_POST[fname]' where Auth_ID='$auth'");
                    mysqli_query($sqlconnect,"update users set Email = '$_POST[em]' where Auth_ID='$auth'");
                    mysqli_query($sqlconnect,"update users set Password = '$_POST[pass]' where Auth_ID='$auth'");
                    $_SESSION["fname"] = $_POST["fname"];
                    $_SESSION["lname"] = $_POST["lname"];
                    $_SESSION["email"] = $_POST["em"];
                    $_SESSION["pass"] = $_POST["pass"];
                }else{
                    $prompt="Passwords dont match";
                }
            }

            $result_out=mysqli_query($sqlconnect,"select * from users where Email='$_SESSION[email]'");
            if(!$result_out){
                die("query error!".mysqli_error($sqlconnect));
            }

            $SR=mysqli_fetch_array($result_out);
            $lname=$SR['LastName'];
            $fname=$SR['FirstName'];
            $email=$SR['Email'];
            $password=$SR['Password'];
            $prompt="";

            echo '<div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">

                        <form class="bg-white rounded shadow-5-strong p-5" action="editprof.php" method="post">
                            
                            <div class="d-flex justify-content-center">
                                <img
                                        src="img/Register.png"
                                        class="img-fluid"
                                />
                            </div>
                            <h4 class="mb-3">Edit Account</h4>

                            <div class="row">
                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="lname" value="'.$lname.'" required/>
                                        <label class="form-label" for="form1Example1">Last Name</label>
                                    </div>
                                </div>

                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="fname" value="'.$fname.'" required/>
                                        <label class="form-label" for="form1Example1">First Name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="em" value="'.$email.'" required/>
                                <label class="form-label" for="form1Example1">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="pass" value="'.$password.'" required/>
                                <label class="form-label" for="form1Example2">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="cpass" value="'.$password.'" required/>
                                <label class="form-label" for="form1Example2">Confirm Password</label>
                            </div>
                            
                            <p>'.$prompt.'</p>   

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col text-center">
                                    <a href="accsettings.php" class="text-black" >Go back to Account Settings?</a>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block bg-black">Submit</button>
                        </form>
                    </div>
                </div>
            </div>';
            ?>





        </div>
    </div>
    <!-- Background image -->
</header>
<!--Main Navigation-->

<!--Footer-->
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>