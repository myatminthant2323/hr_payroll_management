<!DOCTYPE html>
<html>
<head>
	<title>Payslip</title>
</head>
<body>
	@php
	$month_and_year = explode("-", $payslip['month']);
	$month = $month_and_year[1];
	$year = $month_and_year[0];
	$dateObj   = DateTime::createFromFormat('!m', $month);
	$monthName = $dateObj->format('F');
	@endphp
	<div style="font-size: 14px;">
		<p>Hi {{$payslip['employee_name']}},</p>
		<p>Lucid Infoweb LLC. has just processed your pay for {{$monthName}} , {{$year}}.
		<p>Your pay slip for {{$monthName}} , {{$year}} is available.</p>
		<p>Thank you for your patience.</p>
		<p>Sincerely,</p>
		<p>Lucid Infoweb LLC @HR Team.</p>
	</div>
	
	<br>
	<h3>Monthly Payslip for {{$monthName}}, {{$year}}</h3>
</body>
</html>