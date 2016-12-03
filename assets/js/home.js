
$(document).ready(function () {
   /*==================================
	Home Page Slider 
	====================================*/
   	 $('.slider-v1').cycle({
        //Specify options
        fx: 'scrollHorz', //Name of transition effect 
        slides: '.slider-item',
        timeout: 5000, // set time for nex slide 
        speed: 1200,
        easeIn: 'easeInOutExpo', // easing 
        easeOut: 'easeInOutExpo',
        pager: '#pager2', //Selector for element to use as pager container 
    });


    $('.slider-v2').cycle({
        //Specify options
        fx: 'scrollHorz', //Name of transition effect 
        slides: '.slider-item',
        timeout: 5000, // set time for nex slide 
        speed: 1200,
        easeIn: 'easeInOutExpo', // easing 
        easeOut: 'easeInOutExpo',
        pager: '#pager', //Selector for element to use as pager container 
    });
	
	
	 // show loading image
    $('#loader_img').show();

    // main image loaded 
    $('.sliderImg').load(function () {
        // hide/remove the loading image
        $('#loader_img').hide();
    });
	

	

}); // end Ready