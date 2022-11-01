<?php include('inc.header.php')?>
<?php include('inc.sidebar.php')?>

      <div class="content-body">
           
			<div class="container-fluid">
				<div class="form-head align-items-center d-flex mb-sm-4 mb-3">
					<div class="mr-auto">
						<h2 class="text-black font-w600">Welcome to the Patient Registration</h2>
						<p class="mb-0">Please Insert your Details</p>							
					</div>				
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Patient Form</h4>							
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" enctype="multipart/form-data" action="action.php"> 

                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label>First Name</label>
                                                <input type="text" class="form-control"  name="p_fname" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control"  name="p_lname" required>
                                        </div>
										<div class="form-group col-md-6">
											<label>Age</label>
                                             <input type="number" class="form-control" name="p_age" required>
                                        </div> 
                                        <div class="form-group col-md-6">
											<label>Phone Number</label>
                                             <input type="number" class="form-control" name="p_number" required>
                                        </div> 
                                        <div class="form-group col-md-12">
                                            <label>Gender:</label>
                                            <select class="form-control default-select" name="p_gender">
                                            <option selected="true"  disabled="disabled">Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
											<label>Email or username</label>
											<input type="email" class="form-control"  name="p_email" required>
                                        </div>	
										<div class="form-group col-md-12">
											<label>Set Password</label>
											<input type="password" class="form-control"  name="p_pass" required>
                                        </div>	
                                        <div class="form-group col-md-12">
                                            <label>Treatment Type:</label>
                                            <select class="form-control default-select" name="p_treatment" id="p_treatment">
                                            <option selected="true"  disabled="disabled">Choose Treatment</option>
                                                <option value="covid test">COVID Test</option>
                                                <option value="covid vaccination">COVID vaccination</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label>Select Hospital:</label>
                                            <select  class="form-control default-select" name="p_hospital">
                                            <option selected="true"  disabled="disabled">Choose Hospital</option>
                                            <?php 
                                            include 'dbcon.php';
                                            $status = "true";
                                            $result = mysqli_query($con, 'SELECT name FROM hp_hospital where status = "'.$status.'" ');
                                            while ($data = mysqli_fetch_assoc($result)) {
                                            ?>
                                           <option value="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></option>
                                           <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 custom_open d-none">
                                            <label>Vaccine:</label>
                                            <select class="form-control " name="p_vaccine">
                                            <option selected="true"  disabled="disabled">Choose Vaccine</option>
                                            <?php 
                                            include 'dbcon.php';
                                            $result = mysqli_query($con, 'SELECT sub_name FROM hp_vaccine');
                                            while ($data = mysqli_fetch_assoc($result)) {
                                            ?>
                                           <option value="<?php echo $data['sub_name']?>"><?php echo $data['sub_name'] ?></option>
                                           <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group col-md-12 mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="fileToUpload2" id="fileToUpload2" required>
                                                <label class="custom-file-label">Upload Photo</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
									    </div>
                                        <button type="submit" class="btn btn-primary" name="p_submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
            </div>
        </div>

<?php include('inc.footer.php')?>
<!--Main wrapper end-->
<?php include('inc.script.php')?>       