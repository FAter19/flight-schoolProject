<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <!-- <link rel="stylesheet" href="css/busList.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,900" rel="stylesheet">
    <script type="text/javascript" src="src/seatchart.js"></script>
    <!-- <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" /> -->
    <script src="src/jquery.js" type="text/javascript"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <title>Flight | Buses</title>
</head>
<style>
/* 
pub{
text-align:center;
background-color: blue;
position:absolute;
	height: 40px;
	width: 400px;
  top:145;
  left:200px;
}

puk{
text-align:center;
background-color: blue;
position:absolute;
height: 80px;
width: 550px;
top:145;
left:200px;
}

pud{
text-align:center;
background-color: blue;
position:absolute;
height: 40px;
width: 540px;
top:145;
left:200px;
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


.bus_container {
  border-radius: 1rem;
  /* border: 1px solid #000; */
  background: #fff;
  max-width: 70rem;
  margin: 6rem auto;
  padding: 2rem;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
}

.bus_detail2 {
  margin: .5rem 0 0 0;
  justify-content: space-between;
  align-items: center;
  text-align: center;
}
.buslister {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin: 10rem 0 0 0;
}

    
.holder{    
height:210px;    
width:400px;
background:#F5F5F5;
/* border:1px solid #A4A4A4; */
margin:10px auto;   
}
.place {
position:relative;
margin:7px;
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
}
.place a{
font-size: .8em;
}
.place div
{
 /* list-style: none outside none; */
 /* margin: 1rem; */
 
 position: absolute;   
}    
.place div:hover
{
background-color:rgb(255, 255, 1); 
} 
.place .seat{
background:url("img/available_seat_img.gif") no-repeat scroll 0 0 transparent;
height:45px;
width:45px;
margin: 10px;
display:block; 
cursor: pointer;  

}
.place .selectedSeat
{ 
background-image:url("img/booked_seat_img.gif");
/* background: rgb(248, 248, 248); */
cursor: not-allowed;          
}
.place .selectingSeat
{ 
background-image:url("img/selected_seat_img.gif"); 
cursor: pointer;         
}
.place .row-3, .place .row-4{
margin-top:10px;
}
.seatDescription {
    margin: 30px 0;
    display: flex;
    justify-content: flex-start;
}
.seatDescription div{
/* verticle-align:middle;     */
list-style: none outside none;
padding-left:35px;
height:35px;
float:left;
}

.seatpic {
    width: 50%;
    height: 70%;
}

.disabled_input {
  -webkit-appearance: textfield;
    background-color: white;
    -webkit-rtl-ordering: logical;
    cursor: default;
    padding: 1px;
    border-width: 2px;
    border-style: inset;
    border-color: initial;
    border-image: initial;
    border: 1px solid #a9a9a9;
}

</style>


  <body>
    
    <div class="bodyContainer">

      
  <!-- <img src="img/beverage-computer-flower-9488882.jpg" alt="" srcset=""> -->
  
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




<?php
$con=mysqli_connect("localhost","root","","flight");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL fATER: " . mysqli_connect_error();
  }

$sql="UPDATE route  SET avalseats = maxseats-(select count(rid) from
reserves where rid=route.rid and status='booked' )   ";



	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$sql="DELETE FROM  today";
if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}
$sql="INSERT INTO  today (tod_time,tod_date) VALUES (CURRENT_TIME, CURRENT_DATE);  ";
if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$sql = "SELECT * FROM today";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$row=mysqli_fetch_array($retval);

$curr_date=$row['tod_date'];

$curr_time=$row['tod_time'];

$from='';
$to='';
$date='';





if (isset($_POST['fromLoc']))
{
$from=$_POST['fromLoc'];

}

if (isset($_POST['toLoc']))
{
$to=$_POST['toLoc'];
}

if (isset($_POST['dep_date']))
{
$date=$_POST['dep_date'];
}


