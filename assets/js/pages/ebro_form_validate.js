/* [ ---- Ebro Admin - form validate ---- ] */

	$(function() {
		//* parsley validate
		ebro_validate.init();
		ebro_validate.extended();
	});
	
	//* parsley validate
	ebro_validate = {
		init: function() {
			if($('#parsley_addcat').length) {
				$('#parsley_addcat').parsley({
					errors: {
						classHandler: function ( elem, isRadioOrCheckbox ) {
							if(isRadioOrCheckbox) {
								return $(elem).closest('.form_sep');
							}
						},
						container: function (element, isRadioOrCheckbox) {
							if(isRadioOrCheckbox) {
								return element.closest('.form_sep');
							}
						}
					}
				});
			}
			if($('#parsley_editcat').length) {
				$('#parsley_editcat').parsley({
					errors: {
						classHandler: function ( elem, isRadioOrCheckbox ) {
							if(isRadioOrCheckbox) {
								return $(elem).closest('.form_sep');
							}
						},
						container: function (element, isRadioOrCheckbox) {
							if(isRadioOrCheckbox) {
								return element.closest('.form_sep');
							}
						}
					}
				});
			}
			if($('#parsley_importBusiness').length) {
				$('#parsley_importBusiness').parsley({
					errors: {
						classHandler: function ( elem, isRadioOrCheckbox ) {
							if(isRadioOrCheckbox) {
								return $(elem).closest('.form_sep');
							}
						},
						container: function (element, isRadioOrCheckbox) {
							if(isRadioOrCheckbox) {
								return element.closest('.form_sep');
							}
						}
					}
				});
			}
		},
		extended: function() {
			//* select2
			if($('#add_par').length) {
				$('#add_par').select2({
					allowClear: true,
					placeholder: "Select..."
				});
				//* remove default form-controll class
				setTimeout(function() {
					$('.select2-container').each(function() {
						$(this).removeClass('form-control')
					})
				})
			}
			if($('#edit_par').length) {
				$('#edit_par').select2({
					allowClear: true,
					placeholder: "Select..."
				});
				//* remove default form-controll class
				setTimeout(function() {
					$('.select2-container').each(function() {
						$(this).removeClass('form-control')
					})
				})
			}
			if($('#add_enq_par').length) {
				$('#add_enq_par').select2({
					allowClear: true,
					placeholder: "Select..."
				});
				//* remove default form-controll class
				setTimeout(function() {
					$('.select2-container').each(function() {
						$(this).removeClass('form-control')
					})
				})
			}
			if($('#add_country').length) {
				
				function format(state) {
					if (!state.id) return state.text;
					return '<i class="flag-' + state.id + '"></i>' + state.text;
				}
				
				$('#add_country').select2({
					placeholder: "Select Country",
					formatResult: format,
					formatSelection: format,
					escapeMarkup: function(markup) { return markup; }
				});

				//* remove default form-controll class
				setTimeout(function() {
					$('.select2-container').each(function() {
						$(this).removeClass('form-control')
					})
				})
			}
			if($('#edit_country').length) {
				
				function format(state) {
					if (!state.id) return state.text;
					return '<i class="flag-' + state.id + '"></i>' + state.text;
				}
				
				$('#edit_country').select2({
					placeholder: "Select Country",
					formatResult: format,
					formatSelection: format,
					escapeMarkup: function(markup) { return markup; }
				});

				//* remove default form-controll class
				setTimeout(function() {
					$('.select2-container').each(function() {
						$(this).removeClass('form-control')
					})
				})
			}
		}
	}
