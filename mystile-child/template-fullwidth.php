<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Full Width
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
 <div class="inner_frame">
			<div class="instructions">
				<script language="javascript" type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
				<script>jQuery(function() {jQuery( "#homepage_accordion" ).accordion({collapsible: true});});</script>
				<div id="homepage_accordion">
					<h3></h3>
					<div></div>
				</div>
			</div>
		</div>
    <div id="content" class="page col-full">

    	<?php woo_main_before(); ?>
    <div class="fullwidth_wrapper">
  		<section id="main" class="fullwidth">

          <?php
          	if ( have_posts() ) { $count = 0;
          		while ( have_posts() ) { the_post(); $count++;
          ?>
                  <article <?php post_class(); ?>>

  					<header>
  						<h1><?php the_title(); ?></h1>
  					</header>

                      <section class="entry">
  	                	<?php echo the_content(); ?>
  	               	</section><!-- /.entry -->

  					<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>

                  </article><!-- /.post -->

  			<?php
  					} // End WHILE Loop
  				} else {
  			?>
  				<article <?php post_class(); ?>>
                  	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                  </article><!-- /.post -->
              <?php } ?>

  		</section><!-- /#main -->

  		<?php //woo_main_after(); ?>
  		</div><!--/.fullwidth_wrapper-->
    </div><!-- /#content -->

<?php get_footer(); ?>