if ( $date !=  '' && $from != $to  && $date > $curr_date  )
{

$count=0;
$sql="select *from bus,route where route.bid=bus.bid  and route.fromLoc='$from ' and route.toLoc= '$to' and route.dep_date='$date ' ";


$retval=mysqli_query($con,$sql);

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$row=mysqli_fetch_array($retval);
if ($row['rid'] != '' )
{

echo"
    <div class='buslister'>
        <font face='' font size='5' color=''>Available Bus(es)</font></a>
        <font face='' font size='3' color='Black'><br>
        
        For $from to $to on $date </font><br>
    </div>

 ";





echo " ";

$count=0;
$sql="select * from bus,route where route.bid=bus.bid  and route.fromLoc='$from ' and route.toLoc= '$to' and route.dep_date='$date ' ";


$retval=mysqli_query($con,$sql);

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{
	$count=1;



  // <!-- <div>".'Sleeper: '. $row['type_sl']."</div> -->

echo "<div class='bus_container'> ";
echo  "<div>".'Route id: '. $row['rid']."</div>";
echo"       <div>".'Bus: '. $row['bname']."</div>";
echo"       <div>" .'Departure Time: '. $row['dep_time']."</div>";
echo"      <div class='flex bus_detail2'>";
echo"         <div>"."<div>".'A/C '."</div>". $row['type_ac']."</div>";
echo"         <div>" ."<div>".'Amount '."</div>".'#'. $row['fare']. "</div>";
echo"          <div>" ."<div>".'Avaliable seat '."</div>". $row['avalseats'].' / '.$row['maxseats']. "</div>";
         echo" <div><p>Select</p><form action='selectedbus.php' method='post'><input type='radio'  name='rid' value=". $row['rid']." </div>";
         echo" </div>";
        // <div></div>
        
     echo" </div>";
      
      // <!-- <div border='1px solid red'>-->
      echo" <div class='holder'> ";
       echo" <div  class='place'>";
          
          
       echo"  </div> ";   
       echo"</div>
  <div style='float:left;'> 
  <div class='seatDescription'>
      <div><div><img src='img/available_seat_img.gif' alt=''></div><div>Available Seat</div></div>
      <div> <div><img src='img/booked_seat_img.gif' alt=''></div><div>Booked Seat</div></div>
      <div> <div><img src='img/selected_seat_img.gif' alt=''></div><div>Selected Seat</div></div>
  </div>
  </div>
      <div style='clear:both;width:100%'>
      <input type='button' class='btnShowNew' value='Show Selected Seats' />
      <input type='button' class='btnShow' value='Show All' />           
      </div>
        
        
      ";

echo "</div>"; }
echo "</div>";
}

else
{
echo "
<pub>
<font face='Cursive' font size='5' color='yellow'>Sorry!  No Buses Available...</font>
</pub><font face='Gunplay' font size='4' color='Black'><br> <br> <br>

For<br>

 $from To $to
<br>
on
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;
&#160;&#160;&#160;
 $date </font><br>
";

}

}



