jQuery(document).ready(function( $ ) {

	jQuery('#politic-popup.popup-with-zoom-anim').magnificPopup({

		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
		
	});

  	jQuery("#policy-check").click(function(){

        if(jQuery("#policy-check:checked").length > 0){

      		jQuery("#politic-popup.popup-with-zoom-anim").click();

        }

	});
	
});