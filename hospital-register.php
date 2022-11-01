<?php include('inc.header.php')?>
<?php include('inc.sidebar.php')?>

      <div class="content-body">
           
			<div class="container-fluid">
				<div class="form-head align-items-center d-flex mb-sm-4 mb-3">
					<div class="mr-auto">
						<h2 class="text-black font-w600">Welcome to the Hospital Registration</h2>
						<p class="mb-0">Please Insert Your Details</p>							
					</div>
					<div id="message_box" class="alert alert-primary solid alert-dismissible fade show d-none">
						<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
						<strong>Welcome!</strong> Message has been sent.
						<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
					  </button>
                     </div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Hospital Registration Form</h4>							
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" enctype="multipart/form-data" action="action.php"> 

                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Hospital Name</label>
                                            <input type="text" class="form-control"  name="hp_name" required>
                                        </div>
										<div class="form-group col-md-6">
											<label>First Name</label>
											<input type="text" class="form-control"  name="u_first_name" required>
                                        </div>
										<div class="form-group col-md-6">
											<label>Last Name</label>
											<input type="text" class="form-control"  name="u_last_name" required>
                                        </div>
										<div class="form-group col-md-12">
											<label>Email or username</label>
											<input type="email" class="form-control"  name="u_email" required>
                                        </div>	
										<div class="form-group col-md-12">
											<label>Enter Password</label>
											<input type="password" class="form-control"  name="u_pass" required>
                                        </div>		
                                        <div class="form-group col-md-12">
											<label>Address</label>
                                             <input type="text" class="form-control" name="hp_address">
                                        </div> 
										<div class="form-group col-md-4">
											<label>Contact Number</label>
                                             <input type="number" class="form-control" name="hp_contact_1" required>
                                        </div> 	
										<div class="form-group col-md-4">
											<label>Fax Number</label>
                                             <input type="number" class="form-control" name="hp_contact_2">
                                        </div> 	
										<div class="form-group col-md-4">
											<label>Landline Number</label>
                                             <input type="number" class="form-control" name="hp_contact_3">
                                        </div> 	
										<div class="form-group col-md-12">
											<label>Hospital Email</label>
                                             <input type="email" class="form-control" name="hp_email" required>
                                        </div> 	
										<div class="form-group col-md-12">
											<label>Hospital Website</label>
                                             <input type="text" class="form-control" name="hp_web">
                                        </div> 	
										<div class="form-group col-md-4">
											<label>Primary Color</label>
                                             <input type="color" class="form-control" name="hp_primary_color">
                                        </div>
										<div class="form-group col-md-4">
											<label>Secondary Color</label>
                                             <input type="color" class="form-control" name="hp_secondary_color">
                                        </div>
										<div class="form-group col-md-4">
											<label>Theme Color</label>
                                             <input type="color" class="form-control" name="hp_theme_color">
                                        </div>
										<div class="form-group col-md-12">
											<label>Google Map Location link</label>
                                             <input type="text" class="form-control" name="hp_map">
                                        </div>									

										<div class="input-group col-md-12 mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" required>
                                                <label class="custom-file-label">Upload Logo</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
										</div>
                                        <button type="submit" class="btn btn-primary" name="hp_submit">Submit</button>
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