<?php
$banner_image = get_field('banner_image_mobile');
$banner_image_src = $banner_image['sizes']['banner'];
$banner_image_alt = ($banner_image['alt'] == "" ? 'banner-image' : $banner_image['alt']);
$banner_image_mobile = get_field('banner_image_mobile');

?>
<section class="banner-image-section">
    <?php
    echo do_shortcode('[smartslider3 slider=1]');
    ?>
</section>