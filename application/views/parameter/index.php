			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->			
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel_controls">
										<h4 class="heading_a">Parameters:</h4>
										<div class="row">											
											<div class="col-sm-12">
												<button data-toggle="modal" href="#add_parameter" class="btn btn-success btn-sm right"><span class="icon-plus"></span> Add Parameter</button>												
												<div class="modal fade" id="add_parameter">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add Parameter</h4>
															</div>
															<form action="<?php echo base_url(); ?>parameter/add" method="post" id="parsley_addcat">
															<div class="modal-body">
																<div class="form_sep">
																<label for="parameter_name" class="req">Parameter Name</label>
																	<input id="parameter_name" name="parameter_name" class="form-control parsley-validated" data-required="true" type="text">
																</div>
																<div class="form_sep">
																	<label for="parameter_type">Parameter Type</label>						
																	<select name="parameter_type" id="add_par" class="form-control">
																		<?php
																		foreach ($all_parameter_type as $key => $value) {							
																		?>
																		<option value="<?php echo $value['parameter_type_id']; ?>"><?php echo $value['parameter_type_name']; ?></option>
																		<?php						
																		}																	
																		?>				
					                                                </select>
																</div>
																<div class="form_sep text-right">
																	<button class="btn btn-success btn-sm" type="submit"><span class="icon-plus"></span> Add parameter</button>
																</div>						
															</div>																
															</form>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<table id="parameter_table" class="table table-hover">
										<thead>
											<tr>
												<th width="10%">ID</th>
												<th width="40%">Parameter Name</th>
												<th width="40%">Parameter Type</th>
												<th width="10%">Change</th>
											</tr>
										</thead>
										<tbody></tbody>				
									</table>
									<div class="modal fade" id="edit_parameter">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Edit parameter</h4>
												</div>
												<form action="<?php echo base_url(); ?>parameter/edit" method="post" id="parsley_editcat">
												<div class="modal-body">
													<div class="form_sep">
													<label for="parameter_name" class="req">Parameter Name</label>
														<input id="edit_parameter_name" name="parameter_name" class="form-control parsley-validated" data-required="true" type="text">
														<input id="edit_parameter_id" name="parameter_id" type="hidden" value="">
													</div>
													<div class="form_sep">
														<label for="parameter_type">Parameter Type</label>						
														<select name="parameter_type" id="edit_par" class="form-control">								
															<?php
															foreach ($all_parameter_type as $key => $value) {													
															?>
																<option value="<?php echo $value['parameter_type_id']; ?>"><?php echo $value['parameter_type_name']; ?></option>																			
															<?php								
															}																	
															?>					
					                                        </select>
													</div>
													<div class="form_sep text-right">
														<button class="btn btn-success btn-sm" type="submit"><span class="icon-refresh"></span> Update</button>
													</div>						
												</div>																
												</form>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="msg"><?php echo $this->session->flashdata('msg'); ?></div>
						<div class="msg_type"><?php echo $this->session->flashdata('msg_type'); ?></div>

					</div>
				</div>