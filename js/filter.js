jQuery('#filters li a').click(function(){
	jQuery(this).addClass('active');
	return false;
});

jQuery(document).ready(function () {
var filterList = {		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				jQuery('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },
    		     
				});								
			
			}
			// Run the show!	

		}
		
		filterList.init();
});



