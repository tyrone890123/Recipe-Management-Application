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
<main>
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


        $title=$_POST["titlerecipie"];
        if(isset($_POST['submit'])){
            if($_FILES["fileToUpload"]['size'] != 0){
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
                mysqli_query($sqlconnect,"update recipies set URL = '$target_file' where Title='$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
            }


            $title=$_POST['title'];
            $description=$_POST['desc'];
            $estimated=$_POST['est'];
            $servings=$_POST['serving'];

            $quantity=$_POST['q'];
            $ingridient=$_POST['i'];
            $direction=$_POST['steps'];
            $inc=1;

            mysqli_query($sqlconnect,"delete from ingridients where Title='$_POST[titlerecipie]'");
            mysqli_query($sqlconnect,"delete from directions where Title='$_POST[titlerecipie]'");

            foreach ($quantity as $key => $value){
                $addrecord="insert into ingridients values('$SR[Auth_ID]','$quantity[$key]','$ingridient[$key]','$title')";
                mysqli_query($sqlconnect,$addrecord);
            }

            foreach ($direction as $key2 => $value2){
                $addrecord2="insert into directions values('$SR[Auth_ID]','$inc','$direction[$key2]','$title')";
                mysqli_query($sqlconnect,$addrecord2);
                $inc+=1;
            }

            mysqli_query($sqlconnect,"update recipies set Description = '$description' where Title='$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
            mysqli_query($sqlconnect,"update recipies set EST = '$estimated' where Title='$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
            mysqli_query($sqlconnect,"update recipies set Servings = '$servings' where Title='$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");

            mysqli_query($sqlconnect,"update recipies set Title='$title' where Title='$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");

        }


        $editrow=mysqli_query($sqlconnect,"select * from recipies where Title='$title' AND Auth_ID='$_POST[author]'");
        if(!$editrow){
            die("query error!".mysqli_error($sqlconnect));
        }
        $currrecipie=mysqli_fetch_array($editrow);

        $allings=mysqli_query($sqlconnect,"select * from ingridients where Title='$title' AND Auth_ID='$_POST[author]'");
        if(!$allings){
            die("query error!".mysqli_error($sqlconnect));
        }
        $alldirs=mysqli_query($sqlconnect,"select * from directions where Title='$title' AND Auth_ID='$_POST[author]'");
        if(!$alldirs){
            die("query error!".mysqli_error($sqlconnect));
        }


        echo '<section class="mb-4">
                    <form class="bg-white rounded shadow-5-strong p-5" name="addrecipiesnow" action="editprod.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="'.$title.'" name="titlerecipie" id="titlerecipie"/>
                            <input type="hidden" value='.$_POST["author"].' name="author" id="author"/>
                            <input type="hidden" value="submitted" name="submit"/>
                            
                            <div class="d-flex justify-content-center">
                                <img
                                        src="img/add.png"
                                        class="img-fluid"
                                />
                            </div>
                            <h4 class="mb-3">Edit Input</h4>

                            <div class="row">
                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="title" value="'.$currrecipie['Title'].'" required/>
                                        <label class="form-label" for="form1Example1">Title</label>
                                    </div>
                                </div>
                                
                                <div class="col text-center">
                                    <!-- Simple link -->
                                    <div class="form-outline mb-4">
                                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <textarea class="form-control" name="desc" id="textAreaExample" rows="4">'.$currrecipie['Description'].'</textarea>
                                <label class="form-label" for="textAreaExample">Description</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="est" value="'.$currrecipie['EST'].'" required/>
                                <label class="form-label" for="form1Example2">Estimated Time</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="number" class="form-control" name="serving" value="'.$currrecipie['Servings'].'" required/>
                                <label class="form-label" for="form1Example2">Servings</label>
                            </div>
  
                            <table class="table table-bordered" id="table_field">
                                <tr>
                                    <th>Quantity</th>
                                    <th>Ingridient</th>
                                    <th>Add or Remove</th>
                                </tr>';

        $counter=-1;
        while($ingridientlist=mysqli_fetch_array($allings)){
            $quantity=$ingridientlist["quantity"];
            $ingridient=$ingridientlist["ingridient"];

            if($counter==-1){
                echo '<tr><td><input class="form-control" type="text" name="q[]" required="" value="'.$quantity.'"></td>
                      <td><input class="form-control" type="text" name="i[]" required="" value="'.$ingridient.'"></td>
                      <td><input id="add-button" class="btn btn-black" type="button" name="add" value="add"></td></tr>';
                $counter+=1;
            }else{
                echo '<tr> <td><input class="form-control" type="text" name="q[]" required="" value="'.$quantity.'"></td>
                      <td><input class="form-control" type="text" name="i[]" required="" value="'.$ingridient.'"></td>
                      <td><input class="btn btn-danger" type="button" name="Remove" id="remove-button" value="remove" ></td></tr>';
            }
        }

        echo '
                            </table>

                            <table class="table table-bordered" id="table_field2">
                                <tr>
                                    <th>Directions</th>
                                    <th>Add or Remove</th>
                                </tr>';
        $counter2=-1;
        while($directionlist=mysqli_fetch_array($alldirs)){
            $direction=$directionlist["direction"];

            if($counter2==-1){
                echo '<tr><td><input class="form-control" type="text" name="steps[]" required="" value="'.$direction.'"></td>
                      <td><input id="add-button2" class="btn btn-black" type="button" name="add" value="add"></td></tr>';
                $counter2+=1;
            }else{
                echo '<tr><td><input class="form-control" type="text" name="steps[]" required="" value="'.$direction.'"></td>
                      <td><input class="btn btn-danger" type="button" name="remove2" id="remove-button2" value="remove"></td></tr>';
            }
        }


        echo' </table>

                            <!-- Submit button -->
                            <div class="d-flex justify-content-center">
                               <button type="submit" class="btn btn-dark me-3" onclick="document.forms[\'addrecipiesnow\'].submit();">SUBMIT</button>
                            </div>
                     </form>
                    </section>';
        ?>


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