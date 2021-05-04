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
		<title>Enter Travel/Ticket Details</title>
		<link rel="stylesheet" href="./css/style.css">

		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 10px;
			}
			input[type=number] {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 0px;
			}
			input[type=submit] {
				background-color:#35424a;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 500px;
			}
			input[type=radio] {
    			margin-right: 30px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 15px;
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
            <li class="current"><a href="booking2.php">Ticket Booking</a></li>
          </ul>
        </nav>
      </div>
    </header>

		<?php
		$no_of_pass=$_SESSION['no_of_pass'];
		$class=$_SESSION['class'];
		$count=$_SESSION['count'];
		$f_no=$_POST['select_flight'];
		$_SESSION['f_no']=$f_no;
		// echo $f_no;
		//$pass_name=array();
		echo "<h2 align=\"center\">ADD PASSENGERS DETAILS</h2>";
		echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\" align=\"center\">";
		while($count<=$no_of_pass)
		{
				echo "<p><strong>PASSENGER ".$count."<strong></p>";
				echo "<table cellpadding=\"0\" align=\"center\">";
				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">First Name</td>";
				echo "</tr>";
				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\"><input type=\"text\" name=\"pass_name[]\" required></td>";
				echo "</tr>";

				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">Last Name</td>";
				echo "</tr>";
				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\"><input type=\"text\" name=\"pass_name[]\" required></td>";
				echo "</tr>";

				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">Age</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\"><input type=\"number\" name=\"pass_age[]\" required></td>";
				echo "</tr>";

				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">Gender</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">";
				echo "<select name=\"pass_gender[]\">";
					echo "<option value=\"male\">Male</option>";
					echo "<option value=\"female\">Female</option>";
					echo "<option value=\"other\">Other</option>";
					echo "</select>";
					echo "</td>";
					echo "</tr>";

				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">Phone no</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\"><input type=\"int\" name=\"pass_ph_no[]\" required></td>";
				echo "</tr>";

				echo"<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\">E-mail</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class=\"fix_table_short\" align=\"center\"><input type=\"email\" name=\"pass_email[]\" required></td>";
        echo "</tr>";


				// echo"<tr>";
				// echo "<td class=\"fix_table_short\" align=\"center\">Flight No.</td>";
				// echo "</tr>";
				// echo "<tr>";
				// echo "<td class=\"fix_table_short\" align=\"center\"><input type=\"varchar\" name=\"pass_f_no[]\" required></td>";
				// echo "</tr>";
				//
				// echo "<tr>";
				// echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
				// echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
				// echo "<td class=\"fix_table_short\">";
				// echo "<select name=\"pass_gender[]\">";
				// 	echo "<option value=\"male\">Male</option>";
				// 	echo "<option value=\"female\">Female</option>";
				// 	echo "<option value=\"other\">Other</option>";
				// 	echo "</select>";
				// 	echo "</td>";
				// 	echo "<td class=\"fix_table_short\"><input type=\"int\" name=\"pass_ph_no[]\" required></td>";
				// 	echo "<td class=\"fix_table_short\"><input type=\"email\" name=\"pass_e-mail[]\" required></td>";
				// 	echo "<td class=\"fix_table_short\"><input type=\"varchar\" name=\"pass_flight_no[]\" required></td>";
				// echo "</tr>";
				echo "</table>";

				$count=$count+1;
			}

			echo "<br><br>";
			echo "<input type=\"submit\" align=\"center\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">";
			echo "</form>";
	?>
	<!--Following data fields were empty!
		...
		ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
	-->
	<footer>
		<p>RC Trips, Copyright &copy; 2019</p>
	</footer>

</body>
</html>
