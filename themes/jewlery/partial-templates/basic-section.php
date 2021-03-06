<?php

if (have_rows('basic_section')):?>
<section>
<?php  while(have_rows('basic_section')): the_row();
    $section_image = get_sub_field('section_image');
    $image_src = $section_image['sizes']['large'];
    $image_alt = ($section_image['alt'] == "" ? 'section-image' : $section_image['alt']);
    $image_center = $image_alt !== "chris_sher" ? 'align-item-center' : '';
    $image_position_class = (get_sub_field('image_position') == 'left' ? 'flex-first' : 'flex-lg-last flex-first');

?>
    <article class="basic-section">
        <div class="inner-wrapper">
            <div class="container">
                <div class="row d-flex <?php echo $image_center ?>" id="<?php echo $image_alt;?>">
                    <div class="col-lg-6 col-12 <?php echo $image_position_class;?> <?php echo $image_alt;?>" >
                            <img class="basic-section-image"  id="<?php echo $image_alt ?>" src="<?php echo $image_src;?>" alt="<?php echo $image_alt;?>"/>
                    </div>
                    <div class="col-lg-6 col-12 <?php echo $image_alt;?>_text">
                        <h2 class="section-title text-center"><?php the_sub_field('section_heading');?> </h2>
                        <div class="section-content text-center">
                            <?php the_sub_field('section_content');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endwhile;?>
<?php
endif;?>

<div class="container">
    <div class="row">
        <div class="col-6">
            
        </div>
    </div>
</div>