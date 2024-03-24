<?php
session_start();
  include ('config/config.php'); //print_r($row);
  if (isset($_POST['city']) && isset($_POST['bloodgroup'])) {
    $city=$_POST['city'];
    $bloodgroup=$_POST['bloodgroup'];

    $sql = "SELECT * FROM donor where donor_city= '$city' && donor_bloodgroup= '$bloodgroup' ";
    $res = mysqli_query($conn,$sql);
    $result = mysqli_num_rows($res);
  } ?>
<!DOCTYPE html>
<html>

<head>
    <title>project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   
    <script src="js/bootstrap.bundle.js"></script>
    <style>
        .card:hover{
        transform: scale(1.1);
      }
      .card{
        transition: transform .5s;
      }
      .card-body:hover{
        transform: scale(1.1);
      }
      .card-body{
        transition: transform .5s;
      }
      .logo:hover{
         transform: scale(1.1);
      }
      .logo{
        transition: transform .5s;
      }
      .nav-link{
        position: relative;
      }
      .nav-link::after{
        content: '';
        opacity: 0;
        transition: all 0.5s;
        background-color: greenyellow;
        width: 100%;
        height: 2px;
        position: absolute;
        bottom: 0;
        left: 0;
            }
      .nav-link:hover::after{
        opacity: 1;
       
            }
    </style>

</head>

