<?php 
session_start();
require_once 'koneksi.php'; 
require_once 'header.php'; 
require_once 'navbar.php';

$elements = mysqli_query($conn, "SELECT * FROM element_tb");

?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-12">
			<?php	if(isset($_SESSION['message'])): ?>
				<div class="alert alert-success"><?= $_SESSION['message']; ?></div>
			<?php session_destroy();	endif; ?>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header">
					Add Element
				</div>
				<div class="card-body">
					<form action="store_element.php" method="POST">
						<div class="form-group">
							<label for="name">Name Element</label>
							<input type="text" name="name" id="name" class="form-control"  required="on">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Store</button>
							<a href="index.php" class="btn btn-warning">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header">
					List Element
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Name Element</th>
							<th>Action</th>
						</tr>
						<?php foreach($elements as $i => $element): ?>
						<tr>
							<td><?= ++$i; ?></td>
							<td><?= $element['name']; ?></td>
							<td>
								<a href="edit_element.php?element_id=<?= $element['id']; ?>" class="btn btn-warning">Edit</a>
								<a href="delete_element.php?element_id=<?= $element['id']; ?>" class="btn btn-danger">Delete</a>
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