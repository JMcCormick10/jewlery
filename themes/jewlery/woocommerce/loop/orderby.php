<?php
$category = get_queried_object();
$category_name = ($category->name == 'product' ? '' : $category->name);
?>
<form class="woocommerce-ordering" method="get">
    <div class="product-category-container">
        <p><?php echo $category_name;?></p>
    </div>
	<select name="orderby" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
