<?php


include ('config.php');
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
$gender= $_POST['gender'];

$sql= "INSERT into user(fname,lname,email,password,cpassword,gender) VALUES('$fname','$lname','$email','$password','$cpassword','$gender')";

$res= mysqli_query($conn,$sql);

if ($res) {

  echo "data insert successfully";

}

 else {

  echo "data not insert";

 }


 ?>