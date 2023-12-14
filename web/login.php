<?php
session_start();

$database_host = '127.0.0.1';
$database_user = 'root';
$database_password = 'root';
$database_name = 'coding_challenge';
$port = '8889';

if (!isset($_POST['username']) || !isset($_POST['password'])) {
	die(json_encode([
		'status' => false,
		'mesage' => "The username and password are required"
	]));
}

$username = $_POST['username'];
$password = $_POST['password'];

if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name, $port))) {
	die(mysqli_connect_error());
}

$statement = mysqli_prepare($connection, "SELECT * FROM users WHERE username=? LIMIT 1");

if ($statement) {
	mysqli_stmt_bind_param($statement, "s", $username);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);

	if ($result->num_rows != 0) {
		$userEntry = mysqli_fetch_assoc($result);
		if ($userEntry['password'] == md5($password)) {
			$_SESSION['user_id'] = $userEntry['id'];
			$result = ['status' => true];
		} else {
			$result = [
				'status' => false,
				'message' => "Wrong username or password"
			];
		}
	} else {
		$result = ['status' => false];
	}
} else {
	die(json_encode([
		'message' => "Error in preparing statement: " . mysqli_error($connection)
	]));
}



die(json_encode($result));
