<?php
session_start();

include ('config/config.php');

if(isset($_SESSION['email'])){
  header('location: profile.php');
}
if(!isset($_SESSION['eligible'])){
    header('location: register.php');
}

$name = $email = $password = $contact = $city = $bloodgroup = "";
$name_err = $email_err = $password_err = $confirm_password_err = $contact_err = $city_err = 
$bloodgroup_err = $signup_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty($_POST["name"])){
        $name_err = "Please enter name";
    } elseif(!preg_match('/^[A-Za-z ]+$/', $_POST["name"])){
        $name_err = "Enter valid name";
    } else{
        $name = $_POST["name"];
    }
    
    if(empty($_POST["email"])){
        $email_err = "Please enter email";     
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format";
    } else{
        $email = $_POST["email"];
    }
    
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

    if(empty($_POST["contact"])){
        $contact_err = "Please enter contact number";
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
    
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($contact_err) && empty($city_err) && empty($bloodgroup_err)){
        $password = md5($password);
        $sql= "INSERT into donor(donor_name,donor_email,donor_password,donor_contact,donor_city,donor_bloodgroup) VALUES('$name','$email','$password','$contact','$city','$bloodgroup')";
        $res= mysqli_query($conn,$sql);
        if($res) {
            header("location: login.php");
        } else {
            $signup_err = "Something went wrong! Signup Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <title>Donator's Form</title>
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="donator-form">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                        class="mt-5 border border-danger p-4 bg-light text-danger shadow">

                        <h3 class="text-secondary text-center border border-danger p-3">Donator's Form</h3>
                        <?php if(empty($signup_err)){ ?>
                          <p class="text text-center text-success mt-3"> Welcome! You are eligible to donate blood </p>
                          <?php } if(!empty($signup_err)){ ?>
                          <p class="mb-5 mt-5 text-danger text-center">
                            <?php $signup_err ?>
                          </p>
                          <?php } ?>
                          <p class="mb-5 text-secondary text-center">Please provide the required details</p>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="h5">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Enter Full Name"
                                    class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $name_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" placeholder="Enter Email"
                                    class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $email_err; ?></span>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="h5">Contact Number<span class="text-danger">*</span></label>
                                <input type="number" name="contact" placeholder="03*********"
                                    class="form-control <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">Password<span class="text-danger">*</span></label>
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
                            <div class="col-md-6 mb-3">
                                <label class="h5">City<span class="text-danger">*</span></label>
                                <select
                                    class="form-select form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>"
                                    name="city">
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
                                <span class="invalid-feedback"><?php echo $city_err; ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="h5">Blood Group<span class="text-danger">*</span></label>
                                <select name="bloodgroup"
                                    class="form-select form-control <?php echo (!empty($bloodgroup_err)) ? 'is-invalid' : ''; ?>">
                                    <option value="">Select Blood Group</option>
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
                            <hr class="col-12 mt-3 mb-3">

                            <div class="form-inline mb-3 col-md-10 mt-2">
                                <span>By submitting this form you agree to our terms & conditions. Your details will
                                    be shown in Blood donors list</span>
                            </div>
                            <hr class="col-12 mt-3 mb-3">

                            <div class="col-md-12 text-right">
                                <a href="project.php" class="btn btn-danger">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                            <p class="text-center mt-3 text-dark">If you have account, Please
                                <a class="btn btn-success" href="login.php">login</a>
                            </p>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>