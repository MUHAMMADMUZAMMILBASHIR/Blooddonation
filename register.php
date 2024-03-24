<?php
session_start();

include ('config/config.php');

if(isset($_SESSION['email'])){
  header('location: profile.php');
}

$eligible = "";

if (isset($_POST['register'])) {
  $row= $_POST['register'];
  @$row= $_POST['age'];
  @$row= $_POST['weight'];
  @$row= $_POST['transfusion'];
  @$row= $_POST['healthy'];
  
  if ($row == true) {
    $_SESSION['eligible'] = 'yes';
    header('location: signup.php');
  }
  else{
    $eligible = "no";
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

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                        class="mt-3 border p-4 bg-light text-danger shadow-lg">
                        <h2 class="mb-2 text-secondary text-center">First Time Donater</h2>
                        <h6 class="mb-4 text-secondary text-center">
                            Answer the Questions to proceed further
                        </h6>
                        <?php if($eligible == 'no') { ?>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-12 mt-2 mb-3 border border-danger">
                                <p class="text text-center text-danger mt-4"> Sorry! You are not eligible to donate blood </p>
                                <p class="text text-center text-danger">But you can help others in various other ways </p>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="mb-3 col-md-12 mt-2">
                                <label class="h3">Are you 16 – 65 years old?<span class="text-danger">*</span></label><br>
                                <input class="form-check-input" name="age"  type="checkbox" value="Yes" name="g"> Yes
                           
                            </div>
                            <div class="mb-3 col-md-12 mt-2">
                                <label class="h3">Do you weigh 50kg or more?<span class="text-danger">*</span></label><br>
                                <input class=" form-check-input" name="weight" type="checkbox" value="Yes" name="g"> Yes
                              
                            </div>
                            <div class="mb-3 col-md-12 mt-5">
                                <label class="h3">Have you had a blood or blood product transfusion?<span class="text-danger">*</span></label><br>
                                <input class=" form-check-input" name="transfusion" type="checkbox" value="No" name="g"> (No)
                            </div>
                            <div class="mb-3 col-md-12 mt-5">
                                <label class="h3">Have you ever had a cancer other than basal cell carcinoma or cervical carcinoma insitu (CIN)?<span class="text-danger">*</span></label><br>
                                <input class=" form-check-input" name="healthy" type="checkbox" value="No" name="g">(No)
                            </div>
                            <div class="col-md-12 mb-3 mt-5">
                                <button type="submit" name="register" value="register" class="btn btn-danger w-100">Go
                                    For SignUp</button>
                            </div>
                        </div>
                        <p class="text-center mt-3 text-dark">If you have account, Please
                            <a class="text-danger" href="login.php">login</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>