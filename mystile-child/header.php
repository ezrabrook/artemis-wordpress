<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/mystile-child/buttons/css/buttons.css" media
<?php
	wp_head();
	woo_head();
	?>
				
				<script language="javascript" type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
				<script language="javascript" type="text/javascript" src="/wp-content/themes/mystile-child/js/jquery.masonry.min.js"></script>
				<script language="javascript" type="text/javascript" src="/wp-content/themes/mystile-child/js/custom_script.js"></script>
				
</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">



	<!-- <div id="top">
		<nav class="col-full" role="navigation">
			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
			<?php } ?>
			<?php
				if ( class_exists( 'woocommerce' ) ) {
					echo '<ul class="nav wc-nav">';
					woocommerce_cart_link();
					echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
					echo get_search_form();
					echo '</ul>';
				}
			?>
		</nav>
	</div> -->



    <?php woo_header_before(); ?>

	<header id="header" class="col-full">

		

	    <hgroup>
			
	    	 <?php
			    $logo = esc_url( get_template_directory_uri() . '/images/logo.png' );
				if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
				if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
			?>
			<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
			    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
			    	<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
			    </a>
		    <?php } ?>


			<div class="site-logo"></div>
			
			<!--<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>-->
			
			
			</span></a></h3>

		</hgroup>

        <?php woo_nav_before(); ?>
		
			<?php uberMenu_easyIntegrate(); ?>
			
		
		<!-- /#navigation -->

		<?php woo_nav_after(); ?>
		
	</header><!-- /#header -->

	<?php woo_content_before(); ?>