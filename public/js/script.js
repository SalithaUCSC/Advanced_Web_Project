$(document).ready(function() {

        var scrollLink = $('.scroll');

        // Smooth scrolling
        scrollLink.click(function(e) {
        e.preventDefault();
        $('body,html').animate({
          scrollTop: $(this.hash).offset().top
        }, 1000 );
        });
  
	  // Active link switching
	  $(window).scroll(function() {
	    var scrollbarLocation = $(this).scrollTop();
	    
	    scrollLink.each(function() {
	      
	      var sectionOffset = $(this.hash).offset().top - 20;
	      
	      if ( sectionOffset <= scrollbarLocation ) {
	        $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');

	      }
	    })
	});

	  

	// (function(){
	// 		const currentImage = document.querySelector('#currentImage');
	// 		const image = document.querySelectorAll('.img-gallery');
	// 		images.forEach((element) => element.addEventListner('click', thumbnailClick));

	// 		function thumbnailClick(e){
	// 			currentImage.src = this.querySelector('img').src;
	// 		}
	// });
	$(function() {
		// OPACITY OF BUTTON SET TO 0%
		$(".roll").css("opacity","0");
		 
		// ON MOUSE OVER
		$(".roll").hover(function () {
		 
		// SET OPACITY TO 90%
		$(this).stop().animate({
		opacity: .9
		}, "fast");
		},           
		// ON MOUSE OUT
		function () {
		 
		// SET OPACITY BACK TO 50%
		$(this).stop().animate({
		opacity: 0
		}, "slow");
		});
		});

});