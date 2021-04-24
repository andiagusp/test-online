<?php 

require_once 'koneksi.php'; 
require_once 'header.php'; 
require_once 'navbar.php';

$elements = mysqli_query($conn, "SELECT * FROM element_tb");

?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header">Add Pokemon</div>
				<div class="card-body">
					<form action="store_pokemon.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">name</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="str">Strength</label>
							<input type="number" name="str" id="str" class="form-control">
						</div>
						<div class="form-group">
							<label for="def">Defense</label>
							<input type="number" name="def" id="def" class="form-control">
						</div>
						<div class="form-group">
							<label for="element_id">Element</label>
							<select name="element_id" id="element_id" class="form-control">
								<?php while($element = mysqli_fetch_assoc($elements)): ?>
									<option value="<?= $element['id']; ?>"><?= $element['name']; ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="photo">Photo</label>
							<input type="file" name="photo" id="photo" class="form-control">
						</div>
						<div class="form-group">
							<a href="index.php" class="btn btn-warning">Back</a>
							<button class="btn btn-primary" type="submit">Store</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>