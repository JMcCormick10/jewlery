<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
do_action( 'woocommerce_before_main_content' );
?>

<section class="woocommerce-single-product-container">
    <div class="container full-width-mobile-container">
        <div class="row">
            <div class="col-12">
                <div class="shop-list-wrapper">
                <?php
                            /**
                             * woocommerce_before_main_content hook.
                             *
                             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                             * @hooked woocommerce_breadcrumb - 20
                             */
                        ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php wc_get_template_part( 'content', 'single-product' ); ?>

                            <?php endwhile; // end of the loop. ?>
                            <?php if (have_rows('product_materials')):?>
                            <div class="material-container row">
                                <?php while(have_rows('product_materials')): the_row();
                                $material_image = get_sub_field('material_image');
                                $material_src = $material_image['sizes']['medium'];
                                $material_alt = (empty($material_image['alt']) ? 'material image' : $material_image['alt']);
                                ?>
                                <div class="col-lg-3 col-sm-6 col-12 col-12">
                                    <div class="category-container">
                                        <img src="<?php echo $material_src;?>" alt="<?php echo $material_alt;?>"/>
                                        <div class="category-info-container">
                                            <div class="category-info">
                                                <h6 class="intention-title"><?php the_sub_field('material_title')?></h6>
                                                <p class="text-center copyright" class="intention-description"><?php the_sub_field('material_description');;?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endwhile;?>
                            </div>
                            <?php endif;?>
                        <?php
                            /**
                             * woocommerce_after_main_content hook.
                             *
                             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                             */
                            do_action( 'woocommerce_after_main_content' );
                        ?>

                        <?php
                            /**
                             * woocommerce_sidebar hook.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            do_action( 'woocommerce_sidebar' );
                        ?>

                    <?php get_footer( 'shop' );

                    /* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

	