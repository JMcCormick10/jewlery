<section class="banner-alert">
    <div class="container">
        <div class="row align-items-center">
            <?php if (have_rows('header_alert', 'option')): $counter = 1; while(have_rows('header_alert', 'option')): the_row();  
            $text_align;
            switch($counter){
                case 1:
                    $text_align = 'text-lg-left text-center';
                    break;
                case 2: 
                    $text_align = 'text-center';
                    $display_style = 'hidden-md-down';
                    break;
                case 3:
                    $text_align = 'text-right';
                    $display_style = 'hidden-md-down';

                    break;
            }
            
            ?>
            <div class="col-lg-4 col-12  <?php echo $text_align;?> <?php echo $display_style;?>">
                <p class="banner-alert-text"><?php the_sub_field('alert_text');?>
                <?php if (!empty(get_field('alert_link'))): ?>
                <a href="<?php echo the_sub_field('alert_link')['link'];?>"></a>    
                <?php endif;?>
                </p>
            </div> 
            <?php $counter++; endwhile; endif; ?>