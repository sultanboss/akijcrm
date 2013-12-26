			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->			
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel_controls">
										<h4 class="heading_a">Enquires:</h4>
										<div class="row">											
											<div class="col-sm-12">
												<button data-toggle="modal" href="#add_enquiry" class="btn btn-success btn-sm right"><span class="icon-plus"></span> Add Enquiry</button>												
												<div class="modal fade" id="add_enquiry">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add Enquiry</h4>
															</div>																																
															<div class="modal-body">
																<form action="<?php echo base_url(); ?>enquiry/add" method="post" id="enq_addcat">								
																<h4>Enquiry Details</h4>
																<fieldset>
																	<div class="row">																		
																		<div class="col-sm-12">
																			<div class="form_sep">
																				<div class="col-sm-6 start">
																					<label for="enquiry_name" class="req">Name</label>
																					<input id="enquiry_name" name="enquiry_name" class="form-control" type="text">
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_contact" class="req">Contact Person</label>
																					<input id="enquiry_contact" name="enquiry_contact" class="form-control" type="text">
																				</div>
																			</div>
																			<div class="form_sep">
																				<div class="col-sm-6 start">																				
																					<label for="enquiry_date" class="req">Date</label>
																					<div class="input-group date ebro_datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
									                                                    <input id="enquiry_date" name="enquiry_date" class="form-control" type="text">
																						<span class="input-group-addon"><i class="icon-calendar"></i></span>
									                                                </div>																					
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_source" class="unreq">Source</label>						
																					<select id="enquiry_source" name="enquiry_source" class="form-control">
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
																				<textarea id="enquiry_address" name="enquiry_address" class="form-control"></textarea>
																			</div>
																			<div class="form_sep">
																				<div class="col-sm-6 start">
																					<label for="enquiry_phone" class="req">Telephone</label>
																					<input id="enquiry_phone" name="enquiry_phone" class="form-control" data-type="phone" type="text">
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_email" class="req">Email</label>
																					<input id="enquiry_email" name="enquiry_email" class="form-control" data-type="email" type="text">
																				</div>
																			</div>
																			<div class="form_sep">
																			<label for="enquiry_remarks">Remarks</label>
																				<textarea id="enquiry_remarks" name="enquiry_remarks" class="form-control"></textarea>
																			</div>
																		</div>
																	</div>
																</fieldset>
																<h4>Product Details</h4>
																<fieldset>
																	<div class="row ">
																		<div class="col-sm-12">	
																			<table id="enquiry_product_table" class="table table-striped table-hover table-modal">
																				<thead>
																					<tr>
																						<th width="40%">Product Name</th>
																						<th width="18%">Qty</th>
																						<th width="18%">Rate</th>
																						<th width="18%">Amount</th>																							
																						<th width="6%"></th>																					
																					</tr>
																				</thead>
																				<tbody>	
																				</tbody>																					
																			</table>
																			<button class="btn btn-info btn-sm" id="btn_product_add"><span class="icon-plus"></span> Add Product</button>
																			<table id="eq_add_product_form" style="display: none;">
																				<tr>
																						<td>
																							<select name="eq_product_name" class="eq_product_name form-control">
																								<option>-</option>
																								<?php
																								foreach ($products as $key => $value) {							
																								?>
																								<option id="<?php echo $value['product_price']; ?>" value="<?php echo $value['product_id']; ?>"><?php echo $value['product_code'].' - '.$value['product_category_name']; ?></option>
																								<?php						
																								}																	
																								?>				
										                                                	</select>
																						</td>
																						<td>
																							<input name="eq_product_qty" class="eq_product_qty form-control" type="text" value="1">
																						</td>
																						<td>
																							<input name="eq_product_rate" class="eq_product_rate form-control" type="text" value="0">
																						</td>
																						<td>
																							<input name="eq_product_amount" class="eq_product_amount form-control" type="text" value="0" readonly="true">
																						</td>
																						<td>
																							<button class="eq_add_product_form_remove btn btn-danger btn-sm"><span class="icon-remove"></span></button>
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
									<table id="enquiry_table" class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="10%">ID</th>
												<th width="15%">Date</th>
												<th width="20%">Name</th>
												<th width="20%">Contact Person</th>
												<th width="15%">Phone</th>
												<th width="10%">Change</th>
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
																<form action="<?php echo base_url(); ?>enquiry/edit" method="post" id="parsley_editcat">								
																<h4>Enquiry Details</h4>
																<fieldset>
																	<div class="row">																		
																		<div class="col-sm-12">
																			<div class="form_sep">
																				<div class="col-sm-6 start">
																					<label for="enquiry_name" class="req">Name</label>
																					<input id="enquiry_name" name="enquiry_name" class="form-control" type="text">
																					<input id="enquiry_id" name="enquiry_id" type="hidden">
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_contact" class="req">Contact Person</label>
																					<input id="enquiry_contact" name="enquiry_contact" class="form-control" type="text">
																				</div>
																			</div>
																			<div class="form_sep">
																				<div class="col-sm-6 start">																				
																					<label for="enquiry_date" class="req">Date</label>
																					<div class="input-group date ebro_datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
									                                                    <input id="enquiry_date" name="enquiry_date" class="form-control" type="text">
																						<span class="input-group-addon"><i class="icon-calendar"></i></span>
									                                                </div>																					
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_source" class="unreq">Source</label>						
																					<select id="enquiry_source" name="enquiry_source" class="form-control">
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
																				<textarea id="enquiry_address" name="enquiry_address" class="form-control"></textarea>
																			</div>
																			<div class="form_sep">
																				<div class="col-sm-6 start">
																					<label for="enquiry_phone" class="req">Telephone</label>
																					<input id="enquiry_phone" name="enquiry_phone" class="form-control" data-type="phone" type="text">
																				</div>
																				<div class="col-sm-6 end">
																					<label for="enquiry_email" class="req">Email</label>
																					<input id="enquiry_email" name="enquiry_email" class="form-control" data-type="email" type="text">
																				</div>
																			</div>
																			<div class="form_sep">
																			<label for="enquiry_remarks">Remarks</label>
																				<textarea id="enquiry_remarks" name="enquiry_remarks" class="form-control"></textarea>
																			</div>
																		</div>
																	</div>
																</fieldset>
																<h4>Product Details</h4>
																<fieldset>
																	<div class="row ">
																		<div class="col-sm-12">	
																			<table id="enquiry_edit_product_table" class="table table-striped table-hover table-modal">
																				<thead>
																					<tr>
																						<th width="40%">Product Name</th>
																						<th width="18%">Qty</th>
																						<th width="18%">Rate</th>
																						<th width="18%">Amount</th>																							
																						<th width="6%"></th>																					
																					</tr>
																				</thead>
																				<tbody>	
																				</tbody>																					
																			</table>
																			<button class="btn btn-info btn-sm" id="btn_product_edit"><span class="icon-plus"></span> Add Product</button>
																			<table id="eq_edit_product_form" style="display: none;">
																				<tr>
																						<td>
																							<select name="eq_product_name" class="eq_product_name form-control">
																								<option>-</option>
																								<?php
																								foreach ($products as $key => $value) {							
																								?>
																								<option id="<?php echo $value['product_price']; ?>" value="<?php echo $value['product_id']; ?>"><?php echo $value['product_code'].' - '.$value['product_category_name']; ?></option>
																								<?php						
																								}																	
																								?>				
										                                                	</select>
																						</td>
																						<td>
																							<input name="eq_product_qty" class="eq_product_qty form-control" type="text" value="1">
																						</td>
																						<td>
																							<input name="eq_product_rate" class="eq_product_rate form-control" type="text" value="0">
																						</td>
																						<td>
																							<input name="eq_product_amount" class="eq_product_amount form-control" type="text" value="0" readonly="true">
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