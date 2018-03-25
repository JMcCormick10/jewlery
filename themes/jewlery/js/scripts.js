(function ($, root, undefined) {
	
	$(function () {
		
		$('.mobile-menu-button').click(function(){
			$('.mobile-nav-container').toggleClass('mobile-nav-container-show');
			$('.background-fade').toggleClass('background-fade-show');
		});
		$('.background-fade').click(function(){
			$('.background-fade').removeClass('background-fade-show');
			$('.mobile-nav-container').removeClass('mobile-nav-container-show');
		});
		$('.close-menu').click(function(){
			$('.mobile-nav-container').removeClass('mobile-nav-container-show');
			$('.background-fade').removeClass('background-fade-show');
		});

	});
	
})(jQuery, this);
