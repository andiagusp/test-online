<?php 

session_start();
require_once 'koneksi.php';

$name = $_POST['name'];

if (empty($name)) {
	$_SESSION['message'] = "name must be filled";
	header("Location: add_element.php");
}

mysqli_query($conn, "INSERT INTO element_tb (name) VALUES('{$name}')");
$_SESSION['message'] = "data element has been stored";
header("Location: add_element.php");