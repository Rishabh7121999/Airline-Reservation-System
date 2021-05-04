<?php
	session_start();
?>
<html>
	<head>
		<title>
			Ticket Booking Successful
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 127px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>

    <header>
      <div class="container"> <!-- To contain elements -->
        <div id="branding">
          <h1><span class="highlight">RC</span> Trips</h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="booking.php">Ticket Booking</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="Services.php">Services</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <nav>

		<h2>BOOKING SUCCESSFUL</h2>
		<h3>Your payment of &#x20b9; <?php echo $_SESSION['total_ticket_price']; ?> has been received.<br><br> Your PNR is <strong><?php echo $_SESSION['pnr'];?></strong>. Your tickets have been booked successfully.</h3>
		<!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
		-->
		<footer>
			<p>RC Trips, Copyright &copy; 2019</p>
		</footer>
	</body>
</html>
