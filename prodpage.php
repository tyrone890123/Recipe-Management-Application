<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Recipes</title>
    <!-- MDB icon -->
    <!--    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"/>
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css"/>
</head>

<body>
<header>
    <?php
    session_start();
    if(isset($_SESSION['email'])){
        echo'<nav class="navbar navbar-expand-lg navbar-light bg-white">
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
    $sqlconnect = mysqli_connect("localhost","root","");
    if(!$sqlconnect){
        die("Failed".mysqli_connect_error());
    }

    $selectDB = mysqli_select_db($sqlconnect,'proj');
    if(!$selectDB){
        die("Cant find".mysqli_error($sqlconnect));
    }
    $result_out=mysqli_query($sqlconnect,"select * from recipies where Title = '$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
    if(!$result_out){
        die("query error!".mysqli_error($sqlconnect));
    }
    $SR=mysqli_fetch_array($result_out);
    $url=$SR['URL'];

    echo '<div
                class="p-5 text-center bg-image shadow-1-strong"
                style="
                    background-image: url('.$url.');
                    height: 470px;
                "
          >
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            </div>
        </div>'

    ?>

    <!-- Navbar -->
</header>

<main class="mt-5">

    <div class="container" style="padding-left: 200px;padding-right: 200px">
        <?php
        $sqlconnect = mysqli_connect("localhost","root","");
        if(!$sqlconnect){
            die("Failed".mysqli_connect_error());
        }

        $selectDB = mysqli_select_db($sqlconnect,'proj');
        if(!$selectDB){
            die("Cant find".mysqli_error($sqlconnect));
        }
        $result_out=mysqli_query($sqlconnect,"select * from recipies where Title = '$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
        if(!$result_out){
            die("query error!".mysqli_error($sqlconnect));
        }
        $SR=mysqli_fetch_array($result_out);
        $title=$SR['Title'];
        $description=$SR['Description'];
        $url=$SR['URL'];
        $a_id=$SR['Auth_ID'];
        $serving=$SR['Servings'];
        $time=$SR['EST'];
        echo '<h1 class="text-center">'.$title.'</h1>';
        echo '<hr class="text-center mb-3" style="width:50%;height:2px;border-width:0;color:black;margin: auto;">';
        echo '<ul class="pagination pagination-circle d-flex justify-content-center">
                <li class="me-1"><i class="fas fa-clock"></i></li>
                <li class="me-3 mb-3">Cooking Time: '.$time.'</li>
                <li class="me-1"><i class="fas fa-user-alt"></i></li>
                <li>Serving Size: '.$serving.'</li>
             </ul>';

        echo '<div class="text-center mb-5" style="font-size: 20px">'.$description.'</div>';

        echo '<h4 class="text-center">INGRIDIENTS</h4>';
        echo '<div class="d-flex align-items-center justify-content-center">';
        echo '<div class="list-group mb-5 d-flex">';
        $ingridientlist=mysqli_query($sqlconnect,"select * from ingridients where Title = '$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
        if(!$ingridientlist){
            die("query error!".mysqli_error($sqlconnect));
        }
        while($INGLIST=mysqli_fetch_array($ingridientlist)){
            $quantity=$INGLIST["quantity"];
            $ingridient=$INGLIST["ingridient"];
            echo  '<label class="mb-2" style="font-size: 20px">
                                   <input class="form-check-input me-1" type="checkbox" value="" />
                                   '.$quantity.' '.$ingridient.'
                               </label>';
        }
        echo '</div></div>';
        echo '<h4 class="text-center">INSTRUCTIONS</h4>';
        echo '<ol class="list-group list-group-numbered">';
        $directionlist=mysqli_query($sqlconnect,"select * from directions where Title = '$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
        if(!$directionlist){
            die("query error!".mysqli_error($sqlconnect));
        }
        while($DIRLIST=mysqli_fetch_array($directionlist)){
            $direction=$DIRLIST["direction"];
            echo  '<li class="mb-3" style="font-size: 20px;text-align: justify">
                                   '.$direction.'
                               </li>';
        }
        echo '</ol>';
        echo '<hr class="m-0" />';
        echo '<i class="mt-3 mb-3 fas fa-utensils d-flex justify-content-center"></i>'
        ?>
</main>


</div>
<!-- End your project here-->

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>
</html>
