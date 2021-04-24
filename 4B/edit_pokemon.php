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

$sql = "SELECT pokemon_tb.*, element_tb.id as id_element, element_tb.name as name_element FROM pokemon_tb JOIN element_tb ON pokemon_tb.element_id = element_tb.id WHERE pokemon_tb.id = {$id}";
$pokemons = mysqli_query($conn, $sql);
$pokemon = mysqli_fetch_assoc($pokemons);

$elements = mysqli_query($conn, "SELECT * FROM element_tb");

?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header">
					Edit Pokemon
				</div>
				<div class="card-body">
					<form action="store_edit_pokemon.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $pokemon['id']; ?>">
						<input type="hidden" name="old_photo" value="<?= $pokemon['photo']; ?>">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" id="name" value="<?= $pokemon['name']; ?>">
						</div>
						<div class="form-group">
							<label for="str">Strength</label>
							<input type="number" class="form-control" name="str" id="str" value="<?= $pokemon['str']; ?>">
						</div>
						<div class="form-group">
							<label for="def">Defence</label>
							<input type="number" class="form-control" name="def" id="def" value="<?= $pokemon['def']; ?>">
						</div>
						<div class="form-group">
							<label for="element_id">Element</label>
							<select class="form-control" name="element_id" id="element_id">
								<option value="<?= $pokemon['element_id']; ?>"><?= $pokemon['name_element']; ?></option>
								<?php while($element = mysqli_fetch_assoc($elements)): ?>
									<?php if($pokemon['element_id'] != $element['id']): ?>
										<option value="<?= $element['id']; ?>"><?= $element['name']; ?></option>
									<?php endif; ?>
								<?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<img src="photo/<?= $pokemon['photo']; ?>" alt="" class="mb-3" width="100" height="100">
							<label for="photo">Photo</label>
							<input class="form-control" type="file" name="photo">
						</div>
						<div class="form-group">
							<a href="index.php" class="btn btn-secondary">Back</a>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>
