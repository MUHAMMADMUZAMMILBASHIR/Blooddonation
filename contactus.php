<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>

</head>
<body>
<!-- Header -->
 <header>
        <div class="bg-gradient">
            <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand text-warning logo">
                        <img src="img/logo.jpg" class="img logo">BLOODDONATION

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
                                <a class="nav-link text-white" href="#">Contact Us</a>
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
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12 text-white mb-5 pt-5">
                        <h1 class="mt-3 pb-3 ">DONATE THE BLOOD</h1>
                        <h1 class="mt-5 pt-4">SAVE THE LIFE</h1>
                        <p class="text-center mt-5 h4 pt-5 ">Donate the blood to help the others</p>
                        <a href="register.php" class=" btn bg-white pt-2 pb-2 m-3 h5 text-danger ">Donate Blood</a>
                    </div>
                    
                </div>

            </div>
    </header>
<!-- Footer -->
<section>
<footer>
        <div class="container-fluid">
            <div class="row justify-content-evenly pt-1 pb-1 btn-dark h-50">
                <div class="col-sm-12">

                    <h2 class="text text-center pb-1 mb-4 text-decoration-underline">
                        Contact Us<span><i class="bi bi-person-lines-fill ms-2"></i></span>
                    </h2>

                </div>
                 <div class="col-sm-3">
                    <h5>More About Company<span><i class="bi bi-house-door"></i></span> </h5>
                    <p class=" mt-2 mb-2"><i class="bi bi-house-door ms-2"></i><span class="p-2">A blood gift is done in the oversight of a clinical expert and is helpful both for the beneficiary just as the benefactor.</span></p>
                   
                </div>

                <div class="col-sm-3">
                    <h5>Keep Connected<span><i class="bi bi-house-door mb-3"></i></span> </h5>
                    <i class="bi bi-facebook p-1 pt-2 mt-4 mb-2"><span class="p-3">Follow On facebook</span></i>
                    <br><br>
                    
                    <i class="bi bi-twitter"><span class="p-3">Follow On Twitter</span></i>
                    <br><br>
                    <i class="bi bi-instagram"><span class="p-3">Follow On Instagram</span></i>
                    <br><br>
                    <i class="bi bi-tiktok"><span class="p-3">Follow On Tictok</span></i>
                    <br><br>

                </div>
                
                <div class="col-sm-3">
                    <h5>Connect Information<span><i class="bi bi-house-door"></i></i></span> </h5>
                    <p><span><i class="bi bi-house-door p-2"></i></span>AliTown Adyalah Road RawalPindi OR Jarahi Stop Adyalah Road RawalPindi</p>
                    <p><i class="bi bi-envelope "></i><span class="p-3">muzammil@gmail.com</span></p>
                    <i class="bi bi-telephone"><span class="p-3">03203982518</span></i>
                    <p><i class="bi bi-envelope "></i><span class="p-3">hasnain@gmail.com</span></p>
                </div>
            </div>
        </div>
    </footer>
</section>
</body>
</html>