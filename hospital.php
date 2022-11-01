<?php include('inc.header.php') ?>
<?php include('inc.sidebar.php') ?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">

		<div class="form-head d-flex mb-sm-4 mb-3">
			<div class="mr-auto">
				<h2 class="text-black font-w600">Hospitals</h2>
				<?php if ($_SESSION['role'] == "admin") {
				?>
					<p class="mb-0">Hospitals Admin Dashboard</p>
				<?php }
				?>
			</div>
			<?php
			if ($_SESSION['role'] == "admin") {
			?>

				<div class="d-sm-flex d-block mb-0 align-items-end">
					<ul class="nav nav-pills review-tab mr-3 mb-2">
						<li class="nav-item">
							<a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] ?>/hospital/hospital.php" class="nav-link ">PENDING</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] ?>/hospital/hospital.php?status=approved" class="nav-link">APPROVED</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] ?>/hospital/hospital.php?status=rejected" class="nav-link">REJECTED</a>
						</li>
					</ul>
				</div>
			<?php } ?>
		</div>
		<?php
		if ($_SESSION['role'] != "admin") {
		?>
			<div class="row">
				<div class="col-12">
					<div class="table-responsive card-table">
						<table id="example5" class="display dataTablesCard table-responsive-xl">
							<thead>
								<tr>

									<th>ID</th>
									<th>Name</th>
									<th>Contact</th>
									<th>FAX</th>
									<th>Landline</th>
									<th>Email</th>
									<th>Website</th>
									<th>Logo</th>
									<th>Location</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'dbcon.php';
								$status = 'true';

								$result = mysqli_query($con, 'SELECT * FROM hp_hospital where status = "' . $status . '" ');

								while ($data = mysqli_fetch_assoc($result)) {
									$items[] = $data;
								?>

									<tr>
										<td>
											<span class="text-nowrap"><?php echo $data['id']; ?></span>
										</td>
										<td><?php echo $data['name']; ?></td>
										<td><?php echo $data['contact_one']; ?></td>
										<td><?php echo $data['contact_two']; ?></td>
										<td><?php echo $data['contact_three']; ?></td>
										<td><span class="text-nowrap"><?php echo $data['email']; ?></span></td>
										<td><?php echo $data['web']; ?></td>
										<td>
											<img src="<?php echo $data['logo']; ?>" alt="" width="43">
										</td>
										<td>
											<a href="<?php echo $data['google_map_location']; ?>" class="btn btn-primary text-nowrap btn-sm light" target="_blank">Get location</a>
										</td>

									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php
		}
		?>

		<div class="row">
			<div class="col-xl-12">
				<div class="tab-content">

					<div id="navpills-1" class="tab-pane active show fade">
						<?php
						include 'dbcon.php';
						$status = 'pending';
						if ($_SESSION['role'] == "admin") {
							if (isset($_GET['status'])) {
								$status = $_GET['status'];
								if ($status == "approved") {
									$status = "true";
								}
								if ($status == "rejected") {
									$status = "false";
								}
							}



							$result = mysqli_query($con, 'SELECT * FROM hp_hospital where status = "' . $status . '"');
							$id = "";
							while ($data = mysqli_fetch_assoc($result)) {
						?>
								<div class="card review-table">
									<div class="media">
										<img class="mr-3 img-fluid" width="110" src="<?php echo $data['logo']; ?>" alt="">
										<div class="media-body">
											<h3 class="fs-20 text-black font-w600 mb-3"><?php echo $data['name']; ?></h3>
										</div>
										<div class="media-footer d-flex align-self-center">
											<?php if ($data['status'] == "pending") { ?>
												<form class="edit ml-auto" action="action.php" method="POST">
													<input type="hidden" value="<?php echo $data['id'] ?>" name="id" />
													<input type="submit" class="btn btn-outline-primary ml-2" name="approve" value="APPROVE" />
													<input type="submit" class="btn btn-outline-danger reject" value="REJECT" name="reject" />
												</form>
											<?php } else if ($data['status'] == "true") {
											?>
												<form class="edit ml-auto" action="action.php" method="POST">
													<input type="hidden" value="<?php echo $data['id'] ?>" name="id" />
													<input type="submit" class="btn btn-outline-danger reject" value="DELETE" name="reject" />
												</form>
											<?php } else {
											?>
												<form class="edit ml-auto" action="action.php" method="POST">
													<input type="hidden" value="<?php echo $data['id'] ?>" name="id" />
													<input type="submit" class="btn btn-outline-primary ml-2" name="approve" value="APPROVE" />
												</form>
											<?php }
											?>
										</div>
									</div>
								</div>
						<?php
							}
						}

						?>

					</div>


				</div>
			</div>

		</div>




	</div>


	<?php include('inc.footer.php') ?>
	<!--Main wrapper end-->
	<?php include('inc.script.php') ?>