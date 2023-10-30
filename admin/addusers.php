<?php
include '../config/connection.php';
?>


<h2>Add Users</h2>

<div class="row">
	<div class="col-md-8">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Images</label>
				<input type="file" name="image[]" class="form-control">
			</div>
			<button name="addusers" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>

<?php
if (isset($_POST["addusers"])) {

	$imagename = $_FILES["image"]["name"];
	$imagelocation = $_FILES["image"]["tmp_name"];
	move_uploaded_file($imagelocation[0], "../images/" . $imagename[0]);
	$result = $connection->query("INSERT INTO users VALUES('', '$_POST[name]', '$imagename[0]')");
	$users_recently = $connection->insert_id;

	foreach ($imagename as $key => $recent_name) {
		$recent_location = $imagelocation[$key];
		move_uploaded_file($recent_location, "../images/" . $recent_name);
		$result_now = $connection->query("INSERT INTO users_img(id_users, users_img_name) VALUES('$users_recently','$recent_name')");
	}

	if ($result and $result_now) {
		echo "<script>alert('Data added successfully');window.location='index.php';</script>";
	}
}
?>