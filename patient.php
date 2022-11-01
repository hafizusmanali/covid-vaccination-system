<?php include('inc.header.php') ?>
<?php include('inc.sidebar.php') ?>

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
		<div class="form-head align-items-center d-flex mb-sm-4 mb-3">
			<div class="mr-auto">
				<h2 class="text-black font-w600">Patients</h2>
				<p class="mb-0">Patients Admin Dashboard</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="table-responsive card-table">
					<table id="example5" class="display dataTablesCard white-border table-responsive-xl">
						<thead>
							<tr>
								<th>Patient ID</th>															
								<th>Patient Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Selected Hospitals</th>
								<th>Treatment Type</th>
								<th>Vaccine Name</th>
								<th>Patient Image</th>	
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'dbcon.php';


							$result = mysqli_query($con, 'SELECT * FROM hp_patient');
							while ($data = mysqli_fetch_assoc($result)) {
                                
							?>
								<tr>
									<td><?php echo $data['p_id']; ?></td>									
									<td><?php echo $data['p_fname']; ?> <?php echo $data['p_lname']; ?></td>
									<td><?php echo $data['p_age']; ?></td>
									<td><?php echo $data['p_gender']; ?></td>
									<td><?php echo $data['p_hospital']; ?></td>
									<td><?php echo $data['p_treatment']?></td>
									<td><?php echo $data['p_vaccine']?></td>	
									<td>
											<img src="<?php echo $data['p_image']; ?>" alt="" width="43">
									</td>								
									<td>
									<?php if($data['p_status'] == "Positive" ) { ?>
										<span class="badge badge-outline-danger">
											<i class="fa fa-circle text-danger mr-1"></i>
											<?php echo $data['p_status']; ?>
										</span>
                                    <?php } else{ ?>
										<span class="badge badge-outline-primary">
											<i class="fa fa-circle text-primary mr-1"></i>
											<?php echo $data['p_status']; ?>
										</span>
                                     <?php } ?>

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
	</div>
</div>

<?php include('inc.footer.php') ?>
<!--Main wrapper end-->
<?php include('inc.script.php') ?>