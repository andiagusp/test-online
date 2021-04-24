<?php 
session_start();
require_once 'koneksi.php';
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$name = $_POST['name'];
$str = (int) $_POST['str'];
$def = (int) $_POST['def'];
$element_id = (int) $_POST['element_id'];
$photo = $_FILES['photo'];

if($photo['error'] === 4) {
	$_SESSION['message'] = "Gambar must be upload" ;
	header("Location: add_pokemon.php");
}

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

move_uploaded_file($photo['tmp_name'], SITE_ROOT.'/photo/'.$photo_name);

mysqli_query($conn, "INSERT INTO pokemon_tb (name, str, def, photo, element_id) VALUES('{$name}', '{$str}', '{$def}', '{$photo_name}', '{$element_id}')");

$_SESSION['message'] = "data has been store" ;
header("Location: index.php");