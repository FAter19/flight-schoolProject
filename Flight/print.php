<html>

<head>
	<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="src/jquery.js" type="text/javascript"></script>

<title> Flight </title>
</head>

<style>

		.ticketlogo img {
			height: 4%;
			width: 10%;
		}

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

						.ticketDetailContainer2 {
							box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
							background: #fff;
							margin: 6rem auto;
							width: 65rem;
							border-radius: 1rem;
							padding: 3rem;
						}

						.flexjust {
							justify-content: space-between;
						}
						.flexjust2 {
							justify-content: flex-start;
						}

						/* .ticketNumberContainer,.busidContainer,.fromContainer,
						.dateContainer,.timeContainer,.costContainer,.statusContainer,
						.cancelContainer,.printContainer {
								margin: 0 1rem;
								justify-content: center;
						} */

						.fromContainer2 {
							margin: 0 1rem;
						}

						.pasinfo {
							border: none;
							border-bottom: 1px solid #000000;
							width: 36rem;
							font-size: 1.6rem;
						}

						.phoneinfo {
							width: 20rem;
							
						}

						.pascontainer:nth-child(2) {
							margin-left: 3rem;
						}
						.paschild {
							margin-bottom: 1rem;
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
$con=mysqli_connect("localhost","root","","flight");// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }






$pnr='';
$mob='';

if (isset($_POST['pnr']))
{
$pnr=$_POST['pnr'];
}

if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}

$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$pnr' and mob ='$mob' and reserves.rid=route.rid " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
echo " ticket number doesn't exists";
}
$row=mysqli_fetch_array($retval);
if ($row['mob'] == $_POST['mob'] &&  $pnr != '' && $mob!= '')
{

echo"

<puk>
<font face='Impact' font size='9' color='yellow'>Your Ticket</font>
</puk>

<br><br><br>
<center><table border='3' style='border-color: black; cellspacing='11' cellpadding='11' ;'width =70%'><h2>

<tr><th>PNR :<th> " .$pnr . " <th>Name :<th> ". $row['name'] . "</tr>
<tr><th>Date :  <th>". $row['dep_date'] . "<th>Mobile :<th> ". $row['mob'] . "</tr>


<tr><th>Time : <th>". $row['dep_time'] ."<th>Email : <th>". $row['email'] . "  </tr>
<tr><th>Bus_id : <th>". $row['bid'] . "<th>Status<th> <font face='Franklin Gothic' font size='4' color='red'>". $row['status'] . "</font></tr>
<tr><th>". $row['fromLoc'] . "    <th>to&#160;&#160; ". $row['toLoc'] . "
<th>Fare :<th>&#8377;&#160;". $row['fare'] . "/-</tr>

</table>

<br><form action='printmulti.php' method='post'><input type='hidden'  name='pnr[]'  value=". $row['pnr']."</form><input type='submit' value='print'>

</center>"
;

echo"
<div class='ticketDetailContainer2'>
<div class='ticketlogo'>
<img src='img/72ppi/Flight logo.png' alt='' srcset=''>
</div>
<!-- other details -->
<div class=''>
				
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



				<div class='flexjust flex'>
					 <div class='flex'>
					 		<div class='fromContainer'>
					 			<p>From: " . $row['fromLoc']. "</p>
				 			</div>
				 			<div class='fromContainer2'>
					 			<p>to ". $row['toLoc']."</p>
				 			</div>
					 </div>
					 <div class='costContainer'>
							 <p>Cost: &#8358;". $row['fare']."</p>
					 </div>
				</div>

				<div class='flexjust2 flex mgb1'>
					 
					 <div class='pasContainer'>
							 <div class='paschild'>Name:</div>
								<input type='text' class='pasinfo' placeholder='Passager name'>
					 </div>
					 <div class='pasContainer'>
							<div class='paschild'>Phone no.:</div>
							<input type='text' class='pasinfo phoneinfo' placeholder='Passager phone number'>
						</div>
				</div>
				
				<div class='flexjust flex mgb1'>
					 <div class='dateContainer'>
						 <p>Date: " . $row['dep_date']."</p>
					 </div>
					 
					 
					 <div class='statusContainer'>
							 <p>Status: ". $row['status']."</p>
					 </div>
				</div>
				<div class='flexjust flex'>
					 
					 <div class='printContainer'>
									 <form action='print.php' method='post'><input type='hidden'  name='pnr' value=". $row['pnr']."><input type='hidden'  name='mob' value=".$row['mob']."><input type='submit' value='print' class='printbtn'></form>
					 </div>
				</div>
		</div>
</div>
";


}

else
{
echo "

<pub>
<font face='Bernard MT' font size='6' color='yellow'>Invalid PNR Or Mobile number</font></a>
</pub>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
";

}




mysqli_close($con);
?>




<br><br><br><br>



</body>
</html>
