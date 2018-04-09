<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>
	<div class="background-fade"></div>

			<!-- header -->
			<header class="header clear" role="banner">
				<div class="mobile-nav-container">
					<h3>Menu</h3>
					<div class="close-menu">
						<i class="fas fa-times"></i>
					</div>
					<div class="mobile-nav">
						<div class="search-container">
							<?php get_template_part('searchform'); ?>
						</div>
						<div class="woocommerce-cart-icon-container">
							<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
								$count = WC()->cart->cart_contents_count;
								?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
								if ( $count > 0 ) {
									?>
									<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
									<?php
								}
									?></a>
								<?php } ?>
						</div>
						<?php wp_nav_menu(array('menu' => 'left-header-menu'));?>
						<?php wp_nav_menu(array('menu' => 'right-header-menu'));?>
					</div>
				</div>
				<div class="top-nav">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-12 col-6 text-md-left">
								 <div class="search-container hidden-md-down">
									<?php get_template_part('searchform'); ?>
								</div> 
								<div class="nav-logo-container">
									<nav class="header-nav left-header-nav hidden-md-down">
										<?php wp_nav_menu(array('menu' => 'left-header-menu'));?>
									</nav>
									<div class="logo-container">
										<img src="<?php echo get_template_directory_uri().'/img/main_logo.png';?>" alt="main-logo"/>
									</div>
									<nav class="header-nav right-header-nav hidden-md-down">
										<?php wp_nav_menu(array('menu' => 'right-header-menu'));?>
									</nav>
								</div>
								<div class="woocommerce-cart-icon-container hidden-md-down">
									<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
										$count = WC()->cart->cart_contents_count;
										?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
										if ( $count > 0 ) {
											?>
											<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
											<?php
										}
											?></a>
										<?php } ?>
								</div>
							</div>
							<div class="col-6 hidden-lg-up text-right">
								<div class="mobile-menu-button">
									<i class="fas fa-bars"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php get_template_part('partial-templates/header-alert');?>
										
			</header>
			<!-- /header -->
