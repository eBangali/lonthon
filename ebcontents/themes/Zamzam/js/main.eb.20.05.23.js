$(document).ready(function(){
	/*Pre Loader*/
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	//
    $('section#screenshots a').on('click', function(){
        $('div#modal img').attr('src', $(this).attr('data-image-url'));
    });
	
	var navB = $('.navbar-fixed-top');
	
	$(window).scroll(function(){
		var scro = $(window).scrollTop();
		//consol.log(scro);
		
		if(scro >= 300)
	{
		navB.addClass('effect');
	}
	else
	{
		navB.removeClass('effect');
	}
		});
/* #carouse */
$('.carousel-inner .item h4').waypoint(function(){
	$(this.element).addClass('animated infinite zoomInDown')
	},{
	offset:'50%'
});	

/* #home Animation with jquery.waypoints.min.js and animate.css */
$('#home .homeCircle').waypoint(function(){
	$('#home .homeCircle').addClass('animated fadeInUp')
	},{
	offset:'50%'
});

/* #features */
$('#features .featuresCircle').waypoint(function(){
	$(this.element).addClass('animated fadeInUp')
	},{
	offset:'50%'
});		
/* #features .featureImage */
$('.featureImage img').waypoint(function(){
	$('.featureImage img').addClass('animated flip')
	},{
	offset:'80%'
});
/* #services */
$('#services .servicesCircle').waypoint(function(){
	$(this.element).addClass('animated fadeInUp')
	},{
	offset:'50%'
});	
/* #video .featureImage */
$('#video .thumbnail').waypoint(function(){
	$('#video .thumbnail').addClass('animated zoomIn')
	},{
	offset:'80%'
});
/* #screenshots */
$('#screenshots .col-xs-4').waypoint(function(){
	$(this.element).addClass('animated zoomIn');
	$(this.element).css({'opacity':1});
	},{
	offset:'50%'
});	

/* #technology */
$('#technology .technologyCircle').waypoint(function(){
	$('#technology .technologyCircle').addClass('animated fadeInUp')
	},{
	offset:'50%'
});

/* #contact */
$('#contact h3').waypoint(function(){
	$('#contact h3').addClass('animated bounceInRight')
	},{
	offset:'50%'
});

//	
/* #portfolio*/
$('#portfolio .homeCategory').waypoint(function(){
	$(this.element).addClass('animated zoomIn');
	$(this.element).css({'opacity':1});
	},{
	offset:'80%'
});	

//
});