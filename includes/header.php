<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- fontawsome offline -->
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <!-- fontawsome online -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS Online-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <!-- Bootstrap CSS Offline -->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- jQuery Offline -->
    <script src="jquery-1.11.1/jquery-1.11.1.min.js"></script>
    <!-- jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>-->
    <script src="javascript/jquery.accordion-wizard.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="stylesheet/style.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert.css">
    <script src="sweetalert/sweetalert.js"></script>
    <!-- /// -->
    <!-- NofifyJS -->
    <script src="javascript/notify.min.js"></script>
    <!-- // -->
    <title>Gift Recommendation System In Bangladesh-Perfectos</title>
</head>

<body style="margin:0;">
    <div id="preloader">
        <div class="row">
            <div class="col-md-12">
                <div class="loader">
                    <div class="loader-inner">
                        <div class="loading one"></div>
                    </div>
                    <div class="loader-inner">
                        <div class="loading two"></div>
                    </div>
                    <div class="loader-inner">
                        <div class="loading three"></div>
                    </div>
                    <div class="loader-inner">
                        <div class="loading four"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mainpage">
        <div class="topnav">
            <a href="#customercare">CUSTOMER CARE</a>
            <a href="#customercare" type="button" data-toggle="modal" data-target="#giftrecommendationModal">GIFT RECOMMENDATION <span class="badge badge-secondary">New</span></a>
            <a href="#signup" type="button" data-toggle="modal" data-target="#signupModal">SIGNUP</a>
            <!-- <a href="#login" type="button" data-toggle="modal" data-target="#loginModal">LOGIN</a> -->
            <?php include 'backend/user.php'; ?>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: rgb(193, 157, 10);">
            <img src="image/logo1.png" width="100px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="manu">
                            <a class="dropdown-item" href="#">No Category Found</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">OTHERS</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search here..." aria-label="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php include 'backend/cartWishCount.php';?>
            </div>
        </nav>
