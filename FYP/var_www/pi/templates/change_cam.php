<html>
<head>
<title>Change Camera</title>
</head>
<body>
<link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'/>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');

echo "<form action='../templates/cam_view.php'>";
echo "<input type='image' src='../images/home.png' style='position: absolute; top: 0px; right: 75px; width:60px; height:60px;' alt=''submit>";
echo "</form>";

?>



<?php

/* $id = mysql_real_escape_string($_GET['id']);
$result = mysqli_query("SELECT * FROM users WHERE id='$id'");
while($row =  mysqli_fetch_array($result)){
	echo $userId = $row['id'] . "<br/>";
	echo $fname = $row['username'] . "<br/>";
	echo $Sname = $row['password'] . "<br/>";
	echo $Email = $row['user_level'] . "<br/>";
	echo $password = $row['type'] . "<br/>";
} */

$sql    = "SELECT `ip`, `port`
           FROM `cam`
           ORDER BY `id` ASC";
$result = mysql_query($sql);

echo "<table class='table' style='width:35%; font-family:Century Gothic;'><font color='white' font family='white'>";
		echo "<br/><br/><h2><font color='black'>Current Camera </font></h2>";
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
		mysql_query("UPDATE cam SET ip='$ip', port='$port' WHERE id='1' ");
		echo "<p>Cam Changed Successfully</p>";
		header('Refresh: 2;cam_view.php');
	}
}
?>

<div class='login' style='position: absolute; top: 240px;'>
<form>
IP: <br/>
<input type='tel' name='ip' placeholder='192.0.0.6'/>
<br/><br/>
PORT : <br/>
<input type='tel' name='port' placeholder='8080' />
<br/><br/>

<button type="submit" name='submit' class="btn btn-primary btn-block btn-large">Change Cam</button>
</div>

</body>
</html>
