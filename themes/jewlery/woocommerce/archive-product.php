<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
if (!is_product_category()){
    $shop_id = get_option( 'woocommerce_shop_page_id' ); 
    $shop_banner_description = get_field('shop_banner_description', $shop_id);
    $shop_banner_title = get_field('shop_banner_title', $shop_id);
}
else {
    global $post;
    $term = get_the_terms( $post->ID, 'product_cat' )[0];
    $product_cat = 'product_cat_'.$term->term_id;
    $shop_banner_description = get_field('shop_banner_description', $product_cat);
    $shop_banner_title = get_field('shop_banner_title', $product_cat);

}

?>

<section class="woocommerce-shop-container">
<!--    <?php /*if (!empty($shop_banner_description)): */?>
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 ml-auto mr-auto">
                <div class="shop-banner-text-container">
                    <h2 class="shop-banner-title text-center"><?php /*echo $shop_banner_title;*/?></h2>
                    <div class="shop-banner-description"><?php /*echo $shop_banner_description;*/?></div>
                </div>
            </div>
        </div>
    </div>
    --><?php /*endif */?>
    <div class="container full-width-mobile-container">
        <div class="row">
            <div class="col-12">
                <div class="shop-list-wrapper">
                    <header class="woocommerce-products-header">
                        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                        <?php endif; ?>

                        <?php
                        /**
                         * Hook: woocommerce_archive_description.
                         *
                         * @hooked woocommerce_taxonomy_archive_description - 10
                         * @hooked woocommerce_product_archive_description - 10
                         */
                        // do_action( 'woocommerce_archive_description' );
                        
                        ?>
                        <?php 
                        $taxonomy     = 'product_cat';
                        $orderby      = 'name';  
                        $show_count   = 0;      // 1 for yes, 0 for no
                        $pad_counts   = 0;      // 1 for yes, 0 for no
                        $hierarchical = 1;      // 1 for yes, 0 for no  
                        $title        = '';  
                        $empty        = 0;

                        $current=get_queried_object()->term_id;

                        $args = array(
                                'taxonomy'     => $taxonomy,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                        );
                        $cats = get_categories( $args );
                        // var_dump($all_categories);die();
                        ?>
                        <div class="cat-search-container">
                            <select class="category-changer">
                                <?php foreach ($cats as $cat):
                                    $selected  = $current == $cat->term_id ? 'selected' : ''
                                ?>
                                    <option value="<?php echo $cat->slug;?>" <?php echo $selected ?>><?php echo $cat->name;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </header>
                    <?php
                    if ( have_posts() ) {

                        /**
                         * Hook: woocommerce_before_shop_loop.
                         *
                         * @hooked wc_print_notices - 10
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        do_action( 'woocommerce_before_shop_loop' );

                        woocommerce_product_loop_start();

                        if ( wc_get_loop_prop( 'total' ) ) {
                            while ( have_posts() ) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 *
                                 * @hooked WC_Structured_Data::generate_product_data() - 10
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );
                            }
                        }

                        woocommerce_product_loop_end();

                        /**
                         * Hook: woocommerce_after_shop_loop.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action( 'woocommerce_after_shop_loop' );
                    } else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         *
                         * @hooked wc_no_products_found - 10
                         */
                        do_action( 'woocommerce_no_products_found' );
                    }

                    /**
                     * Hook: woocommerce_after_main_content.
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action( 'woocommerce_after_main_content' );

                    /**
                     * Hook: woocommerce_sidebar.
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    do_action( 'woocommerce_sidebar' );

                    get_footer( 'shop' );?>
                </div>
            </div>
        </div>
    </div>
</section>
