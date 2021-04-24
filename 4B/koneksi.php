<?php
$conn = mysqli_connect("localhost", "root", "Password123#@!", "pokemon_dumb");

if (mysqli_connect_errno()) {
	echo "Gagal koneksi ke database ". mysqli_error();
	exit();
}