<body>
    <header>
        <div class="bg-gradient">
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
                                <a class="nav-link text-white fw-bold" href="index.php">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white" href="donorquest.php">Donor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Search Donors</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="contactus.php">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white fw-bold" href="aboutus.php">About Us</a>
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
                        <h2>DONATE THE BLOOD</h2>
                        <h2>SAVE THE LIFE</h2>
                        <p class="text-center pt-3">Donate the blood to help the others</p>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="row text-center headerset">
                            <div class="col-sm-12">
                                <h1 class="text text-white pt-2 pb-3">SEARCH THE DONORS</h1>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 mb-3">
                                    <select class="form-select " name="city" required>
                                        <option value="">Select City</option>
                                        <option value="Rawalpindi">Rawalpindi</option>
                                        <option value="Lahore">Lahore</option>
                                        <option value="Islamabad">Islamabad</option>
                                        <option value="Faislabad">Faislabad</option>
                                        <option value="Multan">Multan</option>
                                        <option value="Peshawar">Peshawar</option>
                                        <option value="Kashmir">Kashmir</option>
                                        <option value="GB">GB</option>
                                    </select>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 mb-3">
                                    <select class="form-select" name="bloodgroup" required>
                                        <option value="">Select Blood Group</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 mb-3">
                                    <button type="submit" name="search" value="SEARCH"
                                        class="btn  bg-white text-danger">SEARCH</button>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
    </header>

    <section>
        <div class="container-fluid text-white overview bg-color pb-5 pt-2">
            <?php
            if(!empty($_POST['search'])){
              if ($result > 0) {
              ?>
            <div class="row">
                <div class=" head1 text-center mt-3 mb-5">
                    <h4 class="text text-danger pt-5 text-decoration-underline">The Life Saver Donors</h4>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-striped m-5">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>City</th>
                                    <th>Blood Group</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i=1;
                              while ($row=mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                  <td> <?php echo $i; ?> </td>
                                  <td> <?php echo $row['donor_name']; ?> </td>
                                  <td> <?php echo $row['donor_email']; ?> </td>
                                  <td> <?php echo $row['donor_contact']; ?> </td>
                                  <td> <?php echo $row['donor_city']; ?> </td>
                                  <td> <?php echo $row['donor_bloodgroup']; ?> </td>
                                </tr>
                             <?php $i++; } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <?php
            } else {
            ?>
            <h1 class="text text-danger text-center pt-5 text-decoration-underline">No Data Found</h1>
            <?php
            }
          }
          ?>

        </div>
    </section>

    <section class="container-fluid bg-danger text-white pt-5 pb-5">
        <div class=" container mt-2">
            <h3 class="text text-warning text-center text-decoration-underline">Donate The Blood</h3>
        </div>
        <div class="container mt-5">
            <p class=" text-center">
                The term blood donation is utilized when an individual intentionally gives blood for somebody who needs
                it (sick or in an emergency), potentially emerging because of an ailment. A blood gift is done in the
                oversight of a clinical expert and is helpful both for the beneficiary just as the benefactor.
            </p>
            <p class=" text-center">
                The term blood donation is utilized when an individual intentionally gives blood for somebody who needs
                it (sick or in an emergency), potentially emerging because of an ailment. A blood gift is done in the
                oversight of a clinical expert and is helpful both for the beneficiary just as the benefactor.
            </p>


        </div>
        <div class=" mt-5 ms-5 mb-5">
            <button class="btn bg-white text-danger" id="click"><a class="bg-white text-danger"
                    href="register.php">Become A life Saver!!</a></button>
        </div>
    </section>
    <hr class="red-bar">

    <section>
        <div class="container-fluid text-white overview bg-color  pb-5 pt-3">
            <div class="row justify-content-evenly">
                <div class=" head1 text-center text-dark mt-3 text-decoration-underline">
                    <h4>What We Do</h4>

                </div>
            </div>
            <div class="row justify-content-center text-dark">
                <div class="col-sm-3  mt-5 ">
                    <div class="card">
                        <img src="img/card.png" alt="title" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger">save life</h4>
                        <p class="card-text">A blood gift is done in the oversight of a clinical expert and is helpful
                            both for the beneficiary just as the benefactor.</p>
                        <a href="aboutus.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>

                <div class="col-sm-3 mt-5">
                    <div class="card">
                        <img src="img/card.webp" alt="title" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger">save life</h4>
                        <p class="card-text">A blood gift is done in the oversight of a clinical expert and is helpful
                            both for the beneficiary just as the benefactor.</p>
                        <a href="aboutus.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>

                <div class="col-sm-3 mt-5">
                    <div class="card">
                        <img src="img/card1webp.webp" alt="title" class="img-fluid">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title text-danger">save life</h4>
                        <p class="card-text">A blood gift is done in the oversight of a clinical expert and is helpful
                            both for the beneficiary just as the benefactor.</p>
                        <a href="aboutus.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-dark">
                <div class="col-sm-3 mt-5">
                    <div class="card">
                        <img src="img/card3.webp" alt="title" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger">save life</h4>
                        <p class="card-text">A blood gift is done in the oversight of a clinical expert and is helpful
                            both for the beneficiary just as the benefactor.</p>
                        <a href="aboutus.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>

                <div class="col-sm-3 mt-5">
                    <div class="card">
                        <img src="img/card4.webp" alt="title" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger">save life</h4>
                        <p class="card-text">A blood gift is done in the oversight of a clinical expert and is helpful
                            both for the beneficiary just as the benefactor.</p>
                        <a href="aboutus.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>

                <div class="col-sm-3 mt-5">
                    <div class="card">
                        <img src="img/card5.webp" alt="title" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-danger">save life</h4>
                        <p class="card-text">A blood gift is done in the oversight of a clinical expert and is helpful
                            both for the beneficiary just as the benefactor.</p>
                        <a href="aboutus.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <section>
        <div class="container-fluid pb-5 mb-5">
            <div class="row mt-5 justify-content-center mb-3">

                <div class="col-sm-3  mb-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="img/bk1.webp" alt="Card image" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title text-danger">Over Vision</h4>
                            <p class="card-text">The term blood donation is utilized when an individual intentionally
                                gives blood for somebody who needs it (sick or in an emergency), potentially emerging
                                because of an ailment.</p>
                            <a href="aboutus.php" class="btn btn-primary">About Us</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="img/bk2.webp" alt="Card image" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title text-danger">Over Goal</h4>
                            <p class="card-text">The term blood donation is utilized when an individual intentionally
                                gives blood for somebody who needs it (sick or in an emergency), potentially emerging
                                because of an ailment.</p>
                            <a href="aboutus.php" class="btn btn-primary">About Us</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="img/bk3.webp" alt="Card image" class="img-fluid">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title text-danger">Over Mission</h4>
                            <p class="card-text">The term blood donation is utilized when an individual intentionally
                                gives blood for somebody who needs it (sick or in an emergency), potentially emerging
                                because of an ailment.</p>
                            <a href="aboutus.php" class="btn btn-primary">About Us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <hr>


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
</body>

</html>