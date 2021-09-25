<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Recipies</title>
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

<body style="background: #fff1e6">
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
                                <a class="nav-link" href="index.php">D.T Recipies</a>
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
                            <a class="nav-link" href="#">D.T Recipies</a>
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
    <!-- Navbar -->
</header>

<main class="mt-5">
    <div class="container" style="padding-left: 200px">
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



            if(isset($_POST['page'])){
                $prevpage=($_POST['page']=="3")?"2":"1";
                $currpage=$_POST['page'];
                $nextpage=($_POST['page']=="1")?"2":"3";
            }else{
                $prevpage="1";
                $currpage="1";
                $nextpage="2";
            }

            $activebuttonpage1=($currpage=="1")?"active":"";
            $activebuttonpage2=($currpage=="2")?"active":"";
            $activebuttonpage3=($currpage=="3")?"active":"";

            $colorbuttonpage1=($currpage=="1")?"bg-black":"";
            $colorbuttonpage2=($currpage=="2")?"bg-black":"";
            $colorbuttonpage3=($currpage=="3")?"bg-black":"";


            echo'<form class="d-flex input-group w-auto" name="page1" action="prodpage.php" method="post">
                    <input type="hidden" value="1" name="page"/>
                    <input type="hidden" value="'.$title.'" name="titlerecipie" id="titlerecipie"/>
                    <input type="hidden" value='.$a_id.' name="author" id="author"/>
                </form>

                <form class="d-flex input-group w-auto" name="page2" action="prodpage.php" method="post">
                    <input type="hidden" value="2" name="page"/>
                    <input type="hidden" value="'.$title.'" name="titlerecipie" id="titlerecipie"/>
                    <input type="hidden" value='.$a_id.' name="author" id="author"/>
                </form>

                <form class="d-flex input-group w-auto" name="page3" action="prodpage.php" method="post">
                    <input type="hidden" value="3" name="page"/>
                    <input type="hidden" value="'.$title.'" name="titlerecipie" id="titlerecipie"/>
                    <input type="hidden" value='.$a_id.' name="author" id="author"/>
                </form>';

            echo '<div style="position: fixed;left: 50%;bottom: 0px;transform: translate(-50%, -50%);margin: 0 auto;">
                            <nav aria-label="...">
                                <ul class="pagination pagination-circle ">
                                    <li class="page-item">
                                        <a class="page-link" href="#" onclick="document.forms[\'page'.$prevpage.'\'].submit();">Previous</a>
                                    </li>
                                    <li class="page-item '.$activebuttonpage1.'" ><a class="page-link '.$colorbuttonpage1.'" href="#" onclick="document.forms[\'page1\'].submit();">1</a></li>
                                    <li class="page-item '.$activebuttonpage2.'"><a class="page-link '.$colorbuttonpage2.'" href="#" onclick="document.forms[\'page2\'].submit();">2</a></li>
                                    <li class="page-item '.$activebuttonpage3.'"><a class="page-link '.$colorbuttonpage3.'" href="#" onclick="document.forms[\'page3\'].submit();">3</a></li>
                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" onclick="document.forms[\'page'.$nextpage.'\'].submit();">Next</a>
                                    </li>
                    
                                </ul>
                            </nav>
                        </div>';

                if($currpage=="2"){
                    echo ' <div class="bg-image hover-overlay position-absolute top-50 start-50 translate-middle-y"
                        data-mdb-ripple-color="light" style="height : 500px">
                                <img
                                        src='.$url.'
                                        class="img-fluid"
                                        style="transform: scale(1.5)"
                                />
                            </div>
                    
                    
                            <section>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 ">
                                        <div class="card position-absolute top-50 translate-middle-y" style="height: 400px;width: 500px">
                                            <div class="card-header text-center" style="font-weight: bold;font-size: 25px">Ingridients</div>
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <p class="card-text overflow-visible" style="font-size: 20px">
                                                    <div class="list-group">';
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

                    echo'</div>
                                                </p>
                                            </div>    
                                    </div>
                                </div>
                            </section>
                        </div>';
                }else if($currpage=="3"){
                    echo ' <div class="bg-image hover-overlay position-absolute top-50 start-50 translate-middle-y"
                        data-mdb-ripple-color="light" style="height : 500px">
                                <img
                                        src='.$url.'
                                        class="img-fluid"
                                        style="transform: scale(1.5)"
                                />
                            </div>
                    
                    
                            <section>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 ">
                                        <div class="card position-absolute top-50 translate-middle-y" style="height: 400px;width: 500px">
                                            <div class="card-header text-center" style="font-weight: bold;font-size: 25px">Directions</div>
                                            <div class="card-body d-flex align-items-center">
                                                <p class="card-text overflow-visible" style="font-size: 20px">
                                                    <ol class="list-group list-group-numbered">';
                    $directionlist=mysqli_query($sqlconnect,"select * from directions where Title = '$_POST[titlerecipie]' AND Auth_ID='$_POST[author]'");
                    if(!$directionlist){
                        die("query error!".mysqli_error($sqlconnect));
                    }
                    while($DIRLIST=mysqli_fetch_array($directionlist)){
                        $direction=$DIRLIST["direction"];
                        echo  '<li style="font-size: 20px">
                                   '.$direction.'
                               </li>';
                    }

                    echo '</ol>
                                                </p>
                                            </div>
                                    </div>
                                </div>
                            </section>
                        </div>';
                }else{
                    echo ' <div class="bg-image hover-overlay position-absolute top-50 start-50 translate-middle-y"
                        data-mdb-ripple-color="light" style="height : 500px">
                                <img
                                        src='.$url.'
                                        class="img-fluid"
                                        style="transform: scale(1.5)"
                                />
                            </div>
                    
                    
                            <section class="text-center">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 ">
                                        <div class="card position-absolute top-50 translate-middle-y" style="height: 400px;width: 500px">
                                            <div class="card-header" style="font-weight: bold;font-size: 25px">'.$title.'</div>
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <p class="card-text overflow-visible" style="font-size: 20px">
                                                    '.$description.'
                                                </p>
                                            </div>
                                    </div>
                                </div>
                            </section>
                        </div>';
                }

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
