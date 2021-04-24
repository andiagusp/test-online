<?php 
session_start();
require_once 'koneksi.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$id = (int) $_POST['id'];
$name = $_POST['name'];
$str = (int) $_POST['str'];
$def = (int) $_POST['def'];
$element_id = (int) $_POST['element_id'];
$photo = $_FILES['photo'];
$old_photo = $_POST['old_photo'];

if(empty($name) || empty($str) || empty($str) || empty($def)) {
	$_SESSION['message'] = "data not valid";
	header("Location: index.php");
}

if($photo['error'] === 4) {
	$photo_name = $old_photo;
} else {
	$extension_valid = ['jpg', 'jpeg', 'png'];
	$extension_photo = explode('.', $photo['name']);
	$extension_photo = strtolower(end($extension_photo));

	if(!in_array($extension_photo, $extension_valid)) {
		$_SESSION['message'] = "extension valid is jpeg, jpg, png" ;
		header("Location: add_pokemon.php");
	}

	if($photo['size'] > 1000000) {
		$_SESSION['message'] = "image size is too large, image must be < 1mb" ;
		header("Location: add_pokemon.php");
	}

	$photo_name = uniqid();
	$photo_name .= ".".$extension_photo;

	unlink(SITE_ROOT.'/photo/'.$old_photo);
	move_uploaded_file($photo['tmp_name'], SITE_ROOT.'/photo/'.$photo_name);
}

mysqli_query($conn, "UPDATE pokemon_tb SET name = '{$name}', str = '{$str}', def = '{$def}', photo = '{$photo_name}', element_id = '{$element_id}' WHERE id = {$id} ");

$_SESSION['message'] = "data pokemon {$name} has been update" ;
header("Location: index.php");