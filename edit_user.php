<html>
<head>
<title>Edit User Credentials</title>
</head>
<body>
<link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'/>
<?php
include('../conf/config.php');
include('../templates/func.php');
include('../templates/title_bar.php');
?>

<h3> Edit User: </h3>

<!-- <form method='post'> -->
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

$sql    = "SELECT `username`, `id` , `user_level` , `type`
           FROM `users`
           ORDER BY `id` ASC";

$result = mysql_query($sql);
echo "<table class='table' style='width:35%; font-family:Century Gothic;'><font color='white' font family='white'>";
		echo "<h2><font color='black'>Current Users </font></h2>";
		echo "<tr><font color='white'>";
		echo "<th><font color='white'>ID</th>
		<th><font color='white'>NAME</th>
		<th><font color='white'>LEVEL</th>
		<th><font color='white'>TYPE</th>";
		echo "</tr>";
	while($user = mysql_fetch_array($result)){
		echo "<tr>";
			echo "<td> <font color='white'>" .$user['id']. "</td>"; 
			echo "<td> <font color='white'>" .$user['username']. "</td>"; 
			echo "<td> <font color='white'>" .$user['user_level']. "</td>"; 
			echo "<td> <font color='white'>" .$user['type']. "</font></td>"; 
		echo "</tr>";
	}
echo "</font></table>";
?>

<form method='post'>
<?php
if(isset($_POST['submit'])){
 	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$user_level = $_POST['user_level'];
	$type = $_POST['type']; 
	
	if(empty($id) or empty($username) or empty($password) or empty($user_level) or empty($type)){
		echo "<p> Fields Empty !</p>";
	}else{
		mysql_query("UPDATE users SET username='$username',password='$password',user_level='$user_level',type='$type' WHERE id='$id'");
		echo "<p>Update Successful</p>";
		header('Refresh: 2;edit_user.php');

	}
}
?>



<div class='login' style='position: absolute; top: 215px;'>
<form id='thisform'>
ID: <br/>
<input type="text" name="id">
User Name: <br/>
<input type="text" name="username">
<br/><br/>
Password : <br/>
<input type="password" name="password">
<br/><br/>
User_level : <br/>
<input type="text" name="user_level">
<br/><br/>
Type : <br/>
<input type="text" name="type">
<br/><br/>

<button type="submit" name='submit' class="btn btn-primary btn-block btn-large">EDIT USER</button>
</div>


</body>
</html>