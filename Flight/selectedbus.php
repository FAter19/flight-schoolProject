<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>

<style>

.flex {
    display: flex;
}

.headerContainer {
  background: #fff; 
  padding: 2rem;
}
.topHeader2 {
        height: 5rem;
        border-bottom: 1px solid rgb(250, 3, 3);
        /* background: #ffffff;  */
        /* box-shadow: 0 1px 13px #e6e6e6; */
        background: transparent;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 2rem;
    }

    .paycardContainer {
            /* border: 1px solid #000; */
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            max-width: 52rem;
            padding: 4rem 3rem;
            margin: 0 auto;
            background: #fff;
        }
        .detailspay {
            display: flex;
            justify-content: center;
        }
        .bdgrey {
            border: 1px solid #c4c4c4;
            border-radius: .5rem;
        }
        .inputWidth {
            width: 100%;
            box-sizing: border-box;
            padding: .5rem;
            border: none;
            font-size: 1.8rem;
            margin-bottom: .3rem;
            outline: none;
        }
        .mgb {
            margin-bottom: 3rem;

        }
        .mr3 {
            margin-right: 1rem;
        }
        .no-margin {
            margin: .4rem .4rem 0 .4rem;

        }
        .dateContainer {
            display: flex;
            justify-content: center;
        }
        .paybtn {
            padding: 2rem;
            width: 100%;
            background: rgb(211, 37, 37);
            color: #FFF;
            border: none;
            border-radius: .4rem;
            font-size: 2rem; 
        }

</style>


<body>
    

<div class="headerContainer">
                <!-- top header section -->
                <div class="topHeader2">
                    <!-- the company logo -->
                   <div class="logo">
                        <img src="img/72ppi/flight2.png" alt="" srcset="">
                   </div>
                   <!-- the navigation bar -->
                   <div class="navContainer">
                       <div class="hamburger">
                           <div class="line"></div>
                           <div class="line"></div>
                           <div class="line lineHalf"></div>
                       </div>
                       <div class="navLinksContainer">
                           
                            <div class="navLinkBox"><a href="index.html" class="navLink ">Home</a></div>
                            <div class="navLinkBox"><a href="about.html" class="navLink">About us</a></div>
                            <div class="navLinkBox"><a href="mybookings.html" class="navLink">My Booking</a></div>
                            <div class="navLinkBox"><a href="cancellation.html" class="navLink">Cancellation</a></div>
                            <div class="navLinkBox"><a href="print.html" class="navLink">Print Ticket</a></div>
                            <div class="navLinkBox"><a href="contact.html" class="navLink">Contact Us</a></div>
                           <!-- navLinkActive -->
                       </div>
					</div>

    </div>


</div>



<br><br><br><br><br>



<?php
$con=mysqli_connect("localhost","root","","flight");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$pid='';
$rid='';
$name='';
$email_id='';
$mob='';
$tickets='';
$date='';
$mode_sel='';

if (isset($_POST['rid']))
{
$rid=$_POST['rid'];
}



$sql='SELECT pid from passenger';
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{
$pid = $row['pid'] + 1;
}






if (isset($_POST['name']))
{
$name=$_POST['name'];
}


if (isset($_POST['email_id']))
{
$email_id=$_POST['email_id'];
}

if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}

if (isset($_POST['tickets']))
{
$tickets=$_POST['tickets'];
}



// if (isset($_POST['date']))
// {
// $date=$_POST['date'];
// }




if (isset($_POST['mode']))
{
$mode_sel=$_POST['mode'];
}







$sql = "SELECT avalseats from route where rid ='$rid' " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);


if($mode_sel == 1 && $tickets <= $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '')
{
echo"<div>
<center><font face='' font size='5' color=''>Complete Your Payment</font></center>
</div>
";

$sql="INSERT INTO passenger(pid,name,email,mob )
VALUES ('$pid','$name','$email_id','$mob')";

	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$fare='';
$totalfare='';
$sql = "SELECT fare from route where rid ='$rid' " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$fare =$row['fare'];

}
$totalfare=$fare*$tickets;

echo"<p><center><br><br>Total Amount : &#8358;"."$fare "."  * "."$tickets "." seat(s) = &#8358;    "."$totalfare "."<br></p></center>";




echo"<br><br><br>
<div class='paycardContainer'>
<div class='mail_info'>
    <!-- <p>email@email.com</p> -->
