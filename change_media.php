<html>
<head>
<title>Change Media</title>
</head>
<body>

<link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'/>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');
$_SESSION['user_id'] = $user_id;
?>


<?php

$sql    = "SELECT `ip`, `port`
           FROM `media`
           ORDER BY `id` ASC";
$result = mysql_query($sql);

echo "<table class='table' style='width:35%; font-family:Century Gothic;'><font color='white' font family='white'>";
		echo "<br/><br/><h2><font color='black'>Current Media </font></h2>";
		echo "<tr><font color='white'>";
		echo "
		<th><font color='white'>IP</th>
		<th><font color='white'>PORT</th>";
		echo "</tr>";
	while($cam = mysql_fetch_array($result)){
		echo "<tr>";
			echo "<td> <font color='white'>" .$cam['ip']. "</td>"; 
			echo "<td> <font color='white'>" .$cam['port']. "</font></td>"; 
		echo "</tr>";
	}
echo "</font></table>";
?>



<form method='post'>
<?php
if(isset($_POST['submit'])){
	$ip = $_POST['ip'];
	$port = $_POST['port'];
	if(empty($ip) or empty($port)){
		echo "<p> Fields Empty !</p>";
	}else{
		mysql_query("UPDATE media SET ip='$ip', port='$port' WHERE id='1' ");
		echo "<p>Cam Media Successfully</p>";
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

<button type="submit" name='submit' class="btn btn-primary btn-block btn-large">Change Media</button>

</div>
</body>
</html>