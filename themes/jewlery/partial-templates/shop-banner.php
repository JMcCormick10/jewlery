<?php
$shop_id = get_option( 'woocommerce_shop_page_id' ); 
$shop_banner = get_field('shop_banner_image', $shop_id);
$shop_banner_src = $shop_banner['sizes']['banner'];
?>
<section class="shop-banner-image" style="background-image: url('<?php echo $shop_banner_src;?>')"></section>
