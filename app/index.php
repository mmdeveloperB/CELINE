<?php
include "../core/config.php";
if (isset($_SESSION['login'])) {
} else {

	header("LOCATION: /");
}

?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/styles/style.css">
	<link rel="stylesheet" href="/assets/styles/chat.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
	<title>CELINE</title>
</head>

<body>
	<?php
	// OTP

	$otppp = $_SESSION['login'];
	$otpget = mysqli_query($conn, "SELECT * FROM user WHERE `Username`='$otppp' OR `Phone`='$otppp'");
	$otpgets = mysqli_fetch_array($otpget);
	if ($otpgets['Status'] == "authentication") {
		header("LOCATION: /app/OTP");
	}
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
	<script src="/assets/js/chat.js"></script>
</body>

</html>