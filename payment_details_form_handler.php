<?php
	session_start();
	require'new_mysqli.php';
?>
<html>
	<head>
		<title>Submit Payment Details</title>
	</head>
	<body>
		<?php
			if(isset($_POST['Pay_Now']))
			{
				$no_of_pass=$_SESSION['no_of_pass'];
				$f_no=$_SESSION['f_no'];
				$journey_date=$_SESSION['journey_date'];
				$class=$_SESSION['class'];
				$pnr=$_SESSION['pnr'];
				$payment_id=$_SESSION['payment_id'];
				$total_ticket_price=$_SESSION['total_ticket_price'];
				$payment_date=$_SESSION['payment_date'];
				$payment_mode=$_POST['payment_mode'];



				// echo $payment_id;
				// echo $P_id;
				// echo $payment_date;
				// echo $total_ticket_price;
				// echo $payment_mode;

				if($class=='economy')
				{
					$query="UPDATE flights SET seats_economy=? WHERE f_no=? AND journey_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$f_no,$journey_date);
					mysqli_stmt_execute($stmt);
					$affected_rows_1=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_1.'<br>';
					mysqli_stmt_close($stmt);
				}
				else if($class=='business')
				{
					$query="UPDATE flights SET seats_business=? WHERE f_no=? AND journey_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$f_no,$journey_date);
					mysqli_stmt_execute($stmt);
					$affected_rows_1=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_1.'<br>';
					mysqli_stmt_close($stmt);
				}
				// mysqli_stmt_bind_result($stmt,$cnt);
				// mysqli_stmt_fetch($stmt);
				// echo $cnt;
				/*
				$response=@mysqli_query($dbc,$query);
				*/
				if($affected_rows_1==1)
				{
					echo "Successfully Updated Seats<br>";
					$payment_id = 11111;
					$P_id = 956;
					$payment_date = '2019-22-11';
					$total_ticket_price = 56666;
					$payment_mode = 'card bro';

					$query="INSERT INTO payment_details(payment_id,P_id,payment_date,payment_amount,payment_mode) VALUES (?,?,?,?,?)";
        	$stmt=mysqli_prepare($conn,$query);

					mysqli_stmt_bind_param($stmt,"iisis",$payment_id,$P_id,$payment_date,$total_ticket_price,$payment_mode);
					mysqli_stmt_execute($stmt);
					$affected_rows_2=mysqli_stmt_affected_rows($stmt);
					echo $affected_rows_2.'<br>';
					mysqli_stmt_close($stmt);
					if($affected_rows_2==1)
					{
						echo "Successfully Updated Payment Details<br>";
						header('location:ticket_success.php');
					}
					else
					{
						echo "Submit Error1";
						echo mysqli_error($conn);
					}
				}
				else
				{
					echo "Submit Error2";
					echo mysqli_error($conn);
				}
				mysqli_close($conn);
			}
			else
			{
				echo "Payment request not received";
			}
		?>
    <footer>
      <p>RC Trips, Copyright &copy; 2019</p>
    </footer>
	</body>
</html>
