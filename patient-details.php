<?php include('inc.header.php') ?>
<?php include('inc.sidebar.php') ?>

<div class="content-body">
	<!-- row -->
	<?php

	include 'dbcon.php';

	$id = $_SESSION['userid'];

	$query = "select * from hp_patient where user_id = $id";
	$query2 = "select * from hp_users where id = $id";
	$result = mysqli_query($con, $query);
	$result2 = mysqli_query($con, $query2);

	$row = mysqli_fetch_assoc($result);
	$row2 = mysqli_fetch_assoc($result2);
	?>
	<div class="container-fluid">
		<div class="form-head page-titles d-flex align-items-center mb-sm-4 mb-3">
			<div class="mr-auto">
				<h2 class="text-black font-w600">Patient Details</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Patient</a></li>
					<li class="breadcrumb-item"><a href="javascript:void(0)">#P-<?php echo $row['p_id']; ?></a></li>
				</ol>
			</div>
			<div class="d-flex">
				<div class=" mr-3">
					<?php if ($row['p_status'] == "Pending") { ?>
						<p class="text-white bg-warning p-2">
							<?php echo $row['p_status']; ?>
						</p>
					<?php } else if (
						$row['p_status'] == "Rejected" || $row['p_status'] == "Not Vaccinated" ||
						$row['p_status'] == "Positive"
					) { ?>
						<p class="text-white bg-danger p-2">
							<?php echo $row['p_status']; ?>
						</p>

					<?php } else { ?>
						<p class="text-white bg-primary p-2">
							<?php echo $row['p_status']; ?>
						</p>
					<?php } ?>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-xxl-12">
				<div class="row">
					<div class="col-xl-12">
						<div class="card details-card">
							<img src="images/bg.jpg" alt="" class="bg-img">
							<div class="card-body">
								<div class="d-sm-flex mb-3">
									<div class="img-card mb-sm-0 mb-3">
										<?php if ($row['p_image'] == "uploads/") {
											if ($row['p_gender'] == 'male') {
										?>
												<img src="uploads/patient.png" alt="">
											<?php
											} else { ?>
												<img src="uploads/female-patient.jfif" alt="">
											<?php }
										} else { ?>
											<img src="<?php echo $row['p_image']; ?>" alt="">
										<?php } ?>
										<div class="info d-flex align-items-center p-md-3 p-2 bg-primary">
											<svg class="mr-3 d-sm-inline-block d-none" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M28.75 12.5C28.7538 11.8116 28.568 11.1355 28.213 10.5458C27.8581 9.95597 27.3476 9.47527 26.7376 9.15632C26.1276 8.83737 25.4415 8.69248 24.7547 8.73752C24.0678 8.78257 23.4065 9.01581 22.8434 9.4117C22.2803 9.80758 21.837 10.3508 21.5621 10.9819C21.2872 11.613 21.1913 12.3076 21.2849 12.9896C21.3785 13.6715 21.6581 14.3146 22.0929 14.8482C22.5277 15.3819 23.101 15.7855 23.75 16.015V20C23.75 21.6576 23.0915 23.2473 21.9194 24.4194C20.7473 25.5915 19.1576 26.25 17.5 26.25C15.8424 26.25 14.2527 25.5915 13.0806 24.4194C11.9085 23.2473 11.25 21.6576 11.25 20V18.65C13.3301 18.3482 15.2323 17.3083 16.6092 15.7203C17.9861 14.1322 18.746 12.1019 18.75 10V2.5C18.75 2.16848 18.6183 1.85054 18.3839 1.61612C18.1495 1.3817 17.8315 1.25 17.5 1.25H13.75C13.4185 1.25 13.1005 1.3817 12.8661 1.61612C12.6317 1.85054 12.5 2.16848 12.5 2.5C12.5 2.83152 12.6317 3.14946 12.8661 3.38388C13.1005 3.6183 13.4185 3.75 13.75 3.75H16.25V10C16.25 11.6576 15.5915 13.2473 14.4194 14.4194C13.2473 15.5915 11.6576 16.25 10 16.25C8.34239 16.25 6.75268 15.5915 5.58058 14.4194C4.40848 13.2473 3.75 11.6576 3.75 10V3.75H6.25C6.58152 3.75 6.89946 3.6183 7.13388 3.38388C7.3683 3.14946 7.5 2.83152 7.5 2.5C7.5 2.16848 7.3683 1.85054 7.13388 1.61612C6.89946 1.3817 6.58152 1.25 6.25 1.25H2.5C2.16848 1.25 1.85054 1.3817 1.61612 1.61612C1.3817 1.85054 1.25 2.16848 1.25 2.5V10C1.25402 12.1019 2.01386 14.1322 3.3908 15.7203C4.76773 17.3083 6.6699 18.3482 8.75 18.65V20C8.75 22.3206 9.67187 24.5462 11.3128 26.1872C12.9538 27.8281 15.1794 28.75 17.5 28.75C19.8206 28.75 22.0462 27.8281 23.6872 26.1872C25.3281 24.5462 26.25 22.3206 26.25 20V16.015C26.9792 15.7599 27.6114 15.2848 28.0591 14.6552C28.5069 14.0256 28.7483 13.2726 28.75 12.5Z" fill="white" />
											</svg>
											<div>
												<p class="fs-14 text-white op5 mb-1">Disease</p>
												<span class="fs-18 text-white"><?php echo $row['p_treatment']; ?></span>
											</div>
										</div>
									</div>
									<div class="card-info d-flex align-items-start">
										<div class="mr-auto pr-3">
											<h2 class="font-w600 mb-2 text-black"><?php echo $row['p_fname'] ?> <?php echo $row['p_lname'] ?></h2>
											<p class="mb-2">#P-<?php echo $row['p_id']; ?></p>
											<span class="date">
												<i class="las la-clock"></i>
												Join on <?php echo $row2['created_at']; ?></span>
										</div>
										<?php if ($row['p_gender'] == 'male') { ?>
											<span class="mr-ico bg-primary">
												<i class="las la-mars"></i>
											</span>
										<?php } else {
										?>
											<span class="mr-ico bg-primary">
												<i class="las la-female"></i>
											</span>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<i class="las la-phone fs-30 text-primary mr-3"></i>
											<div class="media-body">
												<span class="d-block mb-1">Phone</span>
												<p class="fs-18 mb-0 text-black"><?php echo $row['p_number']; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<i class="las la-envelope-open fs-30 text-primary mr-3"></i>
											<div class="media-body">
												<span class="d-block mb-1">Email</span>
												<p class="fs-18 mb-0 text-black"><?php echo $row['p_email']; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<i class="las la-hospital fs-30 text-primary mr-3"></i>
											<div class="media-body">
												<span class="d-block mb-1">Assigned Hospital</span>
												<p class="fs-18 mb-0 text-black"><?php echo $row['p_hospital']; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="media align-items-center">
											<i class="las la-clinic-medical fs-30 text-primary mr-3"></i>
											<div class="media-body">
												<span class="d-block mb-1">Selected Vaccine</span>
												<p class="fs-18 mb-0 text-black"><?php echo $row['p_vaccine']; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('inc.footer.php') ?>
<!--Main wrapper end-->
<?php include('inc.script.php') ?>