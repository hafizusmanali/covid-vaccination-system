<!--Sidebar start -->
<div class="deznav">
	<div class="deznav-scroll">
		<?php
		if (isset($_SESSION['role'])) {
			include 'dbcon.php';
			$id = $_SESSION['userid'];
			$query = "select * from hp_users where id = $id";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($result);
		?>
			<ul class="metismenu" id="menu">

				<?php if ($row["role"] == "1") {
				?>
					<li>
						<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li><a href="patient.php">All Patient Details</a></li>
							<li><a href="list_of_vaccine.php">List of Vaccine</a></li>
							<li><a href="hospital.php">List of Hospitals</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Hospital</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="hospital-register.php">Register</a></li>
							<li><a href="index.php">Login</a></li>
						</ul>
					</li>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">Patient</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="patient-register.php">Register</a></li>
							<li><a href="index.php">Login</a></li>
						</ul>
					</li>
				<?php
				};
				?>
				<?php if ($row["role"] == "2") {
				?>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Hospital</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li><a href="patient.php">List of patient</a></li>
							<li><a href="request.php">Patient Requests</a></li>
							<li><a href="test-result.php">Update Test results</a></li>
							<li><a href="vaccine-result.php">Update Vaccination results</a></li>

						</ul>
					</li>
				<?php
				};
				?>
				<?php if ($row["role"] == "3") {
				?>
					<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">Patient</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="dashboard.php">Dashboard</a></li>
							<li><a href="hospital.php">List of Hospitals</a></li>
							<li><a href="list_of_vaccine.php">List of Vaccine</a></li>
							<li><a href="patient-details.php">My Profile</a></li>
						</ul>
					</li>
				<?php
				};
				?>
			</ul>
		<?php
		}
		?>
		<div class="copyright">
			<p><strong>COVID TEST and VACCINATION Booking System</strong> © 2022 All Rights Reserved</p>
		</div>
	</div>
</div>
<!-- Sidebar end -->