<?php
	session_start();
?>
<html>
	<head>
		<title>Add Ticket Details</title>
	</head>
	<body>
		<?php
			$i=1;
			if(isset($_POST['Submit']))
			{
				$pnr=rand(1000000,9999999);
				$f_no=$_SESSION['f_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$booking_status="PENDING";
				$no_of_pass=$_SESSION['no_of_pass'];
				$_SESSION['pnr']=$pnr;

				$payment_id=NULL;
				$P_id=$_SESSION['P_id'];

				require'new_mysqli.php';

				if($_SESSION['class']=='economy')
				{ 
					$query="SELECT price_economy FROM flights where f_no=? and journey_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$f_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				else if($_SESSION['class']=='business')
				{
					$query="SELECT price_business FROM flights where f_no=? and journey_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$f_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				mysqli_stmt_close($stmt);

				$query="INSERT INTO ticket_details (pnr,f_no,journey_date,class,booking_status,no_of_passengers,payment_id,P_id) VALUES (?,?,?,?,?,?,?,?)";
				$stmt=mysqli_prepare($conn,$query);
				mysqli_stmt_bind_param($stmt,"ssssssisssss",$pnr,$f_no,$journey_date,$class,$booking_status,$no_of_pass,$payment_id,$P_id);
				mysqli_stmt_execute($stmt);
				$affected_rows=mysqli_stmt_affected_rows($stmt);
				echo $affected_rows.'<br>';
				// mysqli_stmt_bind_result($stmt,$cnt);
				// mysqli_stmt_fetch($stmt);
				// echo $cnt;
				/*
				$response=@mysqli_query($dbc,$query);
				*/
				if($affected_rows==1)
				{
					echo "Successfully Submitted<br>";
				}
				else
				{
					echo "Submit Error";
					echo mysqli_error();
				}


					$query="INSERT INTO passengers (P_id,f_name,l_name,gender,age,ph_no,email,f_no) VALUES (?,?,?,?,?,?,?,?)";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ississs",$i,$_POST['pass_f_name'][$i-1],$_POST['pass_l_name'][$i-1],$_POST['pass_gender'][$i-1],$_POST['pass_age'][$i-1],$_POST['pass_ph_no'][$i-1],$_POST['pass_email'][$i-1],$f_no);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					echo 'Passenger added '.$affected_rows.'<br>';
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
				}

				mysqli_stmt_close($stmt);
				mysqli_close($conn);

				header("location: payment_details.php");

			// else
			// {
			// 	echo "Submit request not received";
			// }
		?>
		<footer>
			<p>RC Trips, Copyright &copy; 2019</p>
		</footer>
	</body>
</html>
