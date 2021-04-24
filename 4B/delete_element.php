<?php 
session_start();
require_once 'koneksi.php';

$id = (int)$_GET['element_id'];

if(empty($id)) {
	$_SESSION['message'] = "data not valid";
	header("Location: add_element.php");
}

mysqli_query($conn, "DELETE FROM element_tb WHERE id = {$id}");

if(mysqli_affected_rows($conn) > 0) {
	$_SESSION['message'] = "element has been deleted";
	header("Location: add_element.php");
} else {
	$_SESSION['message'] = "element failed delete";
	header("Location: add_element.php");
}