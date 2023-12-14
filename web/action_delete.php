<?php

$database_host = '127.0.0.1';
$database_user = 'root';
$database_password = 'root';
$database_name = 'coding_challenge';
$port = '8889';

if (!isset($_POST['id'])) {
	die(json_encode([
		'status' => false,
		'mesage' => "The question id is required"
	]));
}

$question_id = $_POST['id'];

if (!($connection = mysqli_connect($database_host, $database_user, $database_password, $database_name, $port))) {
	die(mysqli_connect_error());
}

$questionDeleted = mysqli_query($connection, "DELETE FROM questions WHERE id='{$question_id}'");

if (mysqli_affected_rows($connection) > 0) {
	$result = ['status' => true];
} else {
	$result = ['status' => false];
}

die(json_encode($result));
