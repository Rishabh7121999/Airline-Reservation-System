<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width"> <!-- device-width is used for responsive website -->
    <meta name="description" content="Affordable and professionl airlines">
    <meta name="keywords" content="airines, professional airlines">
    <meta name="author" content="Rishabh Singh">
    <title>View Available Flights</title>
    <link rel="stylesheet" href="./css/style.css">

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
    			margin: 0px 390px
			}
			table {
			 border-collapse: collapse;
			}
			tr/*:nth-child(3)*/ {
			 border: solid thin;
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
					</ul>
				</nav>
			</div>
		</header>

		<h2>AVAILABLE FLIGHTS</h2>
		<?php
			if(isset($_POST['Search']))
			{
				$data_missing=array();
				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=trim($_POST['dep_date']);
				}
				if(empty($_POST['no_of_pass']))
				{
					$data_missing[]='No. of Passengers';
				}
				else
				{
					$no_of_pass=trim($_POST['no_of_pass']);
				}

				if(empty($_POST['class']))
				{
					$data_missing[]='Class';
				}
				else
				{
					$class=trim($_POST['class']);
				}

				if(empty($data_missing))
				{
					$_SESSION['no_of_pass']=$no_of_pass;
					$_SESSION['class']=$class;
					$count=1;
					$_SESSION['count']=$count;
					$_SESSION['journey_date']=$dep_date;
					// $conn = mysqli_connect("localhost","root","","airline");
         // if($conn){
	                  // echo "<script type='text/javascript'>alert('Database failed');</script>";
  	      //die('Could not connect: '.mysqli_connect_error());
						require'new_mysqli.php';

			 // }
					if($class=="economy")
					{
						$query="SELECT f_no,flight_name,source,destination,journey_date,departure_time,arrival_time,price_economy FROM flights where source=? and destination=? and journey_date=? and seats_economy>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($conn,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$f_no,$flight_name,$source,$destination,$journey_date,$departure_time,$arrival_time,$price_economy);
						mysqli_stmt_store_result($stmt);
						// $k=	mysqli_stmt_num_rows($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"booking2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Flight No.</th>
							<th>Flight Name</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Time</th>
							<th>Price(Economy)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
        						echo "<tr>
        						<td>".$f_no."</td>
										<td>".$flight_name."</td>
        						<td>".$source."</td>
								<td>".$destination."</td>
								<td>".$journey_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_time."</td>
								<td>&#x20b9; ".$price_economy."</td>
								<td><input type=\"radio\" name=\"select_flight\"  value=\"".$f_no."\"></td>
        						</tr>";
    						}
    						echo "</table> <br>";
    						echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
    						echo "</form>";
    					}
					}
					else if($class="business")
					{
						$query="SELECT f_no,flight_name,source,destination,journey_date,departure_time,arrival_time,price_business FROM flights where source=? and destination=? and journey_date=? and seats_business>=? ORDER BY  departure_time";
						$stmt=mysqli_prepare($conn,$query);
						mysqli_stmt_bind_param($stmt,"sssi",$origin,$destination,$dep_date,$no_of_pass);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$f_no,$flight_name,$source,$destination,$journey_date,$departure_time,$arrival_time,$price_business);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3>No flights are available !</h3>";
						}
						else
						{
							echo "<form action=\"booking2.php\" method=\"post\">";
							echo "<table cellpadding=\"10\"";
							echo "<tr><th>Flight No.</th>
							<th>Flight Name</th>
							<th>Origin</th>
							<th>Destination</th>
							<th>Departure Date</th>
							<th>Departure Time</th>
							<th>Arrival Date</th>
							<th>Arrival Time</th>
							<th>Price(Business)</th>
							<th>Select</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
										echo "<tr>
										<td>".$f_no."</td>
										<td>".$flight_name."</td>
										<td>".$source."</td>
								<td>".$destination."</td>
								<td>".$journey_date."</td>
								<td>".$departure_time."</td>
								<td>".$arrival_time."</td>
								<td>&#x20b9; ".$price_business."</td>
								<td><input type=\"radio\" name=\"select_flight\" value=\"".$f_no."\"></td>
										</tr>";
								}
								echo "</table> <br>";
								echo "<input type=\"submit\" value=\"Select Flight\" name=\"Select\">";
								echo "</form>";
    					}
					}
					mysqli_stmt_close($stmt);
					mysqli_close($conn);

					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Search request not received";
			}
		?>
		<footer>
			<p>RC Trips, Copyright &copy; 2019</p>
		</footer>
	</body>
</html>
