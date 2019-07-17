<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
	<link href='css/font-awesome.css' rel='stylesheet' type='text/css' media='all' />
<link href='css/carousel.css' rel='stylesheet' type='text/css' media='all' />
<link href='css/owl.carousel.css' rel='stylesheet' type='text/css' media='all' />
<script src='js/jquery.js' type='text/javascript'></script>
<script src='js/bootstrap.js' type='text/javascript'></script>
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



<?php
$con=mysqli_connect("localhost","root","","flight");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$num='';
$type='';
$expdate='';
$cvv='';
$bank='';
$tickets='';
$pid='';
$rid='';
$status='';

if (isset($_POST['num']))
{
$num=$_POST['num'];
}

if (isset($_POST['type']))
{
$type=$_POST['type'];
}

if (isset($_POST['expdate']))
{
$expdate=$_POST['expdate'];
}

if (isset($_POST['cvv']))
{
$cvv=$_POST['cvv'];
}

if (isset($_POST['bank']))
{
$bank=$_POST['bank'];
}

if (isset($_POST['tickets']))
{
$tickets=$_POST['tickets'];
}

if (isset($_POST['pid']))
{
$pid=$_POST['pid'];
}

if (isset($_POST['rid']))
{
$rid=$_POST['rid'];
}

if (isset($_POST['status']))
{
$status=$_POST['status'];
}



$sql="select * from card where num='$num'";
$res=mysqli_query($con, $sql);
if(!$res)
{
die('Error:' . mysql_error());
}


$row=mysqli_fetch_array($res);

if ($row['type'] == $_POST['type'] &&    $row['expdate'] == $_POST['expdate'] &&    $row['cvv'] == $_POST['cvv']    && $row['bank'] == $_POST['bank']  )
{

for ( $i = 0; $i < $tickets; $i++){

$sqll="INSERT INTO reserves(pid,rid,status) VALUES ('$pid','$rid','Booked')";

if (!mysqli_query($con,$sqll))
{
	die('Error: ' . mysqli_error($con));
}

}


echo"


<script>
$(document).ready(function() {

	var owl = $('#owl-demo');

	owl.owlCarousel({

	items :4, //10 items above 1000px browser width
	itemsDesktop : [1000,4], //5 items between 1000px and 901px
	itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
	itemsTablet: [600,2], //2 items between 600 and 0;
	itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option

	});

	// Custom Navigation Events
	$('.next').click(function(){
		owl.trigger('owl.next');
	})
	$('.prev').click(function(){
		owl.trigger('owl.prev');
	})

});
</script>
<script type='text/javascript'>
// Login Form
$(function() {
	var button = $('#loginButton');
	var box = $('#loginBox');
	var form = $('#loginForm');
	button.removeAttr('href');
	button.mouseup(function(login) {
			box.toggle();
			button.toggleClass('active');
	});
	form.mouseup(function() {
			return false;
	});
	$(this).mouseup(function(login) {
			if(!($(login.target).parent('#loginButton').length > 0)) {
					button.removeClass('active');
					box.hide();
			}
	});
});
</script>
</head>
<body>
<!-- Start Header -->
	 
				 <div class='header-top-right'>
			<ul>

								<li><a href ='faq.html'><i class='fa fa-comments'></i>FAQs</a></li>
<li><a href ='support.html'>Support</a></li>
								 <li><a href ='tc.html'>Terms & Conditions</a></li><li><a href='admin.html'>Admin</a></li>
						 </ul>
				</div>
				<div class='clear'></div>
			 </div>
			</div>
				 
<!-- End Header -->

<!-- Start Main Content -->


<pub>
<font face='Impact' font size='7' color='green'>Payment Successful...</font>
</pub>

<pubb>
<font face='Gunplay' font size='6' color='yellow'>Thank you...</font>

<font face='Gunplay' font size='6' color='yellow'>For Visiting Our Website...<br><br></font>
</pubb>

<bk>
<a href='index.html'><font face='Arial' font size='6' >Book Another Ticket<br></font></a>
</bk>"

;


echo"
<div class='tckt'>

<form action='ticket.php' method='post'>
<input type='hidden'  name='pid' value= '$pid' >
<input type='hidden'  name='tickets' value= '$tickets' >
<input type='submit' value='Your Tickets'>
</form></div>";

echo"
<div class='bottomBodyContainer'>

</div>
";




}

else {
header("Location:fail.html");
}


mysqli_close($con);
?>


	</body>
</html>