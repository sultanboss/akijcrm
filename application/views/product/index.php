			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->			
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default">
									<div class="panel_controls">
										<h4 class="heading_a">Products:</h4>
										<div class="row">											
											<div class="col-sm-12">
												<button data-toggle="modal" href="#add_product" class="btn btn-success btn-sm right"><span class="icon-plus"></span> Add Product</button>												
												<div class="modal fade" id="add_product">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Add Product</h4>
															</div>
															<form action="<?php echo base_url(); ?>product/add" method="post" id="parsley_addcat">
															<div class="modal-body">
																<div class="form_sep">
																	<label for="product_name" class="req">Product Name</label>
																	<input id="product_name" name="product_name" class="form-control parsley-validated" data-required="true" type="text">
																</div>
																<div class="form_sep">
																	<div class="col-sm-6 start">
																		<label for="product_name" class="req">Product Code</label>
																		<input id="product_code" name="product_code" class="form-control parsley-validated" data-required="true" type="text">
																	</div>
																	<div class="col-sm-6 end">
																		<label for="product_name" class="req">Product Price</label>
																		<input id="product_price" name="product_price" class="form-control parsley-validated" data-required="true" type="text">
																	</div>
																</div>
																<div class="form_sep">
																	<label for="product_name">Product Descrtiption</label>
																	<textarea id="product_description" name="product_description" class="form-control"></textarea>
																</div>
																<div class="form_sep text-right">
																	<button class="btn btn-success btn-sm" type="submit"><span class="icon-plus"></span> Add Product</button>
																</div>						
															</div>																
															</form>	
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<table id="product_table" class="table table-hover">
										<thead>
											<tr>
												<th width="10%">ID</th>
												<th width="30%">Product Name</th>
												<th width="30%">Product Code</th>
												<th width="20%">Product Price</th>
												<th width="10%">Change</th>
											</tr>
										</thead>
										<tbody></tbody>				
									</table>
									<div class="modal fade" id="edit_product">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Edit product</h4>
												</div>
												<form action="<?php echo base_url(); ?>product/edit" method="post" id="parsley_editcat">
												<div class="modal-body">
													<div class="form_sep">
														<label for="product_name" class="req">Product Name</label>
														<input id="edit_product_name" name="product_name" class="form-control parsley-validated" data-required="true" type="text">
														<input id="edit_product_id" name="product_id" type="hidden" value="">
													</div>	
													<div class="form_sep">
														<div class="col-sm-6 start">
															<label for="product_code" class="req">Product Code</label>
															<input id="edit_product_code" name="product_code" class="form-control parsley-validated" data-required="true" type="text">
														</div>
														<div class="col-sm-6 end">
															<label for="product_price" class="req">Product Price</label>
															<input id="edit_product_price" name="product_price" class="form-control parsley-validated" data-required="true" type="text">
														</div>
													</div>
													<div class="form_sep">
														<label for="product_description">Product Description</label>
														<textarea id="edit_product_description" name="product_description" class="form-control"></textarea>
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