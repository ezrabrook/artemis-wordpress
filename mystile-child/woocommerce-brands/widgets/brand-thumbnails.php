<?php
/**
 * Show a grid of thumbnails
 */
 $product_brands = array();
 $terms = get_terms( 'product_brand', array( 'hide_empty' => ( $show_empty_brands ? 0 : 1 ) ) );

		foreach ( $terms as $term ) {

			$term_letter = substr( $term->slug, 0, 1 );

			if ( ctype_alpha( $term_letter ) ) {

					foreach ( range( 'a', 'z' ) as $i ){
						if ( $i == $term_letter ) {
							$product_brands[ $i ][] = $term;
							break;
						}
					}
			}
			 else {
				$product_brands[ '0-9' ][] = $term;
			}

		}
?>

<div id="brands_a_z" class="brand_atoz">
	<ul class="brand_alphabet">
		<?php
			$brand_alpha = array_merge( range( 'a', 'z' ), array( '0-9' ) );
			foreach ( $brand_alpha as $key => $i ){
				if ( isset( $product_brands[ $i ] ) )
					print '<li><a class="brand_alphabet" href="#brands-' . $i . '">' . $i . '</a></li>';
				elseif ( $show_empty )
					echo '<li><span>' . $i . '</span></li>';
			}
			?>
	</ul>

	<?php foreach ( $brand_alpha as $i ) if ( isset( $product_brands[ $i ] ) ) : ?>

		<h3 id="brands-<?php echo $i; ?>"><?php echo $i; ?></h3>

			<ul class="brand-thumbnails">
				<?php
				foreach ( $product_brands[ $i ] as $brand ){
					$thumbnail = get_brand_thumbnail_url( $brand->term_id, apply_filters( 'woocommerce_brand_thumbnail_size', 'brand-thumb' ) );

	            if ( ! $thumbnail ){
	              $thumbnail = woocommerce_placeholder_img_src();
	              $class = '';
	            }
	            if ( $index == 0 || $index % $columns == 0 ){
	              $class = 'first';
	            }
	            elseif ( ( $index + 1 ) % $columns == 0 ){
	              $class = 'last';
	            }
				//replace slug code with query-able structure
				$brand_code = str_replace("-","+", $brand->slug);
				
	            $width = floor( ( ( 100 - ( ( $columns - 1 ) * 2 ) ) / $columns ) * 100 ) / 100;
	            echo '<li class="'.$class.'"><a class="brand_name_link" href="/?filter_product_brand=' . $brand->term_id .'&post_type=product" title="'. $brand->name .'"><img src="'. $thumbnail .'" alt="'. $brand->name. '" /></a><a class="link_brand_name" href="/?filter_product_brand='. $brand->term_id
				.'&post_type=product" title="'. $brand->name .'">'. $brand->name .'</a></li>';
	           }
	       	?>
			</ul>

			<a class="top" href="#brands_a_z"><?php _e( '&uarr; Top', 'wc_brands' ) ?></a>

<?php endif; ?>

</div>
