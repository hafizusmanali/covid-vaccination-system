<!--login form-->

<?php
session_start();
include 'dbcon.php';

if (isset($_POST['btnLogin'])) {
	$uemail = $_POST['val-username'];
	$upwd = $_POST['val-password'];

	$query = "SELECT u.id, u.first_name, u.last_name, u.email, u.password, u.gender, u.profile_image, u.role, u.created_at, r.role FROM hp_users u 
inner join hp_role r on r.id = u.role 
WHERE u.email = '$uemail' and u.password = '$upwd'";



	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result) > 0) {
		$_SESSION['userid'] = $row["id"];
		$_SESSION['role']   = $row["role"];
		header('location: dashboard.php');
	} else {

		echo "<script>
		window.location.href= 'index.php';
		alert('wrong username or password!');
		</script>";
	}
}

?>



<!--register form-->

<?php

include 'dbcon.php';

if (isset($_POST['btnRegister'])) {
	$uname = $_POST['name'];
	$uemail = $_POST['val-username'];
	$upwd = $_POST['val-password'];

	$query = "insert into hp_users (first_name, email, password) values ('$uname', '$uemail', '$upwd')";
	$result = mysqli_query($con, $query);

	if ($result) {
		header('location: index.php');
	} else {
		echo "Wrong Input Fields";
	}
}


?>

<!--vacine form-->

<?php

include 'dbcon.php';

if (isset($_POST['create'])) {
	$v_title = $_POST['vac_title'];
	$v_name = $_POST['vac_name'];
	$v_approved_country = $_POST['vac_approved_country'];
	$v_trails = $_POST['vac_trails'];
	$v_trails_country = $_POST['vac_trials_country'];
	$v_link = $_POST['vac_link'];
	$v_color = $_POST['v_color'];
	$v_status = $_POST['v_status'];




	$query2 = "insert into hp_vacine_type (name,color ) values ('$v_name', '$v_color')";
	$result2 = mysqli_query($con, $query2);

	$last_id = mysqli_insert_id($con);

	$query = "insert into hp_vaccine (type_id,name, sub_name, aprroved_country, trails_count,trails_country,status,link) values ('$last_id','$v_title', '$v_name', '$v_approved_country','$v_trails','$v_trails_country','$v_status','$v_link')";
	$result = mysqli_query($con, $query);




	if ($result) {
		header('location: list_of_vaccine.php');
	} else {
		echo "Wrong Info";
	}
}

?>


<!--hospital form-->

<?php

include 'dbcon.php';

if (isset($_POST['hp_submit'])) {
	$hp_name = $_POST['hp_name'];
	$hp_address = $_POST['hp_address'];
	$hp_contact_1 = $_POST['hp_contact_1'];
	$hp_contact_2 = $_POST['hp_contact_2'];
	$hp_contact_3 = $_POST['hp_contact_3'];
	$hp_email = $_POST['hp_email'];
	$hp_web = $_POST['hp_web'];
	$hp_primary_color = $_POST['hp_primary_color'];
	$hp_secondary_color = $_POST['hp_secondary_color'];
	$hp_theme_color = $_POST['hp_theme_color'];
	$hp_map = $_POST['hp_map'];
	$u_first_name = $_POST['u_first_name'];
	$u_last_name = $_POST['u_last_name'];
	$u_email = $_POST['u_email'];
	$u_pass = $_POST['u_pass'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if ($uploadOk == 0) {

		echo "<script>alert('Upload Error.');
			window.location.href = 'hospital-register.php'</script>";
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			header("location: index.php");
		}
	}


	$query2 = "insert into hp_users (first_name,last_name,email,password,gender,role,profile_image) values ('$u_first_name','$u_last_name','$u_email','$u_pass','3','2','$target_file')";

	$result2 = mysqli_query($con, $query2);

	$user_id = mysqli_insert_id($con);

	$query = "insert into hp_hospital (name,address,logo,user_id,contact_one,contact_two,contact_three,email,web,primary_color,secondary_color,theme_color,google_map_location,status ) values ('$hp_name','$hp_address','$target_file','$user_id','$hp_contact_1','$hp_contact_2','$hp_contact_3','$hp_email','$hp_web','$hp_primary_color','$hp_secondary_color','$hp_theme_color','$hp_map','pending')";
	$result = mysqli_query($con, $query);



	if ($result2) {
		header('locaton: index.php');
	} else {
		echo "<script>alert('Please Give Valid Details.');
			window.location.href = 'hospital-register.php'</script>";
	}
}

?>

