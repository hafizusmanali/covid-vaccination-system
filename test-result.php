<?php include('inc.header.php') ?>
<?php include('inc.sidebar.php') ?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">

		<div class="form-head d-flex mb-sm-4 mb-3">
			<div class="mr-auto">
				<h2 class="text-black font-w600">Update COVID Test Results</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="tab-content">

					<div id="navpills-1" class="tab-pane active show fade">
						<?php
						include 'dbcon.php';
						$status = 'Treatment';

						$id = $_SESSION['userid'];
						$query = 'select * from hp_patient inner join hp_hospital on hp_patient.p_hospital = hp_hospital.name where hp_hospital.user_id = ' . $id . ' and hp_patient.p_status = "' . $status . '" and hp_patient.p_treatment = "covid test" ';
						$result = mysqli_query($con, $query);
						while ($data = mysqli_fetch_assoc($result)) {
						?>
							<div class="card review-table">
								<div class="media">
									<img class="mr-3 img-fluid" width="110" src="<?php echo $data['p_image']; ?>" alt="">
									<div class="media-body">
										<h3 class="fs-20 text-black font-w600 mb-3"><?php echo $data['p_fname']; ?> <?php echo $data['p_lname']; ?></h3>
										<?php if($data['p_vaccine'] != "") { ?><p>Vaccine: <?php echo $data['p_vaccine']?></p><?php } ?>
									</div>
									<div class="media-footer d-flex align-self-center">
										<form class="edit ml-auto" action="action.php" method="POST">
											<input type="hidden" value="<?php echo $data['p_id'] ?>" name="id" />
											<input type="submit" class="btn btn-outline-primary reject ml-2" value="NEGATIVE" name="negative" />											
											<input type="submit" class="btn  btn-outline-danger " name="positive" value="POSITIVE" />
										</form>
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