<?php include('inc.header.php')?>
<?php include('inc.sidebar.php')?>

      <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head align-items-center d-flex mb-sm-4 mb-3">
					<div class="mr-auto">
						<h2 class="text-black font-w600">List of vaccine</h2>
						<p class="mb-0">List of all vaccine</p>
					</div>	
					<?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "hospital" ) { ?>
					<div>
						<a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+New Vaccine</a>
					</div>
					<?php } ?>
				</div>
				<!-- Add vacine -->
				<div class="modal fade" id="addOrderModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Vaccine</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post" action="action.php">
									<div class="form-group">
										<label class="text-black font-w500">Vaccine Title</label>
										<input type="text" class="form-control" name="vac_title" required>
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Vaccine Name</label>
										<input type="text" class="form-control" name="vac_name" required>
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Approved Countries</label>
										<input type="text" class="form-control" name="vac_approved_country" required>
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Total Trails</label>
										<input type="text" class="form-control" name="vac_trails" required>
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Trails Country</label>
										<input type="text" class="form-control" name="vac_trials_country" required>
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Vaccine Link</label>
										<input type="text" class="form-control" name="vac_link" required>
									</div>
									<div class="form-group ">
										<label class="text-black font-w500">Select Color</label>
                                            <select class="form-control form-control-lg " name="v_color" required>
												<option selected="true" disabled="disabled">--Select--</option>
                                                <option value="Pink">Pink</option>
                                                <option value="Magenta Red">Magenta Red</option>
                                                <option value="Orange">Orange</option>
                                            </select>
                                        </div>
									<div class="form-group ">
										<label class="text-black font-w500">Status</label>
                                            <select class="form-control form-control-lg " name="v_status" required>
												<option selected="true" disabled="disabled">--Select--</option>
                                                <option value="Available">Available</option>
                                                <option value="Unavailable">Unavailable</option>
                                            </select>
                                        </div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary" name="create">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="card-table row d-flex ">
							<?php	
							   include 'dbcon.php';

							   $result =  mysqli_query($con, "SELECT * FROM hp_vaccine inner join hp_vacine_type on hp_vaccine.type_id = hp_vacine_type.id ");

							   while($row = mysqli_fetch_assoc($result)){
								  $items[] = $row;

								   $vacine_color = "";
								   if($row['color'] == "Pink"){
										$vacine_color = "bg_pink";
								   }
								   else if($row['color'] == "Magenta Red"){
										$vacine_color = "bg_purple";
								   }
								   else if($row['color'] == "Orange"){
										$vacine_color = "bg_orange";
								   }
								   else{
										$vacine_color = "bg_pink";
								   }

								   ?>
									<div class="col-md-4">
									  <a href="<?php echo $row['link']?>" target="_blank">
										<div class="vaccine_card <?= $vacine_color; ?> mb-4">
										  <p class="vacine_left_text"><?php echo $row['name']?></p>
											<h3 class="vacine_title"><?php echo $row['sub_name']?></h3>
											  <img src="images/card/progess-bar.png" alt="..." class="pb-2 img-fluid">
											 <p class="text-center mb-0"><strong>Approved</strong> in <?php echo $row['aprroved_country']?> countries</p>
											<p class="text-center "><strong><?php echo $row['trails_count']?> trials</strong> in <?php echo $row['trails_country']?> countries</p> 
										   <p class="text-center"><strong>Status:</strong> <?php echo $row['status']?></p> 
										</div>
									   </a>
									 </div>
							
								   <?php
								}
							?>
						</div>
					</div>
				</div>
            </div>
        </div>

<?php include('inc.footer.php')?>
<!--Main wrapper end-->
<?php include('inc.script.php')?>       