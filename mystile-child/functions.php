<?php
/***************************************
* LOTS OF TEMPLATE fixes are in this file
* Important for the structure of the Lists of Products and the single page products
*
****************************************/

//Move WooCommerce Thumbnail List Product
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_thumbnail', 5 );

//Move the title to underneath the image Single Product
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 30 );

//Move price under title Single Product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 40);

//Remove excerpt from Single Product view
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

//Move meta data to under title Single Product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_meta', 50);

//Remove related products and place after the product
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 10);

//add description under Meta Data Single Product
add_action('woocommerce_before_single_product_summary', 'wikid_get_the_description', 60);
function wikid_get_the_description(){
	$wikid_content = get_the_content();
	if (!empty($wikid_content)){
		?>
		<div class="product_content">
		<?php echo the_content();?>
		</div>
	<?php
	 }

}


//add short description
$content = get_the_content();
if (isset($content)) {
	add_action( 'woocommerce_after_shop_loop_item_title', 'wikid_add_short_description', 15 );
	function wikid_add_short_description() {
		 $content = get_the_content();
			echo '<div class="title-description">' . wp_trim_words($content, $num_words=15, $more = '...') . '</div>';
	}
}
/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Replace "Free!" by a custom string
 *
 */
function wikid_change_custom_free_message() {
	return '<span class="amount">Click Me</span>';
}

add_filter('woocommerce_free_price_html', 'wikid_change_custom_free_message');


//remove extra short description
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 5);

//add size
add_action('woocommerce_after_shop_loop_item_title', 'my_add_size', 10);
function my_add_size(){
	$size_values = get_post_custom_values('size');
	$size_option = get_post_custom_values('_size');
	if (isset($size_values)){
		foreach ( $size_values as $key => $value) {
				echo '<div class="size">' . "$value" . '</div>';
		}
	}
	elseif(isset($size_option)){
		foreach ($size_option as $key => $value){
				echo '<div class="size">' . "$value" . '</div>';
		}
	}
}

//add category
add_action('woocommerce_after_shop_loop_item_title', 'wikid_add_category', 11);
function wikid_add_category(){
	 echo '<div class="category-name">' . get_the_term_list($category->slug, 'product_cat', 'Categories: ', ', ', '').  '</div>';
}

//add price
add_action('woocommerce_after_shop_loop_item_title', 'wikid_add_brand', 12);
function wikid_add_brand(){
	echo '<div class="brand-name">' . get_brands( $post_id = 0, $sep = ', ', $before = 'Brand: ', $after = '' ). '</div>';
}

// Move WooCommerce price (on multi view)
//remove_action(  'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10  );
//add_action('woocommerce_after_shop_loop_item_title', 'wikid_move_price_list_view', 10);
add_action(  'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 20  );



//ADD by now button to grid/list view
add_action('woocommerce_after_shop_loop_item_title', 'wikid_add_by_now_link', 25);

function wikid_add_by_now_link(){
	$wikid_product_link = get_the_permalink();
	echo '<div class="products_comparison_button"><a class="single_add_to_cart_button button-pill button-flat-primary alt modified-cart" href="'.$wikid_product_link. '">Compare</a></div>' ;
}

 /**
 * Remove product tabs
 *
 */
function wikid_remove_product_tab($tabs) {

    unset( $tabs['description'] );      		// Remove the description tab
    unset( $tabs['reviews'] ); 					// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

 	return $tabs;
 
}
add_filter( 'woocommerce_product_tabs', 'wikid_remove_product_tab', 98);

/*
* Fix broken thumbnails
*
**/
add_action( 'init', 'custom_fix_thumbnail' );
 
function custom_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'wikid_woocommerce_placeholder_img_src');
   
	function wikid_woocommerce_placeholder_img_src( $src ) {
	$upload_dir = wp_upload_dir();
	$uploads = untrailingslashit( $upload_dir['baseurl'] );
	$src = $uploads . '/2014/05/seeker.png';
	 
	return $src;
	}
}


// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
	woocommerce_related_products(3,3); // Display 4 products in rows of 2
}

/** 
 * Prevent product titles and descriptions from being overwritten on product updates. 
 */ 
add_filter( 'dfrpswc_filter_post_array', 'wikid_woocommerce_prevent_product_description_override', 10, 4 ); 
function wikid_woocommerce_prevent_product_description_override( $post, $product, $set, $action ) { 
	if ( $action == 'update' ) {
		unset( $post['post_title'] );
		unset( $post['post_content'] ); 
		unset( $post['post_excerpt'] ); 
	} 
	return $post; 
}
/*END OF FILE*/
