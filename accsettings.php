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
    <link rel="stylesheet" href="css/admin.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
            crossorigin="anonymous"></script>

    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>


</head>

<body>
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <form class="d-flex input-group w-auto" name="firstform" action="accsettings.php" method="post"">
        <input type="hidden" value="profile" name="choice"/>
    </form>

    <form class="d-flex input-group w-auto" name="secondform" action="accsettings.php" method="post">
        <input type="hidden" value="add" name="choice"/>
    </form>

    <form class="d-flex input-group w-auto" name="thirdform" action="accsettings.php" method="post">
        <input type="hidden" value="minus" name="choice"/>
    </form>

    <?php

    if((isset($_POST['choice']))&&($_POST['choice']=="add")){
        $var1='';
        $var2='active';
        $var3='';
    }if((isset($_POST['choice']))&&($_POST['choice']=="minus")){
        $var1='';
        $var2='';
        $var3='active';
    }else if(((isset($_POST['choice']))&&($_POST['choice']=="profile"))||(!isset($_POST['choice']))){
        $var1='active';
        $var2='';
        $var3='';
    }


    echo '    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                    <div class="position-sticky">
                        <div class="list-group list-group-flush mx-3 mt-4">
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple '.$var1.'" onclick="document.forms[\'firstform\'].submit();">
                                <i class="fas fa-info fa-fw me-3"></i><span>Profile</span>
                            </a>
                            
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple '.$var2.'" onclick="document.forms[\'secondform\'].submit();">
                                <i class="fas fa-plus fa-fw me-3"></i><span>Add Recipes </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action py-2 ripple '.$var3.'" onclick="document.forms[\'thirdform\'].submit();">
                                <i class="fas fa-minus fa-fw me-3"></i><span>Delete Recipes</span></a>
                        </div>
                    </div>
                </nav>';

    ?>


    <!-- Sidebar -->
    <?php
    session_start();
    if(isset($_SESSION['email'])){
        echo'<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                      <form class="d-flex input-group w-auto" name="logoutform" action="index.php" method="post">
                         <input type="hidden" value="all" name="filter" id="filter"/>
                      </form>
                <div class="container">
                    <!-- Navbar brand -->
                    <a class="navbar-brand me-2">
                        <i class="fas fa-utensils"></i>
                    </a>
                    <!-- Toggle button -->
                    <button
                            class="navbar-toggler"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#navbarButtonsExample"
                            aria-controls="navbarButtonsExample"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                    >
                        <i class="fas fa-bars"></i>
                    </button>
    
                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarButtonsExample">
                        <!-- Left links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">D.T Recipes</a>
                            </li>
                        </ul>
                        <!-- Left links -->
    
                        <form class="d-flex input-group w-auto" name="logform" action="loginregister.php" method="post">
                            <input type="hidden" value="login" name="option" id="option"/>
                        </form>
                        <form class="d-flex input-group w-auto" name="regform" action="loginregister.php" method="post">
                            <input type="hidden" value="register" name="option" id="option"/>
                        </form>
    
                        <div class="d-flex align-items-center">
                            <ul class="navbar-nav d-flex flex-row">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Welcome '.$_SESSION['fname'].'</a>
                                </li>
                              <li class="nav-item me-3 me-lg-0 dropdown">
                                <a
                                  class="nav-link dropdown-toggle"
                                  href="#"
                                  id="navbarDropdown"
                                  role="button"
                                  data-mdb-toggle="dropdown"
                                  aria-expanded="false"
                                >
                                  <i class="fas fa-user"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li>
                                    <a class="dropdown-item" href="accsettings.php">Account Settings</a>
                                  </li>
                                  <li><hr class="dropdown-divider" /></li>
                                  <li>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Collapsible wrapper -->
                </div>
            </nav>';

    }else{
        echo'<nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2">
                    <i class="fas fa-utensils"></i>
                </a>
                <!-- Toggle button -->
                <button
                        class="navbar-toggler"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarButtonsExample"
                        aria-controls="navbarButtonsExample"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">D.T Recipes</a>
                        </li>
                    </ul>
                    <!-- Left links -->

                    <form class="d-flex input-group w-auto" name="logform" action="loginregister.php" method="post">
                        <input type="hidden" value="login" name="option" id="option"/>
                    </form>
                    <form class="d-flex input-group w-auto" name="regform" action="loginregister.php" method="post">
                        <input type="hidden" value="register" name="option" id="option"/>
                    </form>

                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-link text-dark" onclick="document.forms[\'logform\'].submit();">
                            Login
                        </button>
                        <button type="button" class="btn btn-dark me-3" onclick="document.forms[\'regform\'].submit();">
                            Sign up for free
                        </button>
                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
        </nav>';
    }
    ?>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">

        <!--Section: Sales Performance KPIs-->
        <?php
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

        if((isset($_POST['choice']))&&($_POST['choice']=="add")){
            if(isset($_POST['submit'])){

                $target_dir = "img/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                }


                $title=$_POST['title'];
                $description=$_POST['desc'];
                $estimated=$_POST['est'];
                $servings=$_POST['serving'];

                $quantity=$_POST['q'];
                $ingridient=$_POST['i'];
                $direction=$_POST['steps'];
                $inc=1;

                foreach ($quantity as $key => $value){
                    $addrecord="insert into ingridients values('$SR[Auth_ID]','$quantity[$key]','$ingridient[$key]','$title')";
                    mysqli_query($sqlconnect,$addrecord);
                }

                foreach ($direction as $key2 => $value2){
                    $addrecord2="insert into directions values('$SR[Auth_ID]','$inc','$direction[$key2]','$title')";
                    mysqli_query($sqlconnect,$addrecord2);
                    $inc+=1;
                }

                $addrecord3="insert into recipies values('$SR[Auth_ID]','$title','$description','$estimated','$servings',DEFAULT,DEFAULT,'$target_file')";
                mysqli_query($sqlconnect,$addrecord3);

            }

            echo '<section class="mb-4">
                    <form class="bg-white rounded shadow-5-strong p-5" name="addrecipiesnow" action="accsettings.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="add" name="choice"/>
                            <input type="hidden" value="submitted" name="submit"/>
                            
                            <div class="d-flex justify-content-center">
                                <img
                                        src="img/add.png"
                                        class="img-fluid"
                                />
                            </div>
                            <h4 class="mb-3">Add Recipes</h4>

                            <div class="row">
                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="title" required/>
                                        <label class="form-label" for="form1Example1">Title</label>
                                    </div>
                                </div>
                                
                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <div class="form-outline mb-4">
                                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <textarea class="form-control" name="desc" id="textAreaExample" rows="4"></textarea>
                                <label class="form-label" for="textAreaExample">Description</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="est" required/>
                                <label class="form-label" for="form1Example2">Estimated Time</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="number" class="form-control" name="serving" required/>
                                <label class="form-label" for="form1Example2">Servings</label>
                            </div>
  
                            <table class="table table-bordered" id="table_field">
                                <tr>
                                    <th>Quantity</th>
                                    <th>Ingridient</th>
                                    <th>Add or Remove</th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" name="q[]" required=""></td>
                                    <td><input class="form-control" type="text" name="i[]" required=""></td>
                                    <td><input id="add-button" class="btn btn-black" type="button" name="add" value="add"></td>
                                </tr>
                            </table>

                            <table class="table table-bordered" id="table_field2">
                                <tr>
                                    <th>Directions</th>
                                    <th>Add or Remove</th>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="text" name="steps[]" required=""></td>
                                    <td><input id="add-button2" class="btn btn-black" type="button" name="add" value="add"></td>
                                </tr>
                            </table>

                            <!-- Submit button -->
                             <button type="submit" class="btn btn-dark me-3" onclick="document.forms[\'addrecipiesnow\'].submit();">SUBMIT</button>
                        </form>
                    </section>';
        }if((isset($_POST['choice']))&&($_POST['choice']=="minus")){
            echo '<section class="mb-4"><div class="row">';

            if(isset($_POST['titlerecipie'])){
                $q=$_POST["titlerecipie"];

                mysqli_query($sqlconnect,"delete from recipies where Title = '$_POST[titlerecipie]'");
                mysqli_query($sqlconnect,"delete from ingridients where Title = '$_POST[titlerecipie]'");
                mysqli_query($sqlconnect,"delete from directions where Title = '$_POST[titlerecipie]'");

            }


            $result_out=mysqli_query($sqlconnect,"select * from recipies where Auth_ID = '$SR[Auth_ID]'");

            if(!$result_out){
                die("query error!".mysqli_error($sqlconnect));
            }

            $increment=0;
            while($SR=mysqli_fetch_array($result_out)){
                $title=$SR['Title'];
                $description=$SR['Description'];
                $url=$SR['URL'];
                $a_id=$SR['Auth_ID'];
                echo '<div class="col-lg-4 col-md-12 mb-4"> <div class="card" style="height : 300px" onclick="document.forms[\'delform'.$increment.'\'].submit();">
                            <form class="d-flex input-group w-auto" name="delform'.$increment.'" action="accsettings.php" method="post">
                                <input type="hidden" value="'.$title.'" name="titlerecipie" id="titlerecipie"/>
                                <input type="hidden" value='.$a_id.' name="author" id="author"/>
                                <input type="hidden" value="minus"" name="choice"/>
                            </form>
                             <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="height : 200px">
                                 <img
                                         src='.$url.'
                                         class="img-fluid"
                                 />
                                 <a href="#!">
                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                 </a>
                             </div>
                             <div class="card-body d-flex align-items-center justify-content-center">
                                <div class="text-truncate">
                                     <h5 class="card-title text-center">'.$title.'</h5>
                                     <p class="card-text">
                                         '.$description.'
                                     </p>
                                </div>
                             </div>
                         </div>
                     </div>';
                $increment+=1;
            }

            echo '</div>
                </section>';
        }else if(((isset($_POST['choice']))&&($_POST['choice']=="profile"))||(!isset($_POST['choice']))){
            $total=mysqli_query($sqlconnect,"SELECT COUNT(*) as count FROM recipies where Auth_ID = '$SR[Auth_ID]'");
            if(!$total){
                die("query error!".mysqli_error($sqlconnect));
            }
            $countget=mysqli_fetch_array($total);
            $count=$countget['count'];
            echo '<section class="mb-4">
                <div class="card">
                    <div class="card-header text-center py-3">
                        <h5 class="mb-0 text-center">
                            <strong>Profile</strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Recipe Count</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>'.$_SESSION['lname'].'</td>
                                    <td>'.$_SESSION['fname'].'</td>
                                    <td>'.$_SESSION['email'].'</td>
                                    <td>'.$count.'</td>
                                    <td>
                                    <a href="editprof.php"><i class="fas fa-edit"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>';

            echo '<section class="mb-4"><div class="row">';

            $result_out=mysqli_query($sqlconnect,"select * from recipies where Auth_ID = '$SR[Auth_ID]'");
            if(!$result_out){
                die("query error!".mysqli_error($sqlconnect));
            }
            $increment=0;
            while($SR=mysqli_fetch_array($result_out)){
                $title=$SR['Title'];
                $description=$SR['Description'];
                $url=$SR['URL'];
                $a_id=$SR['Auth_ID'];
                echo '<div class="col-lg-4 col-md-12 mb-4"> <div class="card" style="height : 300px" onclick="document.forms[\'prodform'.$increment.'\'].submit();">
                            <form class="d-flex input-group w-auto" name="prodform'.$increment.'" action="editprod.php" method="post">
                                <input type="hidden" value="'.$title.'" name="titlerecipie" id="titlerecipie"/>
                                <input type="hidden" value='.$a_id.' name="author" id="author"/>
                            </form>
                             <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="height : 200px">
                                 <img
                                         src='.$url.'
                                         class="img-fluid"
                                 />
                                 <a href="#!">
                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                 </a>
                             </div>
                             <div class="card-body d-flex align-items-center justify-content-center">
                                <div class="text-truncate">
                                     <h5 class="card-title text-center">'.$title.'</h5>
                                     <p class="card-text">
                                         '.$description.'
                                     </p>
                                </div>
                             </div>
                         </div>
                     </div>';
                $increment+=1;
            }
                
            echo        '</div>
                </section>';
        }

        ?>


        <!-- Section: Main chart -->

        <!--Section: Sales Performance KPIs-->

    </div>
</main>
<!--Main layout-->
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="js/admin.js"></script>
<script src="js/test.js"></script>
<script src="js/test2.js"></script>

</body>

</html>