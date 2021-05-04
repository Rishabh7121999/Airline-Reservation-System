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
    <title>RC Trips | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">

		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color:#35424a;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 127px
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 75.5px;
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


    <form action="view_flights_form_handler.php" method="post" align="center">
			<h2>SEARCH FOR AVAILABLE FLIGHTS</h2>
			<table cellpadding="5" align="center">
				<tr>
					<td class="fix_table">Enter the Source</td>
					<td class="fix_table">Enter the Destination</td>
				</tr>
				<tr>
					<td class="fix_table">
						<input list="origins" name="origin" placeholder="From" required>
  						<datalist id="origins">
  						  	<option value="Mumbai">
                  <option value="Lucknow">
                  <option value="Chennai">
                  <option value="Kolkata">
                  <option value="Bengaluru">
  						</datalist>
						<!-- <input type="text" name="origin" placeholder="From" required> --></td>
					<td class="fix_table">
						<input list="destinations" name="destination" placeholder="To" required>
  						<datalist id="destinations">
  						  	<option value="Mumbai">
  						  	<option value="Lucknow">
  						  	<option value="Bengaluru">
  						  	<option value="Chennai">
  						  	<option value="Kolkata">
                  <option value="Ahmedabad">
  						</datalist>
						<!-- <input type="text" name="destination" placeholder="To" required> --></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5" align="center">
				<tr>
					<td class="fix_table">Enter the Departure Date</td>
					<td class="fix_table">Enter the No. of Passengers</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="date" name="dep_date" min=
						<?php
							$todays_date=date('Y-m-d');
							echo $todays_date;
						?>
						max=
						<?php
							$max_date=date_create(date('Y-m-d'));
							date_add($max_date,date_interval_create_from_date_string("90 days"));
							echo date_format($max_date,"Y-m-d");
						?> required></td>
					<td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5" required></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5" align="center">
				<tr>
					<td class="fix_table">Enter the Class</td>
				</tr>
				<tr>
					<td class="fix_table">
						<select name="class">
  							<option value="economy">Economy</option>
  							<option value="business">Business</option>
  						</select>
  					</td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Book Your Flight" name="Search">
		</form>


		<!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
		-->
    <footer>
      <p>RC Trips, Copyright &copy; 2019</p>
    </footer>
	</body>
</html>