<!-- reject form -->

<?php

include 'dbcon.php';

if (isset($_POST['reject'])) {
	$id = $_POST['id'];

	$query = "update hp_hospital SET status='false' WHERE id = '$id'";;
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: hospital.php");
	} else {
		echo "<script>alert('Something went Wrong.');
			window.location.href = 'hospital.php'</script>";
	}
}

if (isset($_POST['approve'])) {
	$id = $_POST['id'];

	$query = "update hp_hospital SET status='true' WHERE id = '$id'";
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: hospital.php");
	} else {
		echo "<script>alert('Something went Wrong.');
		window.location.href = 'hospital.php'</script>";
	}
}

?>


<!--patient form-->

<?php

include 'dbcon.php';

if (isset($_POST['p_submit'])) {
	$p_fname = $_POST['p_fname'];
	$p_lname = $_POST['p_lname'];
	$p_age = $_POST['p_age'];
	$p_number = $_POST['p_number'];
	$p_email = $_POST['p_email'];
	$p_gender = $_POST['p_gender'];
	$p_pass = $_POST['p_pass'];
	$p_treatment = $_POST['p_treatment'];
	$p_hospital = $_POST['p_hospital'];
	$p_vaccine = $_POST['p_vaccine'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if ($uploadOk == 0) {
		header("location: index.php");
	} else {
		if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
			header("location: index.php");
		}
	}



	$query2 = "insert into hp_users (first_name,last_name,email,password,gender,role,profile_image) values ('$p_fname','$p_lname','$p_email','$p_pass','$p_gender','3','$target_file')";

	$result2 = mysqli_query($con, $query2);

	$user_id = mysqli_insert_id($con);

	$query = "insert into hp_patient (user_id,p_fname,p_lname,p_age,p_number,p_gender,p_email,p_pass,p_hospital,p_treatment,p_vaccine,p_status,p_image) values ('$user_id','$p_fname','$p_lname','$p_age','$p_number','$p_gender','$p_email','$p_pass','$p_hospital','$p_treatment','$p_vaccine','Pending','$target_file')";
	$result = mysqli_query($con, $query);




	if ($result) {
		header('locaton: index.php');
	} else {
		echo "<script>alert('Please Give Valid Details.');
			window.location.href = 'patient-register.php'</script>";
	}
}

?>

<!-- patient reject form -->

<?php

include 'dbcon.php';

if (isset($_POST['p_reject'])) {
	$id = $_POST['id'];

	$query = "update hp_patient SET p_status='Rejected' WHERE p_id = '$id'";;
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: request.php");
	} else {
		echo "<script>alert('Something went Wrong.');
			window.location.href = 'request.php'</script>";
	}
}

if (isset($_POST['p_approve'])) {
	$id = $_POST['id'];

	$query = "update hp_patient SET p_status ='Treatment' WHERE p_id = '$id'";
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: request.php");
	} else {
		echo "<script>alert('Something went Wrong.');
		window.location.href = 'request.php'</script>";
	}
}

?>



<!-- patient update result form -->

<?php

include 'dbcon.php';

if (isset($_POST['negative'])) {
	$id = $_POST['id'];

	$query = "update hp_patient SET p_status='Negative' WHERE p_id = '$id'";;
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: test-result.php");
	} else {
		echo "<script>alert('Something went Wrong.');
			window.location.href = 'test-result.php'</script>";
	}
}

if (isset($_POST['positive'])) {
	$id = $_POST['id'];

	$query = "update hp_patient SET p_status ='Positive' WHERE p_id = '$id'";
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: test-result.php");
	} else {
		echo "<script>alert('Something went Wrong.');
		window.location.href = 'test-result.php'</script>";
	}
}

?>





<!-- patient update result form -->

<?php

include 'dbcon.php';

if (isset($_POST['n_vaccinated'])) {
	$id = $_POST['id'];

	$query = "update hp_patient SET p_status='Not Vaccinated' WHERE p_id = '$id'";;
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: vaccine-result.php");
	} else {
		echo "<script>alert('Something went Wrong.');
			window.location.href = 'vaccine-result.php'</script>";
	}
}

if (isset($_POST['vaccinated'])) {
	$id = $_POST['id'];

	$query = "update hp_patient SET p_status ='Vaccinated' WHERE p_id = '$id'";
	$result = mysqli_query($con, $query);

	if ($result) {
		header("location: vaccine-result.php");
	} else {
		echo "<script>alert('Something went Wrong.');
		window.location.href = 'vaccine-result.php'</script>";
	}
}

?>