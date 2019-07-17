<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,900" rel="stylesheet">
    <title>Flight | Sign up</title>
</head>
    <body>

        <div class="signupBodyContainer">

            <div class="">
                    <!-- signupContainer -->
                <div class="arrowSignupContainer">
                    <div class="arrowBackContainer unred">
                        <a href="/src/index.php"><img src="../img/backArrow2.png" alt="" onclick="signupCon()"></a>
                    </div>
                    <div> <button class="signLogBtn"> signUp </button> </div>
                </div>

                <div class="cardContainer">
                    <DIV class="theCard">
                        <div class="signupForm">
                                <p class="field-container2 fs24"> Sign Up</p>

                            <form method="post" action="account.php" id="signupForm">
                                <div class="field-container">
                                    <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="user-field">
                                    <!-- <label for="name" class="label-name"> <span class="content-name">Name</span> </label> -->
                                </div>
                                <div class="field-container">
                                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone number" class="user-field">
                                    <!-- <label for="name" class="label-name"> <span class="content-name">Phone number</span> </label> -->
                                </div>
                                <div class="field-container">
                                    <input type="email" name="email" id="email" placeholder="E-mail" class="user-field">
                                    <!-- <label for="name" class="label-name"> <span class="content-name">E-mail</span> </label> -->
                                </div>
                                <div class="field-container">
                                    <input type="password" name="password" id="password" placeholder="Password" class="user-field">
                                    <!-- <label for="name" class="label-name"> <span class="content-name">Password</span> </label> -->
                                </div>
                                <div class="field-container">
                                    <input type="password" name="confrimPassword" id="conPassword" placeholder="Confrim password" class="user-field">
                                    <!-- <label for="name" class="label-name"> <span class="content-name">Confrim password</span> </label> -->
                                </div>
                                <div class="field-container">
                                        <div class=""> <p>Gender</p> </div>
                                        <div class="gender_box">
                                          <div > <input type="radio" name="gender" value="female" id="female" > <label for="female"> Female</label> </div>
                                          <div > <input type="radio" name="gender" value="male" id="male" > <label for="male"> Male</label> </div>
                                        </div>
                                </div>
                                <div class="field-container">
                                    <label> <input type="checkbox" name="terms" id="termsId"> <span class="fs15"> I agree the <a href="#" class="termsServies" id="termsServies">terms and servies </a></span></label>
                                </div>
                                <div class="field-container">
                                    <input type="submit" name="submit" value="Sign up" class= "submitSign" >
                                    <!-- <button type="submit" class="submitSign">Sign up</button> -->
                                </div>

                            </form>
                            <?php
if (isset($_POST['submit'])){
   $fullname=$_POST['fullName'];
   $phonenumber=$_POST['phoneNumber'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $confrimpassword=$_POST['confrimPassword'];
   $gender=$_POST['gender'];
   $terms=$_POST['terms'];
   // $phonenumber=$_POST['confrimPassword'];
   // $phonenumber=$_POST['confrimPassword'];
   $con = mysqli_connect ("localhost", "root", "","flight");
   if (!$con) {
       die("Could not connect: ". mysql_error());
       // echo "<script>alert('lost') </script>";
   }
   $query = mysqli_query($con,"insert into test values (0, '$fullname', '$phonenumber', '$email', '$password', '$gender')");
       if ($query==true) {
      echo "<script> alert(`success.${fullname}`);</script>
      <a href='index.php'> <button> Click here to go back to Home now </button></a>
      ";
           
       }else {
        //    echo"<script> alert(`failed ${fullname}`);</script>";
       } 
}


    
?>

                        </div>

                        <div class="theLogin">
                           <p>this is the login section</p>
                        </div>
                    </DIV>
                </div>

        </div>


        <!-- <script src="app.js"></script> -->
        <script src="src/validation.js"></script>
    </body>
</html>

