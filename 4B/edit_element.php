<?php
session_start();
require_once 'koneksi.php';


$id = (int)$_GET['element_id'];

if(empty($id)) {
	$_SESSION['message'] = "data not valid";
	header("Location: add_element.php");
}

$pokemon_search = mysqli_query($conn, "SELECT * FROM element_tb WHERE id = {$id}");
$pokemon = mysqli_fetch_assoc($pokemon_search);

require_once 'header.php';
require_once 'navbar.php';
?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header">
					Edit Data Element
				</div>
				<div class="card-body">
					<form action="store_edit_element.php" method="POST">
						<div class="form-group">
							<label for="name">Name Element</label>
							<input type="hidden" name="id" value="<?= $pokemon['id']; ?>">
							<input type="text" name="name" id="name" class="form-control" value="<?= $pokemon['name']; ?>">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Update</button>
							<a href="add_element.php" class="btn btn-warning">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>
