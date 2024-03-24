<?php
session_start();
if(!isset($_SESSION['donor_email'])){
    header('location: login.php');
}
include ('config/config.php');

$donor_id=$_SESSION['donor_id'];
$sql = "SELECT * FROM donor WHERE donor_id=$donor_id";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

$name = $email = $password = $contact = $city = $bloodgroup = $old_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = $contact_err = $city_err = 
$bloodgroup_err = $signup_err = $old_password_err = "";
 
if(isset($_POST['delete'])){
    $donor_id=$_SESSION['donor_id'];
    $sql = "DELETE FROM donor WHERE donor_id=$donor_id";
    $res = mysqli_query($conn,$sql);
    if($res){
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
        exit;
    } else {
        $signup_err = "Something went wrong! Could not Delete!";
    }
}

if(isset($_POST['update'])){
 
    if(empty($_POST["name"])){
        $name_err = "Name cannot be empty";
    } elseif(!preg_match('/^[A-Za-z ]+$/', $_POST["name"])){
        $name_err = "Enter valid name";
    } else{
        $name = $_POST["name"];
    }
    
    if(empty($_POST["email"])){
        $email_err = "Email cannot be empty";     
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format";
    } else{
        $email = $_POST["email"];
    }

    if(empty($_POST["contact"])){
        $contact_err = "Contact number cannot be empty";
    } elseif(!preg_match('/^[0-9]+$/', $_POST["contact"])){
        $contact_err = "invalid contact number";
    } elseif(strlen($_POST["contact"]) != 11){
        $contact_err = "Enter 11 digit number";
    } else{
        $contact = $_POST["contact"];
    }

    if(empty($_POST["city"])){
        $city_err = "Please select your city";
    } else{
        $city = $_POST["city"];
    }

    if(empty($_POST["bloodgroup"])){
      $bloodgroup_err = "Please select your blood group";
    } else{
      $bloodgroup = $_POST["bloodgroup"];
    }

    if((!empty($_POST['old_password'])) || (!empty($_POST['password'])) || (!empty($_POST['confirm_password'])) ){
            if(empty($_POST["password"])){
                $password_err = "Please enter password";
            } elseif((strlen($_POST["password"]) < 6) || (strlen($_POST["password"]) > 12)){
                $password_err = "Password should be 6 to 12 characters long";
            } else{
                $password = $_POST["password"];
            }
            
            if(($_POST["password"]) != ($_POST["confirm_password"]) ){
                $confirm_password_err = "Password not matched";
            }

            if(empty($_POST["old_password"])){
                $old_password_err = "Please enter Old password";
            } elseif(md5($_POST['old_password']) != $row['donor_password']){
                $old_password_err = "Password not correct";
            }else{
                $old_password = $_POST["old_password"];
            }
    }
    
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($contact_err) && empty($city_err) && empty($bloodgroup_err)  && empty($old_password_err)){
        if($password){
            $password = md5($password);
        } else {
            $password = $row['donor_password'];
        }
        $sql= "UPDATE donor SET donor_name='$name',donor_email='$email',donor_password='$password',donor_contact='$contact',donor_city='$city',donor_bloodgroup='$bloodgroup' WHERE donor_id='$row[donor_id]'";
        $res= mysqli_query($conn,$sql);
        if($res) {
            $signup_err = "Profile Updated Successfully!";
            // header("location: profile.php");
        } else {
            $signup_err = "Something went wrong! Update Failed!";
        }
    }
}

?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body class=" bg-light">
    <header>
        <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-warning">
                    <img src="img/logo.jpg" class="img">BLOODDONATION
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenavbar"
                    aria-controls="collapsenavbar" aria-expanded="false" aria-lable="Toggle navigation">
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
                        <!-- <li class="nav-item p-1">
                            <a class="btn btn-white border border-primary bg-white text-danger" href="profile.php">View
                                Profile</a>
                        </li> -->
                        <?php if(isset($_SESSION['donor_email'])){ ?>
                        <a href="#" class="navbar-brand text-warning">
                          <?php echo $_SESSION['donor_name'] ?></a>
                          <?php } ?>
                        <li class="nav-item p-1">
                            <a class="btn btn-white border border-primary bg-white text-danger" href="logout.php">LogOut</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row text-danger mt-5">
            <div class="col-md-12">
                <div class="donator-form">
                    <h2 class="h2">My Profile</h2>
                    <hr class="red-bar">
                    <p class="text-success">
                        <span>Welcome! Mr. <b> <?php echo $_SESSION['donor_name']; ?> </b> to your profile </span>
                    </p>
                    <p class="text-dark"> You can view, update or delete your profile here </p>
                    <hr class="red-bar">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mt-5 p-4 text-danger shadow">
                        
                        <div class="row shadow mb-5 pt-3 pb-5">
                            <div class="col-md-12">
                                <h2 class="h5 p-2 text-dark">
                                    Personal Details
                                    <span class="mb-5 mt-5 pl-3 text-success text-center">
                                        <?php echo $signup_err ?>
                                    </span>
                                </h2>
                                
                                <hr class="red-bar">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="h5">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" value="<?php echo $row['donor_name'] ?>" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" value="<?php echo $row['donor_email'] ?>" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="h5">Contact Number<span class="text-danger">*</span></label>
                                <input type="number" name="contact" value="<?php echo $row['donor_contact'] ?>" class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">City<span class="text-danger">*</span></label>
                                <select class="form-select form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>"
                                    name="city">
                                    <option value="">Select option</option>
                                    <option value="<?php echo $row['donor_city'] ?>" selected><?php echo $row['donor_city'] ?></option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Faislabad">Faislabad</option>
                                    <option value="Multan">Multan</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Kashmir">Kashmir</option>
                                    <option value="GB">GB</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $city_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">Blood Group<span class="text-danger">*</span></label>
                                <select name="bloodgroup"
                                    class="form-select form-control <?php echo (!empty($bloodgroup_err)) ? 'is-invalid' : ''; ?>">
                                    <option value="">Select option</option>
                                    <option value="<?php echo $row['donor_bloodgroup'] ?>" selected><?php echo $row['donor_bloodgroup'] ?></option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $bloodgroup_err; ?></span>
                            </div>

                        </div>


                        <div class="row shadow mb-5 pt-3 pb-5">
                            <div class="col-md-12">
                                <h2 class="h5 p-2 text-dark">Change Password</h2>
                                <hr class="red-bar">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="h5">Old Password<span class="text-danger">*</span></label>
                                <input type="password" name="old_password" placeholder="Enter old Password" class="form-control <?php echo (!empty($old_password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $old_password_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">New Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" placeholder="Enter Password"
                                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" name="confirm_password" placeholder="Enter Password"
                                    class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                            </div>

                        </div>

                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                            <input type="submit" name="delete" class="btn btn-danger btn-lg" value="Delete profile">
                            <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update profile">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-12">
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <form class="file-upload">
                    <div class="row mb-5 gx-5">
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="First name"
                                            value="Scaralet">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Last name"
                                            value="Doe">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="(333) 000 555">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile number *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="+91 9852 8855 252">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="inputEmail4"
                                            value="example@homerealty.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Skype *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="Scaralet D">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5 gx-5">

                        <div class="col-xxl-6">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="my-4">Change Password</h4>
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label">Old password *</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword2" class="form-label">New password *</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
                                        <input type="password" class="form-control" id="exampleInputPassword3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="button" class="btn btn-danger btn-lg">Delete profile</button>
                        <button type="button" class="btn btn-primary btn-lg">Update profile</button>
                    </div>
                </form>
            </div>
        </div> -->
    </div>
</body>

</html>