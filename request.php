<?php include('inc.header.php') ?>
<?php include('inc.sidebar.php') ?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">

		<div class="form-head d-flex mb-sm-4 mb-3">
			<div class="mr-auto">
				<h2 class="text-black font-w600">Request from Patient</h2>
			</div>


			<div class="d-sm-flex d-block mb-0 align-items-end">
				<ul class="nav nav-pills review-tab mr-3 mb-2">
					<li class="nav-item">
						<a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] ?>/hospital/request.php" class="nav-link">PENDING</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] ?>/hospital/request.php?status=approved" class="nav-link">APPROVED</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] ?>/hospital/request.php?status=rejected" class="nav-link">REJECTED</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="tab-content">

					<div id="navpills-1" class="tab-pane active show fade">
						<?php
						include 'dbcon.php';
						$status = 'pending';
						if (isset($_GET['status'])) {
							$status = $_GET['status'];
							if ($status == "approved") {
								$status = "Treatment";
							}
							if ($status == "rejected") {
								$status = "Rejected";
							}
						}

						$id = $_SESSION['userid'];
						$query = 'select * from hp_patient inner join hp_hospital on hp_patient.p_hospital = hp_hospital.name where hp_hospital.user_id = ' . $id . ' and hp_patient.p_status = "' . $status . '"  ';
						$result = mysqli_query($con, $query);
						while ($data = mysqli_fetch_assoc($result)) {
						?>
							<div class="card review-table">
								<div class="media">
									<img class="mr-3 img-fluid" width="110" src="<?php echo $data['p_image']; ?>" alt="">
									<div class="media-body">
										<h3 class="fs-20 text-black font-w600 mb-3"><?php echo $data['p_fname']; ?> <?php echo $data['p_lname']; ?></h3>
										<?php if ($data['p_vaccine'] != "") { ?><p>Vaccine: <?php echo $data['p_vaccine'] ?></p> <?php } ?>
									</div>
									<div class="media-footer d-flex align-self-center">
										<div class="disease mr-5">
											<p class="mb-1 fs-14">Treatment</p>
											<h4 class="text-primary"><?php echo $data['p_treatment'] ?></h4>
										</div>
										<?php if ($data['p_status'] == "Pending") { ?>
											<form class="edit ml-auto" action="action.php" method="POST">
												<input type="hidden" value="<?php echo $data['p_id'] ?>" name="id" />
												<input type="submit" class="btn btn-outline-primary ml-2" name="p_approve" value="APPROVE" />
												<input type="submit" class="btn btn-outline-danger reject" value="REJECT" name="p_reject" />
											</form>
										<?php } else if ($data['p_status'] == "Treatment") {
										?>
											<form class="edit ml-auto" action="action.php" method="POST">
												<input type="hidden" value="<?php echo $data['p_id'] ?>" name="id" />
												<input type="submit" class="btn btn-outline-danger reject" value="DELETE" name="p_reject" />
											</form>
										<?php } else {
										?>
											<form class="edit ml-auto" action="action.php" method="POST">
												<input type="hidden" value="<?php echo $data['p_id'] ?>" name="id" />
												<input type="submit" class="btn btn-outline-primary ml-2" name="p_approve" value="APPROVE" />
											</form>
										<?php }
										?>
									</div>
								</div>
							</div>
						<?php

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