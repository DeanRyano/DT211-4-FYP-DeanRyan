<html>
<head>
<title>Camera/Media View</title>
</head>
<body>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');
?>

<?php
if($_POST['submit1']){
 shell_exec("/usr/lib/cgi-bin/delPics.sh 2>&1");
}
?>

<?php
if($user_level == 1){
	echo "
<div style='position: absolute; top: 12px; right: 140px;'>
	<link rel='stylesheet' type='text/css' href='../css/popdown.css'/>
	<script src='../scripts/popdown.js'></script>
		<div class='dropdown'>
			<button onclick='myFunction()' style='position: absolute; top: 0px; right: -65px;' class='dropbtn'>Settings</button>
			<div id='myDropdown' class='dropdown-content'>
				<a href='add_user.php'>Add Users</a>
				<a href='edit_user.php'>Edit Users</a>
				<a href='change_cam.php'>Change Cam</a>
				<a href='change_media.php'>Change Media</a>
			</div>
		</div>
</div >
";

echo "
<div>
<a href='http://192.168.0.4:8090/pi/delPics.sh'>
<button type='submit' style='position: absolute; bottom: 68px; right: 584px;' class='dropbtn'>Delete Media</button>
</a>
</div>
";
}
?>


<?php

$sql    = "SELECT `ip`,`port`
           FROM `cam`
           ORDER BY `id` ASC";

$sql1    = "SELECT `ip`,`port`
           FROM `media`
           ORDER BY `id` ASC";
$result = mysql_query($sql);
$result1 = mysql_query($sql1);

	while($cam = mysql_fetch_array($result) AND $media = mysql_fetch_array($result1)){
		echo "
				 <img  id='this' src='http://".$cam['ip'].":".$cam['port']."/' style='position: absolute; top: 83px; left: 80px; width:600px; height: 460px;' border='5'/>
				 <iframe id='img1' style='position: absolute; top: 83px; left: 700px;  background: #FFFFFF; width:500px; height: 420px;' src='http://".$media['ip'].":".$media['port']."/' />
		";
	}

?>



</body>
</html>
