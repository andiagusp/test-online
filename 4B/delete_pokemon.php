<?php
session_start();
require_once 'koneksi.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$id = (int) $_GET['pokemon_id'];

if(empty($id)) {
	$_SESSION['message'] = "data not valid";
	header("Location: index.php");
}
$photo = mysqli_query($conn, "SELECT photo FROM pokemon_tb WHERE id = {$id}");
$photo = mysqli_fetch_assoc($photo);

mysqli_query($conn, "DELETE FROM pokemon_tb WHERE id = {$id}");
unlink(SITE_ROOT.'/photo/'.$photo['photo']);
$_SESSION['message'] = "data success delete";
header("Location: index.php");
