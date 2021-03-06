<?php
 $categories = get_field('category_links');
?>
<section class="category-section">
    <div class="inner-wrapper">
        <div class="container">
            <div class="row">
            <?php
            $currentCat = '';
            foreach ($categories as $category):

            if($category->parent !== $currentCat):

              $getParent = get_term($category->parent);
              $categoryParName = $getParent->name;
            ?>
            <div class="col-12 text-md-center text-lg-left">
                <h2 class="shop-intention-title">Shop <?php echo $categoryParName ?></h2>
            </div>
            <?php
                endif;
            $image_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_image_src($image_id)[0];?>
            <div class="col-md-3 col-12">
                <div class="category-container">
                    <img src="<?php echo $image;?>"/>
                    <a href="<?php echo site_url() .'/product-category/'.$category->slug;?>">
                        <div class="category-info-container">
                            <div class="category-info">
                                <h6 class="intention-title"><?php echo $category->name;?></h6>
                                <p class="text-center copyright" class="intention-description"><?php echo $category->description;?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <?php
                $currentCat = $category->parent;
                endforeach;
            ?>
            </div>
        </div>
    </div>
   
</section>