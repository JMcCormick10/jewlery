<?php if (have_rows('header_alert', 'option')):
    $count = count(get_field('header_alert', 'option'));
    switch($count){
        case 1:
            $col_num = "12";
            break;
        case 2:
            $col_num = "6";
            break;
        case 3:
            $col_num = "4";
            break;
    }
?>
<section class="banner-alert">
    <div class="container mx-0 px-5 w-100">
        <div class="row align-items-center">


<?php
            $counter = 1;
            while(have_rows('header_alert', 'option')):
                $the_row = the_row();
                $text_align;
                $display_style = "";

                switch($counter){
                    case 1:
                        if($count === 3){
                            $text_align = 'text-lg-left text-center';
                        }else {
                            $text_align = 'text-center';
                        }
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
            <div class="col-lg-<?php echo $col_num ?> col-12 <?php echo $text_align;?> <?php echo $display_style;?> alert-text">
                <a href="<?php the_sub_field('alert_link')?>">
                    <p class="banner-alert-text"><?php the_sub_field('alert_text');?></p>
                </a>
            </div> 
            <?php $counter++; endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
