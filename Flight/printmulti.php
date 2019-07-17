<html>

<head>

<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="src/jquery.js" type="text/javascript"></script>


<title> Flight </title>
</head>

<body>


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

<?php
$con=mysqli_connect("localhost","root","","flight");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$pnr='';

$apnr=$_POST['pnr'];


if (empty($apnr))
{
echo("plz select");
}


else
{
$n=count($apnr);
$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$apnr[0]' and reserves.rid=route.rid " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);

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

    <div class='flexjust flex mgb1'>
       
       <div class='pasContainer'>
           <div class='paschild'>Name : ". $row['name'] . "</div>
       </div>
       <div class='pasContainer'>
          <div class='paschild'>Email: ". $row['email'] . "</div>
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
       
       
    </div>
</div>
</div>
";



for ($i=0; $i<$n; $i++)
{

$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$apnr[$i]' and reserves.rid=route.rid " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);


}


}


mysqli_close($con);
?>


</body>
</html>
