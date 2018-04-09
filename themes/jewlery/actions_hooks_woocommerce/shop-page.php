<?php

add_action('woocommerce_before_main_content', 'display_shop_banner');

function display_shop_banner(){
    get_template_part('partial-templates/shop-banner');
}


add_action( 'init', 'woo_remove_wc_breadcrumbs' );

function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action('woocommerce_before_main_content', 'remove_sidebar' );
    function remove_sidebar()
    {
        if ( is_shop() ) { 
         remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
       }
    }