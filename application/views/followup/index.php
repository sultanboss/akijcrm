			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->			
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel_controls">
										<h4 class="heading_a">Followups:</h4>
										<div style="height: 30px;"></div>
									</div>
									<table id="followup_table" class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="10%">Enquiry ID</th>
												<th width="15%">Enquiry Date</th>
												<th width="20%">Customer Name</th>
												<th width="20%">Phone</th>
												<th width="15%">Next Followup Date</th>
												<th width="10%">View</th>
											</tr>
										</thead>
										<tbody></tbody>				
									</table>

												<div class="modal fade" id="edit_enquiry">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title"><span class="icon-spinner icon-spin icon-large"></span> Loading...</h4>
															</div>																																
															<div class="modal-body">
																<form action="<?php echo base_url(); ?>enquiry/edit" method="post" id="parsley_followup">								
																<h4>Enquiry Details</h4>
																<fieldset>
																	<div class="row">																		
																		<div class="col-sm-12">
																			<div class="form_sep">
																				<div class="col-sm-6 start">
																					<label for="enquiry_name" class="req">Name</label>
																					<input id="enquiry_name" name="enquiry_name" readonly="true" class="form-control" type="text">
																					<input id="enquiry_id" name="enquiry_id" type="hidden">
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_contact" class="req">Contact Person</label>
																					<input id="enquiry_contact" name="enquiry_contact" readonly="true" class="form-control" type="text">
																				</div>
																			</div>
																			<div class="form_sep">
																				<div class="col-sm-6 start">																				
																					<label for="enquiry_date" class="req">Date</label>
																					<div class="input-group date" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
									                                                    <input id="enquiry_date" name="enquiry_date" readonly="true" class="form-control parsley-validated" data-required="true" type="text">
																						<span class="input-group-addon"><i class="icon-calendar"></i></span>
									                                                </div>																					
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_source" class="unreq">Source</label>						
																					<select id="enquiry_source" name="enquiry_source" disabled="disabled" ="true" class="form-control">																						
																						<?php
																						foreach ($source_parameter as $key => $value) {							
																						?>
																						<option value="<?php echo $value['parameter_id']; ?>"><?php echo $value['parameter_name']; ?></option>
																						<?php						
																						}																	
																						?>				
									                                                </select>
																				</div>
																			</div>
																			<div class="form_sep">
																				<label for="enquiry_address">Address</label>
																				<textarea id="enquiry_address" name="enquiry_address" readonly="true" class="form-control"></textarea>
																			</div>
																			<div class="form_sep">
																				<div class="col-sm-6 start">
																					<label for="enquiry_phone" class="req">Telephone</label>
																					<input id="enquiry_phone" name="enquiry_phone" readonly="true" class="form-control" data-type="phone" type="text">
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_email" class="req">Email</label>
																					<input id="enquiry_email" name="enquiry_email" readonly="true" class="form-control" data-type="email" type="text">
																				</div>
																			</div>
																			<div class="form_sep">
																			<label for="enquiry_remarks">Remarks</label>
																				<textarea id="enquiry_remarks" name="enquiry_remarks" readonly="true" class="form-control"></textarea>
																			</div>
																		</div>
																	</div>
																</fieldset>
																<h4>Followup Details</h4>
																<fieldset>
																	<div class="row ">
																		<div class="col-sm-12">	
																			<table id="enquiry_edit_product_table" class="table table-striped table-hover table-modal">
																				<thead>
																					<tr>
																						<th width="25%">Date</th>
																						<th width="25%">Time</th>
																						<th width="20%">Type</th>
																						<th width="25%">Remarks</th>																							
																						<th width="5%"></th>																					
																					</tr>
																				</thead>
																				<tbody>	
																				</tbody>																					
																			</table>
																			<div class="col-sm-5 start fleft">	
																				<button class="btn btn-info btn-sm" id="btn_product_edit"><span class="icon-plus"></span> Add Followup</button>
																			</div>
																			<div class="col-sm-7 end">	
																				<span class="nxt_followup">Next Followup Date: </span>
																				<div class="input-group date ebro_datepicker fright" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
												                                    <input id="eq_followup_next_date" name="eq_followup_next_date" class="form-control" type="text">
																					<span class="input-group-addon"><i class="icon-calendar"></i></span>
												                                </div>
												                            </div>

												                            <div style="height: 150px;"></div>

																			<table id="eq_edit_product_form" style="display: none;">
																				<tr>
																						<td>
																							<div class="input-group date ebro_datepicker_add" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
											                                                    <input id="eq_followup_date" name="eq_followup_date" value="<?php echo date('Y-m-d');?>" class="form-control" type="text">
																								<span class="input-group-addon"><i class="icon-calendar"></i></span>
											                                                </div>
																						</td>
																						<td>
																							<div class="input-group bootstrap-timepicker">
											                                                    <input id="eq_followup_time" name="eq_followup_time" type="text" class="eq_followup_time form-control">
											                                                    <span class="input-group-addon"><i class="icon-time"></i></span>
											                                                </div>
																						</td>
																						<td>																								
																							<select name="eq_followup_type" class="eq_followup_type form-control">
																								<option>-</option>
																								<?php
																								foreach ($followup_parameter as $key => $value) {							
																								?>
																								<option value="<?php echo $value['parameter_id']; ?>"><?php echo $value['parameter_name']; ?></option>
																								<?php						
																								}																	
																								?>			
										                                                	</select>
																						</td>
																						<td>
																							<textarea name="eq_followup_remarks" class="eq_followup_remarks form-control"></textarea>
																						</td>
																						<td>
																							<button class="eq_edit_product_form_remove btn btn-danger btn-sm"><span class="icon-remove"></span></button>
																						</td>
																				</tr>
																			</table>														
																		</div>
																	</div>
																</fieldset>
																</form>						
															</div>										
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