<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
	<script src="src/jquery.js" type="text/javascript"></script>
	<title> Flight </title>
</head>
	<body>
		


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
						.mgb1 {
							margin-bottom: 2rem;
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
						.canbtn {
								padding: 1rem;
								width: 100%;
								background: rgb(211, 37, 37);
								color: #FFF;
								border: none;
								border-radius: .4rem;
								font-size: 1.4rem;
								letter-spacing: 1px; 
						}

						.printbtn {
								padding: 1rem;
								width: 100%;
								background: rgb(0, 0, 0);
								color: #FFF;
								border: none;
								border-radius: .4rem;
								font-size: 1.4rem; 
								letter-spacing: 1px;
						}

						.ticketDetailContainer {
							box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
							background: #fff;
							margin: 6rem auto;
							width: 60rem;
							border-radius: 1rem;
							padding: 2rem;
						}

						.flexjust {
							justify-content: space-between;
						}

						.ticketNumberContainer,.busidContainer,.fromContainer,
						.dateContainer,.timeContainer,.costContainer,.statusContainer,
						.cancelContainer,.printContainer {
								margin: 0 1rem;
								justify-content: center;
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


$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid   ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$row=mysqli_fetch_array($retval);


if ($row['pnr'] != ''  )
{


$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='Booked'  ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$row=mysqli_fetch_array($retval);

if ($row['pnr'] != ''  )
{

// $count=0;
echo "
<div>
	<center><font size='5'>Your Tickets</font></center>
</div>
";

// echo "<div class='ticketDetailContainer'>

//  <div class='flex'>
// 		 <div class='ticketNumberContainer'>
// 				 <p>Ticket Number</p>
// 		 </div>
// 		 <div class='busidContainer'>
// 				 <p>Bus ID</p>
// 		 </div>
// 		 <div class='fromContainer'>
// 				 <p>From</p>
// 		 </div>
// 		 <div class='fromContainer'>
// 				 <p>To</p>
// 		 </div>
// 		 <div class='dateContainer'>
// 				 <p>Date</p>
// 		 </div>
// 		 <div class='timeContainer'>
// 				 <p>Time</p>
// 		 </div>
// 		 <div class='costContainer'>
// 				 <p>Cost(&#8358;)</p>
// 		 </div>
// 		 <div class='statusContainer'>
// 				 <p>Status</p>
// 		 </div>
// 		 <div class='cancelContainer'>
// 				 <p>Cancel</p>
// 		 </div>
// 		 <div class='printContainer'>
// 				 <p>Print</p>
// 		 </div>
//  </div>";

$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='Booked' ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

// $count=1;
 echo "<div class='ticketDetailContainer'>

 <!-- other details -->
 <div class=''>
				 <div class='flex mgb1'>
						<div class='fromContainer'>
							<p>From: " . $row['fromLoc']. "</p>
						</div>
						<div class='fromContainer'>
							<p>To: ". $row['toLoc']."</p>
						</div>
				 </div>
				 <div class=' flexjust flex mgb1'>
						<div class='ticketNumberContainer'>
								<p>Ticket number: ". $row['pnr']."</p>
						</div>
						<div class='busidContainer'>
								<p>Bus ID: ". $row['bid']."</p>
						</div>
						<div class='timeContainer'>
								<p>Time: ". $row['dep_time']."</p>
						</div>
				 </div>
				 
				 <div class='flexjust flex mgb1'>
						<div class='dateContainer'>
							<p>Date: " . $row['dep_date']."</p>
						</div>
						
						<div class='costContainer'>
								<p>Cost: &#8358;". $row['fare']."</p>
						</div>
						<div class='statusContainer'>
								<p>Status: ". $row['status']."</p>
						</div>
				 </div>
				 <div class='flexjust flex'>
						<div class='cancelContainer'>
							<form action='cancel.php' method='post'><input type='hidden'  name='pnr' value=". $row['pnr'].">
								<input type='hidden'  name='email' value=". $row['email'].">
								<input type='hidden'  name='mob' value=". $row['mob'].">
								<input type='hidden'  name='mob' value='$mob'><input type='hidden'  name='status' value='booked'><input type='submit' value='cancel ticket' class='canbtn'></form>
						</div>
						<div class='printContainer'>
										<form action='print.php' method='post'><input type='hidden'  name='pnr' value=". $row['pnr']."><input type='hidden'  name='mob' value=".$row['mob']."><input type='submit' value='print' class='printbtn'></form>
						</div>
				 </div>
		 </div>
</div>";}
echo "<br><br><br><br><br><br>";
}
else
{

$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='cancelled' ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

echo "<pub><font face='Cursive' font size='5' color='yellow'>Currently You Don't have Any Booked Tickets, Here  is your cancelled Tickets.</font></pub>
<br><br><br>";
echo "<div class='ticketDetailContainer'>

<div class='flex'>
		<div class='ticketNumberContainer'>
				<p>Ticket Number</p>
		</div>
		<div class='busidContainer'>
				<p>Bus ID</p>
		</div>
		<div class='fromContainer'>
				<p>From</p>
		</div>
		<div class='fromContainer'>
				<p>To</p>
		</div>
		<div class='dateContainer'>
				<p>Date</p>
		</div>
		<div class='timeContainer'>
				<p>Time</p>
		</div>
		<div class='costContainer'>
				<p>Cost(&#8358;)</p>
		</div>
		<div class='statusContainer'>
				<p>Status</p>
		</div>
		<div class='cancelContainer'>
				<p>Cancel</p>
		</div>
		<div class='printContainer'>
				<p>Print</p>
		</div>
</div>";



while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$count=1;
 echo "<tr>";
echo "<tr border='2'>";



echo "<td border='2'> <center>". $row['pnr']."</center></td>";

echo "<td border='2'><center>". $row['bid']."</center></td>";

echo "<td border='2'><center>" . $row['fromLoc']. "</center></td>";

echo "<td border='2'><center>". $row['toLoc']."</center></td>";

echo "<td border='2'><center>" . $row['dep_date']."</center> </td>";

echo "<td border='2'><center>". $row['dep_time']."</center></td>";

echo "<td border='2'><center>" . $row['arr_time']. "</center></td>";

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