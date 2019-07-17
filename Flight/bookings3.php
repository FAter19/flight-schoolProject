<html>

<head>
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />

<title> Flight </title>
</head>
<style>

/* 

n{


color:white;
font-size:20px;

background-color:#f28858;
height:220px;
width:100%;
position:absolute;
    left:0px;
}



nav {



	background-color:#f28858;
	height: 40px;
	width: 1345px;
	position:absolute;
        top:97;
         right:0px;
}

nav ul{
list-style-type:none;
float:right;
}
nav li{
float:left;
margin-right:12px;
}

div{
position:absolute;
top:200px;
right:80px;

border:1px solid black;
background:skyblue;
width:400px;
border-radius:15px;
}

pub{

text-align:center;

background-color: blue;

position:absolute;
	height: 40px;
	width: 100px;
        top:145;
        left:350px;
}


puk{

text-align:center;

background-color: blue;

position:absolute;
	height: 59px;
	width: 270px;
        top:155;
        left:550px;
}


body
{
background-color:white;
}


pub{

text-align:center;

background-color: blue;

position:absolute;
	height: 40px;
	width: 900px;
        top:145;
        left:230px;
}


pun{

text-align:center;

background-color: blue;

position:absolute;
	height: 40px;
	width: 550px;
        top:145;
        left:360px;
}

crt{

text-align:center;




font-family:Britannic;
background-color:skyblue;
position:absolute;
	height: 60px;
	width: 480px;
        top:150px;
       left:430px;

}


crt{

text-align:center;
font-family:Britannic;
background-color:red;
position:absolute;
	height: 40px;
	width: 580px;
        top:150px;
       left:370px;

}



bk{
border: 2px solid black;
border-radius: 6px;
text-align:center;

background-color:blue;


	height: 40px;
	width: 480px;
position:absolute;
        top:250px;
       left:430px;

}

nw
{
border: 1px solid blue;
border-radius: 6px;
text-align:center;

background-color:lightgreen;
height: 40px;
width: 320px;
position:absolute;
        top:380px;
       left:505px;

} */

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
				
						.paycardContainer2 {
										/* border: 1px solid #000; */
										box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
										max-width: 40rem;
										padding: 4rem 3rem;
										margin: 10rem auto;
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
													<div class="navLinkBox"><a href="cancellation.html" class="navLink ">Cancellation</a></div>
													<div class="navLinkBox"><a href="print.html" class="navLink">Print Ticket</a></div>
													<div class="navLinkBox"><a href="contact.html" class="navLink">Contact Us</a></div>
												 <!-- navLinkActive -->
										 </div>
				</div>
	</div>
</div>





<br><br><br><br><br><br><br><br>


<?php
$con=mysqli_connect("localhost","root","","flight");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$email='';
$mob='';

if (isset($_POST['email']))
{
$email=$_POST['email'];
}


if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}


$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid   ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$row=mysqli_fetch_array($retval);


if ($row['pnr'] != ''  )
{


$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='booked'  ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$row=mysqli_fetch_array($retval);

if ($row['pnr'] != ''  )
{


$count=0;
echo "
<div>
	<center><font face='' font size='5' >Your Tickets</font>
	</center>
</div>
<br><br><br>

<center><table border='3' style='border-color: green; cellspacing='11' cellpadding='11'>
<tr>
<th border='2'>select</th>
<th border='2'>Route id</th>
<th border='2'>Bus id</th>
<th border='2'>Ticket number</th>

<th border='2'>From</th>
<th border='2'>To</th>
<th border='2'>Journey Date</th>
<th border='2'>Time</th>

<th border='2'>Fare(&#8358;)</th>
<th border='2'>Status</th>


</tr border='2'>";

$sql = "SELECT * FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='booked' ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo"<center><form action='printmulti.php' method='post'><input type='submit'  value='print selected'></center><br>";
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$count=1;
 echo "<tr>";

echo "<td border='2'> <center><input type='checkbox'  name='pnr[]'  value=". $row['pnr']."</form></center></td>";
echo "<td border='2'><center>". $row['rid']."</center></td>";
echo "<td border='2'><center>". $row['bid']."</center></td>";
echo "<td border='2'> <center>". $row['pnr']."</center></td>";


echo "<td border='2'><center>" . $row['fromLoc']. "</center></td>";

echo "<td border='2'><center>". $row['toLoc']."</center></td>";

echo "<td border='2'><center>" . $row['dep_date']."</center> </td>";

echo "<td border='2'><center>". $row['dep_time']."</center></td>";

// echo "<td border='2'><center>" . $row['arr_time']. "</center></td>";

echo "<td border='2'><center>". $row['fare']."</center></td>";
echo "<td border='2'><center>". $row['status']."</center></td>";

echo "</tr border='2'>";
}
echo "</center></table>


<br><br><p>
<br><br><br><br><br><br>";
}
else
{

$sql = "SELECT * FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='cancelled' ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

echo "<pub><font face='Cursive' font size='5' color='yellow'>Currently You Don't have Any Booked Tickets, Here  is your cancelled Tickets.</font></pub>
<br><br><br>";
echo "<center><table border='3' style='border-color: green; cellspacing='13' cellpadding='13'>
<tr>

<th border='2'>Route_id</th>
<th border='2'>Bus_id</th>
<th border='2'>PNR</th>
<th border='2'>From</th>
<th border='2'>To</th>
<th border='2'>Journey Date</th>
<th border='2'>Time</th>
<th border='2'>Fare(&#8358;)</th>
<th border='2'>Status</th>


</tr border='2'>";



while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$count=1;
 echo "<tr>";
echo "<tr border='2'>";




echo "<td border='2'> <center>". $row['rid']."</center></td>";
echo "<td border='2'><center>". $row['bid']."</center></td>";
echo "<td border='2'> <center>". $row['pnr']."</center></td>";
echo "<td border='2'><center>" . $row['fromLoc']. "</center></td>";

echo "<td border='2'><center>". $row['toLoc']."</center></td>";

echo "<td border='2'><center>" . $row['dep_date']."</center> </td>";

echo "<td border='2'><center>". $row['dep_time']."</center></td>";

// echo "<td border='2'><center>" . $row['arr_time']. "</center></td>";

echo "<td border='2'><center>". $row['fare']."/-</center></td>";
echo "<td border='2'><center>". $row['status']."</center></td>";


echo "</tr border='2'>";
}
echo "</center></table><p>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

";

}





}

else if ( $email ==  ''  && $mob == '')
{
echo "
<pun>
<font face='Cursive' font size='5' color='yellow'>Please Enter Your email id & Mobile Number...</font></a>
</pun>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
";

}




else
{
echo "
<crt>
<font face='Cursive' font size='5' color='yellow'>Please Enter Correct email id Or Mobile Number...</font></a>
</crt>
<br><br><br><center><font face='Cursive' font size='5' color='blue'>OR</font></center> <br>

<bk>
<font face='Cursive' font size='5' color='yellow'>You Have not booked any Tickets yet...</font></a>
</bk>

<nw>
<a href='book.html'><font face='Arial' font size='6' >Book Tickets Now<br></font></a>
</nw>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

";
}


mysqli_close($con);
?>



</body>
</html>
