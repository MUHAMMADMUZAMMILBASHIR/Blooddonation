<?php
session_start();
include ('config/config.php');

$login_err = "";

if(isset($_SESSION['email'])){
    header('location: profile.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email= $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM donor WHERE donor_email ='$email' && donor_password ='$password' ";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $donor = $result->fetch_assoc();
        $_SESSION['donor_id'] = $donor['donor_id'];
        $_SESSION['donor_name'] = $donor['donor_name'];
        $_SESSION['donor_email'] = $donor['donor_email'];
        header('location:profile.php');
    } else{
        $login_err = "Email or Password is incorrect";
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
    <title>Document</title>
</head>

<body class="bg-milky">
    <div class="col-md-6 col-lg-4 offset-lg-4 offset-md-3 mt-5">
        <div class="bg-light text-danger p-5 border shadow">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h3 class="mb-4 text-secondary text-center">Donor Login</h3>
                <?php if(!empty($login_err)){ ?>
                <p class="mb-2 mt-2 text-danger text-center">
                    <?php echo $login_err; ?>
                </p>
                <?php } ?>
                <div class="mb-4">
                    <label class="h5">Email<span class="text-danger">*</span></label>
                    <input type="text" required name="email" name="email" class="form-control"
                        placeholder="Enter Email">
                </div>
                <div class="mb-4">
                    <label class="h5">Password<span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <!-- <div class="mb-4 form-check w-100">        
                    <label class="h5" class="form-check-label">
                    <input type="checkbox" name="checkbox" class="form-check-input">Remember Me
                    <span>*</span></label>
                    <a href="#" class="float-end text-danger" onclick="message()">Reset Password</a>
                </div> -->
                <button type="submit" name="login" class="btn btn-danger w-100 my-3 shadow-lg">
                    Login
                </button>
                <p class="text-center text-dark m-0">Don't have account?, 
                    <a class="text-danger" href="signup.php">Please Signup</a>
                </p>
            </form>

        </div>
    </div>

    <script>
    function message() {
        alert("Please remember the password");
    }
    </script>


</body>

</html>