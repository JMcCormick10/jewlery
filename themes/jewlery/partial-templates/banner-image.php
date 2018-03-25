<?php
$banner_image = get_field('banner_image');
$banner_image_src = $banner_image['sizes']['banner'];
$banner_image_alt = ($banner_image['alt'] == "" ? 'banner-image' : $banner_image['alt']);
$banner_text = get_field('banner_text');
$banner_position = get_field('banner_text_location');
?>
<section class="banner-image-section" style="background-image: url('<?php echo $banner_image_src;?>')">
    <div class="banner-text-container banner-text-<?php echo $banner_position;?>">
        <div class="banner-text"><?php echo $banner_text;?></div>
    </div>
</section>