<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>About us</title>
</head>

<body>

    <div class="container-fluid ">
        <div class="row">
        <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand text-warning">
                        <img src="img/logo.jpg" class="img">BLOODDONATION
                        <?php if(isset($_SESSION['donor_email'])){ ?>
                        <a href="#" class="navbar-brand text-warning">
                          LoggedIn As  
                          <?php echo $_SESSION['donor_name'] ?></a>
                          <?php } ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsenavbar" aria-controls="collapsenavbar" aria-expanded="false"
                        aria-lable="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse " id="collapsenavbar">

                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white h5" href="index.php">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white" href="donorquest.php">Donor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Search Donors</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="contactus.php">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="aboutus.php">About Us</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                          <?php if(isset($_SESSION['donor_email'])){ ?>
                            <li class="nav-item p-1">
                                <a class="btn btn-white border border-primary bg-white text-danger" href="profile.php">View Profile</a>
                            </li>
                            <li class="nav-item p-1">
                                <a class="btn btn-white border border-primary bg-white text-danger" href="logout.php">Log Out</a>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item p-1">
                                <a class="btn btn-white border border-primary bg-white text-danger"
                                    href="login.php">LogIn</a>
                            </li>
                            <li class="nav-item p-1">
                                <a class="btn btn-white border border-primary bg-white text-danger"
                                    href="register.php">SignUp</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-md-12 ">
                <h1 class="text-center text-danger bg-white pt-4 pb-4 text-decoration-underline">About Us</h1>
                <hr class="white-bar">
            </div>
        </div>
    </div>
    <div class="container-fluid  mb-5 mt-5">

        <div class="container">
            <div class="row">
                <div class="col-md-4"><img src="img/bk1.webp" alt="Our Vission" class="rounded float-left img-fluid">
                </div>
                <div class="col-md-8">
                    <h2 class="text-center text-danger text-decoration-underline ">Our Vission</h2>
                    <hr class="red-bar">
                    <p>
                        The term blood donation is utilized when an individual intentionally gives blood for somebody
                        who needs it (sick or in an emergency), potentially emerging because of an ailment. A blood gift
                        is done in the oversight of a clinical expert and is helpful both for the beneficiary just as
                        the benefactor.
                    </p>

                    <p>
                        The term blood donation is utilized when an individual intentionally gives blood for somebody
                        who needs it (sick or in an emergency), potentially emerging because of an ailment. A blood gift
                        is done in the oversight of a clinical expert and is helpful both for the beneficiary just as
                        the benefactor.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5 mt-5 ">
        <div class="container ">
            <div class="container">
                <div class="row ">
                    <div class="col-md-8">
                        <h2 class="text-center text-danger text-decoration-underline ">Our Goal</h2>
                        <hr class="red-bar">
                        <p>
                            The term blood donation is utilized when an individual intentionally gives blood for
                            somebody who needs it (sick or in an emergency), potentially emerging because of an ailment.
                            A blood gift is done in the oversight of a clinical expert and is helpful both for the
                            beneficiary just as the benefactor.
                        </p>
                        <p>
                            The term blood donation is utilized when an individual intentionally gives blood for
                            somebody who needs it (sick or in an emergency), potentially emerging because of an ailment.
                            A blood gift is done in the oversight of a clinical expert and is helpful both for the
                            beneficiary just as the benefactor.
                        </p>
                    </div>
                    <div class="col-md-4"><img src="img/bk2.webp" alt="Our Vission" class="rounded img-fluid float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mb-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><img src="img/bk3.webp" alt="Our Vission" class="rounded float-left img-fluid"></div>
                <div class="col-md-8">
                    <h2 class="text-center text-danger text-decoration-underline ">Our Mission</h2>
                    <hr class="red-bar">
                    <p>
                        The term blood donation is utilized when an individual intentionally gives blood for somebody
                        who needs it (sick or in an emergency), potentially emerging because of an ailment. A blood gift
                        is done in the oversight of a clinical expert and is helpful both for the beneficiary just as
                        the benefactor.
                    </p>
                    <p>
                        The term blood donation is utilized when an individual intentionally gives blood for somebody
                        who needs it (sick or in an emergency), potentially emerging because of an ailment. A blood gift
                        is done in the oversight of a clinical expert and is helpful both for the beneficiary just as
                        the benefactor.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>


   <footer>
        <div class="container-fluid">
            <div class="row justify-content-evenly pt-3 pb-3 btn-dark h-100">
                <div class="col-sm-12">

                    <h2 class="text text-center pb-4 mb-4 text-decoration-underline">
                        Contact Us<span><i class="bi bi-person-lines-fill ms-2"></i></span>
                    </h2>

                </div>
                <div class="col-sm-3">
                    <h3>Address <span><i class="bi bi-house-door"></i></span> </h3>
                    <p>AliTown Adyalah Road RawalPindi <span><i class="bi bi-house-door ms-2"></i></span></p>
                    <p>Jarahi Stop Adyalah Road RawalPindi <span><i class="bi bi-house-door ms-2"></i></span></p>
                </div>
                <div class="col-sm-3">
                    <h3>Numbers<span><i class="bi bi-telephone ms-2"></i></span> </h3>
                    <h5>030203982518<span><i class="bi bi-telephone ms-2"></i></span></h5>
                    <h5>030203982518<span><i class="bi bi-telephone ms-2"></i></span></h5>
                </div>
                <div class="col-sm-3">
                    <h3>E_mail<span><i class="bi bi-envelope ms-2"></i></span> </h3>
                    <p>muzammil@gmail.com<span><i class="bi bi-envelope ms-2"></i></span></p>
                     <p>hasnain@gmail.com<span><i class="bi bi-envelope ms-2"></i></span></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>