else if ( $date !=  ''  && $from != $to   && $date == $curr_date)
{

$count=0;
$sql="select *from bus,route where route.bid=bus.bid  and route.fromLoc='$from ' and route.toLoc= '$to' and route.dep_date='$date ' and route.dep_time >  '$curr_time' ";


$retval=mysqli_query($con,$sql);

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$row=mysqli_fetch_array($retval);
if ($row['rid'] != '')
{

echo"  <pub>
<font face='Cursive' font size='5' color='yellow'>Available Buses</font></a>
</pub>
<font face='Gunplay' font size='4' color='Black'><br> <br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
For<br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
 $from To $to
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
on
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;
&#160;&#160;&#160;
 $date </font><br> ";





echo "<table border='3' style='border-color: green; cellspacing='8' cellpadding='8'>
<tr>

<th border='2'><form action='buslist.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'>
<input type='submit' value='Route_id' ></form>
</th>

<th border='2'><form action='sortYbname.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'>
<input type='submit' value='Bus' ></form>
</th>

<th border='2'>
<form action='sortYdtimeA.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'>
<input type='submit' value='Dep_Time' ></form>
</th>

<th border='2'><form action='sortYatime.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Arr_Time' ></form>
</th>

<th border='2'><form action='sortYadate.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Arr_date' ></form>
</th>

<th border='2'><form action='sortYac.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='AC' ></form>
</th>

<th border='2'>
<form action='sortYsl.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Sleeper' ></form>
</th>

<th border='2'><form action='sortYfare.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Fare(&#8358;)' ></form>
</th>

<th border='2'><form action='sortYavl.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Available' ></form>
</th>

<th border='2'>Select
</th>


</tr border='2'>";

$count=0;
$sql="select *from bus,route where route.bid=bus.bid  and route.fromLoc='$from ' and route.toLoc= '$to' and route.dep_date='$date ' ";


$retval=mysqli_query($con,$sql);

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{
	$count=1;





echo "<td border='2'> <center>". $row['rid']."</center></td>";
echo "<td border='2'> <center>". $row['bname']."</center></td>";

echo "<td border='2'><center>" . $row['dep_time']."</center> </td>";

echo "<td border='2'><center>" . $row['arr_time']."</center> </td>";
echo "<td border='2'><center>" . $row['arr_date']."</center> </td>";

echo "<td border='2'> <center>". $row['type_ac']."</center></td>";

// echo "<td border='2'><center>". $row['type_sl']."</center></td>"; 

echo "<td border='2'><center>" . $row['fare']. "</center></td>";

echo "<td border='2'><center>" . $row['avalseats']. "</center></td>";

echo "<td border='2'><center><form action='selectedbus.php' method='post'><input type='radio'  name='rid' value=". $row['rid']." </center></td>";




echo "</tr border='2'>"; }
echo "</table><p>";
}

else
{
echo "
<pub>
<font face='' font size='5' color=''>Sorry!  No Buses Available...</font>
</pub><font face='Gunplay' font size='4' color='Black'><br> <br> <br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
For<br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

 $from To $to
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
on
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;
&#160;&#160;&#160;
 $date </font><br>
";

}

}




else if ( $date !=  ''  && $from == $to  && $date >= $curr_date )
{
echo "
<puk>
<font face='Cursive' font size='5' color='yellow'>Source and Destination Can't be same...
<br> Please Enter Different Source & destination</font></a>
</puk>


";

}
else if ( $date !=  ''  && $from == $to  && $date < $curr_date )
{
echo "
<puk>
<font face='Cursive' font size='5' color='yellow'>Source and Destination Can't be same...
<br> Please Enter Different Source & destination</font></a>
</puk>


";


}


else if ( $date !=  ''  && $from != $to  && $date < $curr_date)
{
echo "
<pud>
<font face='Cursive' font size='5' color='yellow'>Journey Date must be on or after ".$curr_date."</font></a>
</pud>


";


}


else
{
echo "
<pub>
<font face='Cursive' font size='5' color='yellow'>Invalid Date</font></a>
</pub>


";

}
mysqli_close($con);
?>


<form action="selectedbus.php" method="post">
<div class="transbox">

<center>
<font face="Impact" font size="6" color="Maroon"><u>Fill Your Details</u></font><br>
<br>

<br></center>
<font>Seat number</font>
<!-- <select  -->
<input type='text' name="seats" id='seats' disabled class='disabled_input'>

<!-- <font>Number of tickets:</font> -->
<!-- <select  -->
<input type='hidden' name="tickets" id="tickets" value='tickets' class='disabled_input'>

<br><center>
<br><font>Name:</font>
<input type= "text" name="name">
<br>
<br></center>
<center>
<font>Email:</font>
<input type= "email" name="email_id">
<br>

<br>
</center><center>
<font>Mobile &#160;:</font>
<input type= "number" name="mob" minlength="11" maxlength= "11">
<br>
<br><br></center>
<center>
<font face="Script MT" font size="6" color="Maroon"><u>Select Payment Mode</u></font><br><br>
<input type="radio" name="mode" value="1"><font>Debit & Credit Card</font><br>
<input type="radio" name="mode" value="2"><font>Net Banking&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</font><br><br>
</center>




<center>
<input type="submit" value="Book Now"></center>
</p>
</div></form>
</form>

    </div>

    <script src="src/busout.js"></script>
    
  </body>
</html>
