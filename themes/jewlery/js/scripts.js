(function ($, root, undefined) {
	
	$(function () {
		
		//MOBILE MENU
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

		//WOOCOMMERCE CAT CHANGE
		$('.category-changer').on('change', function(){
			var slug = $(this).val();
			window.location.href = unaLune.site_url + '/product-category/'+slug;
		});
		
		//SELECT2
		// $('.category-changer').select2();
		// $('.orderby').select2();
	});
	
})(jQuery, this);
