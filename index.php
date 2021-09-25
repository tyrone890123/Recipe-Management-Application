<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Recipes</title>
    <!-- MDB icon -->
<!--    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
    <header>
        <!-- Navbar -->
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

        <!-- Navbar -->

        <!-- Background image -->
        <div
                class="p-5 text-center bg-image shadow-1-strong"
                style="
                background-image: url('img/wallpaper.jpg');
                height: 470px;
        "
        >
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <?php
                        if((isset($_POST["filter"]))&&($_POST["filter"]=="recommend")){
                            echo '<h1 class="mb-3">Featured Recipes</h1>';
                        }else if((isset($_POST["filter"]))&&($_POST["filter"]=="new")){
                            echo '<h1 class="mb-3">New Recipes</h1>';
                        }else{
                            echo '<h1 class="mb-3">All Recipes</h1>';
                        }
                        ?>
                        <a class="btn btn-outline-light btn-lg" href="#navbarNav" role="button"
                        >Check out these recipies</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="mt-5">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container-fluid">
                    <button
                            class="navbar-toggler"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                    >
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <form class="d-flex input-group w-auto" name="firstform" action="index.php" method="post">
                                <input type="hidden" value="all" name="filter" id="filter"/>
                            </form>

                            <form class="d-flex input-group w-auto" name="secondform" action="index.php" method="post">
                                <input type="hidden" value="recommend" name="filter" id="filter"/>
                            </form>

                            <form class="d-flex input-group w-auto" name="thirdform" action="index.php" method="post">
                                <input type="hidden" value="new" name="filter" id="filter"/>
                            </form>

                            <li class="nav-item">
                                <?php
                                    if((!isset($_POST["filter"]))||($_POST["filter"]=="all")){
                                        echo "<a class='nav-link disabled' href='#' aria-disabled='true'>All Recipes</a>";
                                    }else{
                                        echo '<a class="nav-link" href="#" onclick="document.forms[\'firstform\'].submit();">All Recipes</a>';
                                    }
                                ?>

                            </li>
                            <li class="nav-item">
                                <?php
                                if((isset($_POST["filter"]))&&($_POST["filter"]=="recommend")){
                                    echo "<a class='nav-link disabled' href='#' aria-disabled='true'>Recommended Recipes</a>";
                                }else{
                                    echo '<a class="nav-link" href="#" onclick="document.forms[\'secondform\'].submit();">Recommended Recipes</a>';
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                if((isset($_POST["filter"]))&&($_POST["filter"]=="new")){
                                    echo "<a class='nav-link disabled' href='#' aria-disabled='true'>New Recipes</a>";
                                }else{
                                    echo '<a class="nav-link" href="#" onclick="document.forms[\'thirdform\'].submit();">New Recipes</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>

                    <form class="d-flex input-group w-auto" name="fourthform" action="index.php" method="post">
                        <input type="hidden" value="query" name="filter" id="filter"/>
                        <input
                                type="text"
                                name="query"
                                class="form-control rounded"
                                placeholder="Search"
                                aria-label="Search"
                                aria-describedby="search-addon"
                        />
                        <span class="input-group-text text-dark border-0" id="search-addon">
                            <i class="fas fa-search" onclick="document.forms['fourthform'].submit();"></i>
                        </span>
                    </form>
                </div>
            </nav>

            <section class="text-center mb-4">
                <div class="row">
                <?php
                $sqlconnect = mysqli_connect("localhost","root","");
                if(!$sqlconnect){
                    die("Failed".mysqli_connect_error());
                }

                $selectDB = mysqli_select_db($sqlconnect,'proj');
                if(!$selectDB){
                    die("Cant find".mysqli_error($sqlconnect));
                }

                if((isset($_POST["filter"]))&&($_POST["filter"]=="recommend")){
                    $result_out=mysqli_query($sqlconnect,"select * from recipies where Recommended = 'Y'");
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
                            <form class="d-flex input-group w-auto" name="prodform'.$increment.'" action="prodpage.php" method="post">
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
                                     <h5 class="card-title">'.$title.'</h5>
                                     <p class="card-text">
                                         '.$description.'
                                     </p>
                                </div>
                             </div>
                         </div>
                     </div>';
                        $increment+=1;
                    }
                }else if((isset($_POST["filter"]))&&($_POST["filter"]=="new")){
                    $result_out=mysqli_query($sqlconnect,"select * from recipies order by Created DESC");
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
                            <form class="d-flex input-group w-auto" name="prodform'.$increment.'" action="prodpage.php" method="post">
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
                                     <h5 class="card-title">'.$title.'</h5>
                                     <p class="card-text">
                                         '.$description.'
                                     </p>
                                </div>
                             </div>
                         </div>
                     </div>';
                        $increment+=1;
                    }
                }else if((isset($_POST["filter"]))&&($_POST["filter"]=="query")){
                    $q=$_POST["query"];
//                    $result_out=mysqli_query($sqlconnect,"SELECT * FROM recipies where Ingridients LIKE '%".$q."%' OR Title LIKE '%".$q."%'");
                    $result_out=mysqli_query($sqlconnect,"SELECT distinct recipies.Auth_ID,recipies.Title,recipies.Description,recipies.EST,
                                                                recipies.Created,recipies.Recommended,recipies.URL,ingridients.ingridient From recipies 
                                                                RIGHT JOIN ingridients ON recipies.Title=ingridients.Title where ingridient LIKE '%".$q."%' 
                                                                OR recipies.Title LIKE '%".$q."%' group by recipies.Title");
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
                            <form class="d-flex input-group w-auto" name="prodform'.$increment.'" action="prodpage.php" method="post">
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
                                     <h5 class="card-title">'.$title.'</h5>
                                     <p class="card-text">
                                         '.$description.'
                                     </p>
                                </div>
                             </div>
                         </div>
                     </div>';
                        $increment+=1;
                    }
                }else{
                    $result_out=mysqli_query($sqlconnect,"select * from recipies order by Title");
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
                            <form class="d-flex input-group w-auto" name="prodform'.$increment.'" action="prodpage.php" method="post">
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
                                     <h5 class="card-title">'.$title.'</h5>
                                     <p class="card-text">
                                         '.$description.'
                                     </p>
                                </div>
                             </div>
                         </div>
                     </div>';
                        $increment+=1;
                    }


                }
                ?>

<!--                 <div class="row">-->
<!--                     <div class="col-lg-4 col-md-12 mb-4"> <div class="card">-->
<!--                             <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="height : 200px">-->
<!--                                 <img-->
<!--                                         src="img/carbonara.jpg"-->
<!--                                         class="img-fluid"-->
<!---->
<!--                                 />-->
<!--                                 <a href="#!">-->
<!--                                     <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>-->
<!--                                 </a>-->
<!--                             </div>-->
<!--                             <div class="card-body">-->
<!--                                 <h5 class="card-title">Card title</h5>-->
<!--                                 <p class="card-text">-->
<!--                                     Some quick example text to build on the card title and make up the bulk of the-->
<!--                                     card's content.-->
<!--                                 </p>-->
<!--                                 <a href="#!" class="btn btn-primary">Button</a>-->
<!--                             </div>-->
<!--                         </div>-->
<!--                     </div>-->
<!--                 </div>-->

                </div>
            </section>
        </div>
    </main>

</div>
<!-- End your project here-->

<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</body>
</html>
