<html>
<head>
<title>Add New User/Admin</title>
</head>
<body>

<link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'/>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');

echo "<form action='../templates/cam_view.php'>";
echo "<input type='image' src='../images/home.png' style='position: absolute; top: 0px; right: 75px; width:70px; height:60px;' alt=''submit>";
echo "</form>";

?>

<h3> Add User: </h3>

<form method='post'>
<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$user_level = $_POST['user_level'];
	$user_type = $_POST['user_type'];
	if(empty($username) or empty($password) or empty($user_level) or empty($user_type)){
		echo "<p> Fields Empty !</p>";
	}else{
		mysql_query("INSERT INTO users VALUES('', '$username', '$password', '$user_level', '$user_type')");
		echo "<p>Add Successful</p>";
		header('Refresh: 2;cam_view.php');

	}
}
?>

<div class='login' style='position: absolute; top: 240px;'>
<form id='thisform'>

User Name:
<input type='text' name='username' placeholder='dan123'/>
Password :
<br/><br/>
<input type='password' name='password' placeholder='*******'>
User_level :
<br><br>
<input type='text' name='user_level' placeholder='1 = Admin | 2 = User '/>
Type : 
<br/><br/>
<input type='text' name='user_type' placeholder='a = activated | d = deactivated'>
<br/><br/>

<button type="submit" name='submit' class="btn btn-primary btn-block btn-large">ADD USER</button>
</div>

</body>
</html>