</div>
<div class='detailspay mgb'>
    <p><font font size='4'>Enter your card details to pay</font></p>
</div>
<div class='card'>
    <form action='paycard.php' method='post'>
        <div class='cardNumberContainer bdgrey mgb'>
            <p class='no-margin' >CARD NUMBER</p>
            <input type='text' name='num' id='' class='inputWidth' placeholder='XXXX XXXX XXXX XXXX'>
        </div>
        <div class='dateContainer'>
                <div class='bdgrey mgb mr3'>
                <font >Select Bank</font>
                <select name='bank' class='inputWidth'>
                    <option value='SBI'>SBI</option>
                    <option value='CBN'>CBN</option>
                    
                
                </select>
                </div>

                <div class='bdgrey mgb'>
                <font >Card Type</font>
                    <select name='type' class='inputWidth'>
                    <option value='VISA'>	VISA</option>
                    <option value='Master Card'>	Master Card</option>
                    <option value='Mastreo'>Mastreo</option>
                    
                    </select>
                </div>
        </div>
        <div class='dateContainer'>
                <div class='bdgrey mgb mr3'>
                    <p class='no-margin'>CARD EXPIRY</p>
                    <input type='date' name='expdate' id='' class='inputWidth ' placeholder='MM / YY'>
                    <input type='hidden'  name='tickets' value='$tickets'>
                    <input type='hidden'  name='pid' value='$pid'>
                    <input type='hidden'  name='rid' value='$rid'>
                    <input type='hidden'  name='seats' value='$seats'>
                    <input type='hidden'  name='status' value='booked'>

                </div>
                <div class='bdgrey mgb'>
                    <p class='no-margin'>CVV</p>
                    <input type='text' name='cvv' id='' class='inputWidth' placeholder='123'>
                </div>
        </div>
        <div class='btnContainer'>
            <input type='submit' value='Pay NGN $totalfare' class='paybtn'>
        </div>
    </form>    
</div>
</div>
";
}




 else if($mode_sel == 2 && $tickets <= $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '')
{

echo"<div>
<center><font face='' font size='5' color=''>Complete Your Payment</font></center>
</div>
";


$sql="INSERT INTO passenger(pid,name,email,mob )
VALUES ('$pid','$name','$email_id','$mob')";

	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$fare='';
$totalfare='';
$sql = "SELECT fare from route where rid ='$rid' " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$fare =$row['fare'];

}
$totalfare=$fare*$tickets;

echo"<p ><center><br><br>Total Amount :
&#8358;&#160;"."$fare "."  * "."$tickets "." seat(s) = &#8358;    "."$totalfare "."<br></center></p>";


echo"<form action='paynb.php' method='post'>
<center><div class='transbox'><br><br>
<font face='' font size='6' color='black'>Select Bank&#160;:</font>
<select name='bank' >
<option value='SBI'>SBI</option>
<option value='CBN'>CBN</option>


</select>
<br><br>

<center>
<font face='' font size='6' color='black'>username</font>
<input type='text' name='uname'>
<br><br>
<font face='' font size='6' color='black'>password</font>
<input type='password' name='password'>
<input type='hidden'  name='tickets' value='$tickets'>
<input type='hidden'  name='pid' value='$pid'>
<input type='hidden'  name='rid' value='$rid'>
<input type='hidden'  name='status' value='booked'>

<br><br>
<br></center>
<center>
<input type='submit' value='Go'></center>
</p>
</div></center></f>
</form>
<br><br><br><br><br><br><br><br><br><br><br>


";
}






else if($mode_sel == 1  && $tickets > $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '' )
{

echo" <div> <p face='' font size='5' color=''>Oops.. Only " .$row['avalseats'] . " seats are Available in selected Bus... </p></div> ";
}


else if($mode_sel == 2  && $tickets > $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '')
{

echo"<div> <p face='' font size='5' color=''>Oops.. Only " .$row['avalseats'] . " seats are Available in selected Bus... </p> </div>";
}







else
{

echo "

    <div>
        <center>
            <p> Invalid Payment Option  </p>
            <p font size='5' color=''>or<br> You have not selected any Bus Route</p>
            <p face='' font size='5' color=''>or<br> Fill the Form Correctly</p>
        </center>
    </div>

";



}







mysqli_close($con);
?>




<br>

<br><br><br>
        <div class="bottomBodyContainer">

        </div>
    </body>
</html>
