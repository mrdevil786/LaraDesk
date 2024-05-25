(function($) {
	"use strict";
	
	//accordion-wizard
	var options = {
		mode: 'wizard',
		autoButtonsNextClass: 'btn btn-primary float-left',
		autoButtonsPrevClass: 'btn btn-info',
		stepNumberClass: 'badge badge-pill badge-primary ml-1',
		onSubmit: function() {
		  alert('Form submitted!');
		  return true;
		}
	}
	$( "#form" ).accWizard(options);
	
})(jQuery);    