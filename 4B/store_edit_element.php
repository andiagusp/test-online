<?php 

session_start();
require_once 'koneksi.php';

$id = (int)$_POST['id'];
$name = $_POST['name'];

if(isset($id) && isset($name)) {
	mysqli_query($conn, "UPDATE element_tb SET name = '{$name}' WHERE id = {$id}");
	$_SESSION['message'] = "data success update";
	header("Location: add_element.php");
	exit();
} else {
	$_SESSION['message'] = "data fail to update";
	header("Location: add_element.php");
	exit();
}