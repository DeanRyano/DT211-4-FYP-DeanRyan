<link rel='stylesheet' type='text/css' href='../css/head_foot.css'/>
<link rel='stylesheet' type='text/css' href='../css/popdown.css'/>
<head>
<link rel="shortcut icon" href="../images/pi1.ico" />
</head>
<html>
<div>
<body>
	<div id="fixedheader">
	<img src='../images/pi.png' style='width:110px;height:60px;'>
	<?php
	if(loggedin()){
	?>
	<button onclick="window.location.href='logout.php'" style='position: absolute; top: 8px; right: 8px;' class='dropbtn'>Log Out</button>

	<?php
	} else{
	?>

	<button onclick="window.location.href='about.php'" style='position: absolute; top: 8px; right: 8px;' class='dropbtn'>About</button>

	<?php
	}
	?>
	</div>

	<link rel='stylesheet' type='text/css' href='../css/login.css'/>
	<div id="fixedfooter"><p>Welcome [ <?php echo $level_name; ?> ] <?php echo $username ?></p></div> 
</body>
</div>
</html>
