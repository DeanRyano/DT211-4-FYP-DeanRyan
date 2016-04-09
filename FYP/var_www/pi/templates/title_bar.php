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
	<form action="../templates/logout.php">
	<input type="image" src="../images/logout.png" style="position: absolute; top: 0px; right: 5px; width:65px; height:60px;" alt="submit">
	</form>


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

	<form action="https://mail.google.com/">
	<input type='image' src='../images/gmail.png' style='position: absolute; bottom: -22px; right: 10px; width:60px; height:60px;' alt='submit'>
	</form>
</body>
</div>
</html>
