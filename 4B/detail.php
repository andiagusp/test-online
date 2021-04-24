<?php 
session_start();
require_once 'koneksi.php';
require_once 'header.php'; 
require_once 'navbar.php';

$id = (int)$_GET['pokemon_id'];

if(empty($id)) {
	$_SESSION['message'] = "data not valid";
	header("Location: index.php");
}

$sql_details = "SELECT pokemon_tb.*, element_tb.id as id_element, element_tb.name as name_element FROM pokemon_tb JOIN element_tb ON pokemon_tb.element_id = element_tb.id WHERE pokemon_tb.id = {$id}";
$pokemon_details = mysqli_query($conn, $sql_details);
$pokemon_detail = mysqli_fetch_assoc($pokemon_details);

$sql = "SELECT pokemon_tb.*, element_tb.id as id_element, element_tb.name as name_element FROM pokemon_tb JOIN element_tb ON pokemon_tb.element_id = element_tb.id";
$pokemons = mysqli_query($conn, $sql);
$pokemon = mysqli_fetch_assoc($pokemons);
?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-4 mb-3">
			<div class="card shadow">
				<div class="card-header">Detail Pokemon</div>
				<div class="card-body">
					<div class="card shadow bg-light" style="width: 18rem;">
					  <img src="photo/<?= $pokemon_detail['photo']; ?>" class="card-img-top" alt="photo pokemon">
					  <div class="card-body">
					    <h5 class="card-title"><?= $pokemon_detail['name']; ?></h5>
					    <p class="card-text">Strength : <span class="badge badge-warning"> <?= $pokemon_detail['str']; ?></span></p>
					    <p class="card-text">Defense : <span class="badge badge-success"> <?= $pokemon_detail['def']; ?></span></p>
					    <p class="card-text">Element : <span class="badge badge-primary"><?= $pokemon_detail['name_element']; ?></span></p>
					    <a href="index.php" class="btn btn-secondary btn-sm float-right">Back</a>
					    <a href="delete_pokemon.php?pokemon_id=<?= $pokemon_detail['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
							<a href="edit_pokemon.php?pokemon_id=<?= $pokemon_detail['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
					  </div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8 mb-3">
			<div class="card shadow">
				<div class="card-header">
					List Pokemons
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Strength</th>
							<th>Defense</th>
							<th>Photo</th>
							<th>Element</th>
							<th>Action</th>
						</tr>
						<?php foreach($pokemons as $i => $pokemon): ?>
						<tr>
							<td><?= ++$i; ?></td>
							<td><?= $pokemon['name']; ?></td>
							<td><?= $pokemon['str']; ?></td>
							<td><?= $pokemon['def']; ?></td>
							<td><img src="photo/<?= $pokemon['photo']; ?>" alt="pokemon image" width="50" height="50"></td>
							<td><?= $pokemon['name_element']; ?></td>
							<td>
								<a href="?pokemon_id=<?= $pokemon['id']; ?>" class="btn btn-danger btn-sm">Detail</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>
