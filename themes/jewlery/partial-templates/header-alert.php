<section class="banner-alert">
    <div class="container mx-0 px-5 w-100">
        <div class="row align-items-center">
            <?php if (have_rows('header_alert', 'option')): $counter = 1; while(have_rows('header_alert', 'option')): the_row();  
            $text_align;
            $display_style = "";
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

            if (!empty(get_field('alert_link'))):
                $link = the_sub_field('alert_link');
            else:
                $link = '';
            endif;
            ?>
            <div class="col-lg-4 col-12  <?php echo $text_align;?> <?php echo $display_style;?> alert-text">
                <a href="<?php $link ?>">
                    <p class="banner-alert-text"><?php the_sub_field('alert_text');?></p>
                </a>
            </div> 
            <?php $counter++; endwhile; endif; ?>
        </div>
    </div>
</section>

