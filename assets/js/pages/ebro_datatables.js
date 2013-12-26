/* [ ---- Ebro Admin - datatables ---- ] */

    $(function() {
		ebro_datatables.colReorder_visibility();
		
		//* add placeholder to search input
        $('.dataTables_filter input').each(function() {
            $(this).attr("placeholder", "Search...");
            $(this).attr("class", "form-control");
        }),

        $('.dataTables_length select').each(function() {
            $(this).attr("class", "form-control");
        }),

        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');      
	})
	
	ebro_datatables = {

        //* column reorder & toggle visibility
        colReorder_visibility: function() {
            if($('#parameter_table').length) {
                $('#parameter_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "parameter/data",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');
                        
                        $('#parameter_table').delegate('.par_edit', 'click', function() {
                            $("#edit_parameter_name").val($(this).attr('data-name'));
                            $("#edit_parameter_id").val($(this).attr('data-id'));
                            $("#edit_par").select2("val", $(this).attr('data-type'));
                        });

                        $('#parameter_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#parameter_type_table').length) {
                $('#parameter_type_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "parameter/typedata",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');
                        
                        $('#parameter_type_table').delegate('.par_type_edit', 'click', function() {
                            $("#edit_parameter_type_name").val($(this).attr('data-name'));
                            $("#edit_parameter_type_id").val($(this).attr('data-id'));
                        });

                        $('#parameter_type_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#product_category_table').length) {
                $('#product_category_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "product/categorydata",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');
                        
                        $('#product_category_table').delegate('.par_cat_edit', 'click', function() {
                            $("#edit_product_category_name").val($(this).attr('data-name'));
                            $("#edit_product_category_id").val($(this).attr('data-id'));
                        });

                        $('#product_category_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#groups_table').length) {
                $('#groups_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "groups/data",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');
                        
                        $('#groups_table').delegate('.group_edit', 'click', function() {
                            $("#edit_group_name").val($(this).attr('data-name'));
                            $("#edit_group_id").val($(this).attr('data-id'));
                        });

                        $('#groups_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#users_table').length) {
                $('#users_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "user/data",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');
                        
                        $('#users_table').delegate('.user_edit', 'click', function() {
                            $("#edit_first_name").val($(this).attr('data-fname'));
                            $("#edit_last_name").val($(this).attr('data-lname'));
                            $("#edit_email").val($(this).attr('data-email'));
                            $("#edit_user_id").val($(this).attr('data-id'));
                            $("#edit_group").val($(this).attr('data-group'));
                        });

                        $('#users_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#product_table').length) {
                $('#product_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "product/data",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');
                        
                        $('#product_table').delegate('.pro_edit', 'click', function() {
                            $("#edit_par").select2("val", $(this).attr('data-category'));
                            $("#edit_product_id").val($(this).attr('data-id'));
                            $("#edit_product_price").val($(this).attr('data-price'));                            
                            $("#edit_product_code").val($(this).attr('data-code'));
                            $("#edit_product_description").val($(this).attr('data-description'));
                        });

                        $('#product_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#enquiry_table').length) {
                $('#enquiry_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "enquiry/data",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');

                        $('#enquiry_table').delegate('.enq_edit', 'click', function() {
                            $('#edit_enquiry .modal-body').hide();
                            $('#parsley_editcat').steps("previous");
                            $.ajax({
                                url: base_url + 'enquiry/get/' + this.id,
                                success: function (html) {                                    
                                    var data = jQuery.parseJSON(html);
                                    $('#parsley_editcat #enquiry_name').val(data.enquiry_name);
                                    $('#parsley_editcat #enquiry_id').val(data.enquiry_id);                                    
                                    $('#parsley_editcat #enquiry_contact').val(data.enquiry_contact);
                                    $('#parsley_editcat #enquiry_date').val(data.enquiry_date);
                                    $('#parsley_editcat #enquiry_source').val(data.enquiry_source);
                                    $('#parsley_editcat #enquiry_address').val(data.enquiry_address);
                                    $('#parsley_editcat #enquiry_phone').val(data.enquiry_phone);
                                    $('#parsley_editcat #enquiry_email').val(data.enquiry_email);
                                    $('#parsley_editcat #enquiry_remarks').val(data.enquiry_remarks);

                                    $('#enquiry_edit_product_table > tbody').html('');
                                    for(var i=0; i<data.enquiry_product.length; i++) {                                        
                                        $('#enquiry_edit_product_table > tbody').append('<tr>' + $('#eq_edit_product_form tr').html() + '</tr>');
                                        $('#enquiry_edit_product_table tr:last').find('select.eq_product_name').val(data.enquiry_product[i].product_id);
                                        $('#enquiry_edit_product_table tr:last').find('input.eq_product_qty').val(data.enquiry_product[i].product_quantity);
                                        $('#enquiry_edit_product_table tr:last').find('input.eq_product_rate').val(data.enquiry_product[i].product_rate);
                                        $('#enquiry_edit_product_table tr:last').find('input.eq_product_amount').val(data.enquiry_product[i].product_amount);
                                    }
                                    $('#edit_enquiry .modal-title').html('Update Enquiry');
                                    $('#edit_enquiry .modal-body').show();
                                }
                            });

                            $("#edit_product_name").val($(this).attr('data-name'));
                            $("#edit_product_id").val($(this).attr('data-id'));
                            $("#edit_product_price").val($(this).attr('data-price'));                            
                            $("#edit_product_code").val($(this).attr('data-code'));
                            $("#edit_product_description").val($(this).attr('data-description'));
                        });

                        $('#enquiry_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }

            if($('#followup_table').length) {
                $('#followup_table').dataTable({
                    "sPaginationType": "bootstrap_full",
                    "bSort": false,
                    "iDisplayLength": 25,
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": base_url + "followup/data",
                    "sServerMethod": "POST",
                    "sDom": "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
                    "fnInitComplete": function(oSettings, json) {
                        $('.ColVis_Button').addClass('btn btn-info btn-sm').html('Columns <span class="icon-caret-down"></span>');

                        $('#followup_table').delegate('.enq_edit', 'click', function() {
                            $('#edit_enquiry .modal-body').hide();
                            $('#parsley_followup').steps("previous");
                            $.ajax({
                                url: base_url + 'followup/get/' + this.id,
                                success: function (html) {                                    
                                    var data = jQuery.parseJSON(html);
                                    $('#parsley_followup #enquiry_name').val(data.enquiry_name);
                                    $('#parsley_followup #enquiry_id').val(data.enquiry_id);                                    
                                    $('#parsley_followup #enquiry_contact').val(data.enquiry_contact);
                                    $('#parsley_followup #enquiry_date').val(data.enquiry_date);
                                    $('#parsley_followup #enquiry_source').val(data.enquiry_source);
                                    $('#parsley_followup #enquiry_address').val(data.enquiry_address);
                                    $('#parsley_followup #enquiry_phone').val(data.enquiry_phone);
                                    $('#parsley_followup #enquiry_email').val(data.enquiry_email);
                                    $('#parsley_followup #enquiry_remarks').val(data.enquiry_remarks);
                                    $('#eq_followup_next_date').val(data.eq_followup_date);

                                    $('#enquiry_edit_product_table > tbody').html('');
                                    for(var i=0; i<data.enquiry_followup.length; i++) {                                        
                                        $('#enquiry_edit_product_table > tbody').append('<tr>' + $('#eq_edit_product_form tr').html() + '</tr>');
                                        $('#enquiry_edit_product_table tr:last').find('input.eq_followup_date').val(data.enquiry_followup[i].followup_date);
                                        $('#enquiry_edit_product_table tr:last').find('input.eq_followup_time').val(data.enquiry_followup[i].followup_time);
                                        $('#enquiry_edit_product_table tr:last').find('select.eq_followup_type').val(data.enquiry_followup[i].followup_type);
                                        $('#enquiry_edit_product_table tr:last').find('textarea.eq_followup_remarks').val(data.enquiry_followup[i].followup_remarks);
                                    }
                                    $('#edit_enquiry .modal-title').html('Enquiry Followup - #' + data.enquiry_id);
                                    $('#edit_enquiry .modal-body').show();
                                }
                            });

                            $("#edit_product_name").val($(this).attr('data-name'));
                            $("#edit_product_id").val($(this).attr('data-id'));
                            $("#edit_product_price").val($(this).attr('data-price'));                            
                            $("#edit_product_code").val($(this).attr('data-code'));
                            $("#edit_product_description").val($(this).attr('data-description'));
                        });

                        $('#followup_table').delegate('.bootbox_confirm', 'click', function(e) {
                            e.preventDefault();
                            var link = $(this).attr("href");     
                            bootbox.confirm("<span class='icon-question icon-4x dil-icon'></span>Are you sure you want to delete this item?", function(result) {
                                if(result == true) {
                                    location.href = link;
                                }
                            }); 
                        });
                    }
                });
            }
        }
	}