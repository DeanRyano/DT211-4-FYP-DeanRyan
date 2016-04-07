<html>
<head>
<title>Change Camera</title>
</head>
<body>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');
?>

<h3> Change Camera: </h3>

<form method='post'>
<?php
if(isset($_POST['submit'])){
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	if(empty($ip) or empty($port)){
		echo "<p> Fields Empty !</p>";
	}else{
		mysql_query("UPDATE cam SET ip='$ip', port='$port' WHERE id='1' ");
		echo "<p>Cam Changed Successfully</p>";
		header('Refresh: 2;cam_view.php');
	}
}
?>

<div class='login' style='position: absolute; top: 240px;'>
<form>
IP: <br/>
<input type='text' name='ip' />
<br/><br/>
PORT : <br/>
<input type='text' name='port'>
<br/><br/>

<button type="submit" name='submit' class="btn btn-primary btn-block btn-large">Change Cam</button>
</div>

</body>
</html>
