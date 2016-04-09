<html>
<head>
<title>User/Admin Login</title>
</head>
<body>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');
?>


<form method='post'>
<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if(empty($username) or empty($password)){
		echo "<p> Fields Empty !</p>";
	}else{
		$check_login = mysql_query("SELECT id, type FROM users WHERE username='$username' AND password='$password'");
		if(mysql_num_rows($check_login) == 1){
			$run = mysql_fetch_array($check_login);
			$user_id = $run['id'];
			$type = $run['type'];
			if($type == 'd'){
				echo "Your account is deactivated by admin";
			}else{
				$_SESSION['user_id'] = $user_id;
				header('location: cam_view.php');
			}
		}else{
			$message1 ="Username and/or Password Incorrect...Try Again.";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}
	}
}
?>

<link rel='stylesheet' type='text/css' href='../css/login.css'/>
<div class="login">
	<h1>Login</h1>
    <form method="post">
    	<input type="text" name="username" placeholder="Username" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" name='submit' class="btn btn-primary btn-block btn-large">Log me in</button>
    </form>
</div>

<div id="fixedfooter"></div>
</body>
</html>
