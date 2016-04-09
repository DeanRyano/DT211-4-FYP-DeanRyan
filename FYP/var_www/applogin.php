<?php 
	$con = mysqli_connect("localhost", "root", "raspberry", "pi_db" );
	
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	
	$statement = mysqli_prepare($con, "SELECT * FROM users WHERE username = ? AND password = ?" );

	mysqli_stmt_bind_param($statement, "ss", $username, $password);
	mysqli_stmt_execute($statement);
	
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $id, $username, $password, $user_level, $type);	
	
	$response = array();
	$response["success"] = false;
	
	while(mysqli_stmt_fetch($statement)){
		$response["success"] = true; 
		$response["id"] = $id;
		$response["username"] = $username;
		$response["password"] = $password;
		$response["user_level"] = $user_level;
		$response["type"] = $type;
		
		
	}
	echo json_encode($response);
?>
