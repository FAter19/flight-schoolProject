<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/main.css">
    <link rel="stylesheet" href="acc.css">
    <title>Flight | Account</title>
</head>
    <body>
        <div class="bodyContainer">

            <div class="accountHeader">
                 <!-- top header section -->
                 <div class="topHeader">
                        <!-- the company logo -->
                       <div class="logo">
                            <img src="img/72ppi/Flight logo.png" alt="" srcset="">
                       </div> 
                       <!-- the navigation bar -->
                       <div class="navContainer">
                           <div class="hamburger">
                               <div class="line"></div>
                               <div class="line"></div>
                               <div class="line lineHalf"></div>
                           </div>
                           <div class="navLinksContainer">
                               <div class="navLinkBox "><a href="#" class="navLink navLinkActive">Home</a></div>
                               <div class="navLinkBox"><a href="#" class="navLink">Log out</a></div>
                               <!-- <div class="navLinkBox"><a href="#" class="navLink">Log out</a></div> -->
                               <!-- <div class="navLinkBox"><a href="#" class="navLink">Project</a></div> -->
                           </div>
                       </div>
                    </div>
            </div>

            <div class="twocontainer">
                <div class="leftNav">

                </div>

                <div class="rightNav">

                        <div class="quickFormContainer">
                                <div class="field-container"> <p class="fs24">  Make a Reservation</p></div>
            
                                <form class="qbookContainer" action="" method="get" onsubmit="return searchBus()">
                                    <div class="field-flex flexd">
                                        <div class="fromContainer">
                                            <p class="fs15">From</p>
                                            <select class="" name="">
                                                <option value="">-None-</option>
                                                <option value="">Abuja</option>
                                                <option value="">Abia</option>
                                                <option value="">Anambra</option>
                                                <option value="">Benue</option>
                                                <option value="">Lagos</option>
                                            </select>
                                        </div>  
                                        <div class="fromContainer">
                                                <p class="fs15">To</p>
                                                <select class="" name="">
                                                    <option value="">-None-</option>
                                                    <option value="">Abuja</option>
                                                    <option value="">Abia</option>
                                                    <option value="">Anambra</option>
                                                    <option value="">Benue</option>
                                                    <option value="">Lagos</option>
                                                </select>
                                            </div>                        
                                    </div>
                                    <div class="dtimeContainer"> 
                                        <p class="fs15">Departure Time</p>
                                        <input type="date" name="" id="">
                                    </div>
                                    <div class="qbookContainer flex_center">
                                        <button class="qbook">Sreach</button>
                                    </div>
                                
                                </form>
                        </div>
                </div>
            </div>

            <!-- bottom body of the page -->
            <div class="bottomBodyContainer">

            </div>

        </div>

        <script src="src/app.js"></script>
    </body>
</html>