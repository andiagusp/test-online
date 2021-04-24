<?php 
session_start();
require_once 'koneksi.php'; 
require_once 'header.php'; 
require_once 'navbar.php';

$sql = "SELECT pokemon_tb.*, element_tb.id as id_element, element_tb.name as name_element FROM pokemon_tb JOIN element_tb ON pokemon_tb.element_id = element_tb.id";
$pokemons = mysqli_query($conn, $sql);

?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-12">
		<?php if(isset($_SESSION['message'])): ?>
			<div class="alert alert-success"><?= $_SESSION['message']; ?></div>
		<?php session_destroy(); endif; ?>
		</div>
	</div>

	<div class="row mt-3">
	<?php while($pokemon = mysqli_fetch_assoc($pokemons)): ?>
		<div class="col-md-3 mb-3">
			<div class="card border border-dark bg-light">
        <img src="photo/<?= $pokemon['photo']; ?>" class="card-img-top" alt="pokemon_image" width="100" height="200">
        <div class="card-body">
          <h5 class="card-title font-weight-bold text-center"><?= $pokemon['name']; ?></h5>
          <p class="card-text font-weight-bold text-center badge badge-secondary"><?= $pokemon['name_element']; ?></p>
          <a href="detail.php?pokemon_id=<?= $pokemon['id']; ?>" class="btn btn-success btn-block">Detail <?= $pokemon['name']; ?></a>
        </div>
      </div>
		</div>
	<?php endwhile; ?>
	</div>
</div>

<?php require_once 'footer.php'; ?>
