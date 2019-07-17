<?php

echo
<<<me
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,900" rel="stylesheet">
    <title>Flight | Sign in</title>
</head>
    <body>
            <div class="signupBodyContainer">

                    <div class="">
                            <!-- signupContainer -->
                        <div class="arrowSignupContainer">
                            <div class="arrowBackContainer unred">
                                <a href="/index.php"><img src="img/backArrow2.png" alt="" onclick="signupCon()"></a>
                            </div>
                            <!-- <div> <button class="signLogBtn"> signUp </button> </div> -->
                        </div>

                        <div class="cardContainer">
                            <DIV class="theCard">
                                <div class="signupForm">
                                        <p class="field-container2 fs24"> Sign In</p>

                                    <form action="" method="post" id="signinForm">
                                        <div class="field-container">
                                            <input type="email" name="email" id="logEmail" placeholder="E-mail" class="user-field">
                                            <!-- <label for="name" class="label-name"> <span class="content-name">E-mail</span> </label> -->
                                        </div>
                                        <div class="field-container">
                                            <input type="password" name="password" id="logPassword" placeholder="Password" class="user-field">
                                            <!-- <label for="name" class="label-name"> <span class="content-name">Password</span> </label> -->
                                        </div>


                                        <div class="field-container">
                                            <button type="submit" class="logSign">Sign In</button>
                                        </div>

                                    </form>
                                    <div class="field-container">
                                        <button type="" class="createSign" id="createSign"> Create an account </button>
                                    </div>
                                </div>

                                <div class="theLogin">
                                   <p>this is the login section</p>
                                </div>
                            </DIV>
                        </div>

                </div>


                <!-- <script src="app.js"></script> -->
                <script src="src/signin.js"></script>

    </body>
</html>

me;

?>
