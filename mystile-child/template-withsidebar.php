<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: With Sidebar
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
<div class="page-content-wrapper">
<div class="title_wrapper"><div class="wrapper_content"><h1 class="page-title"><?php the_title(); ?></h1></div></div>
    <div id="content" class="page col-full">
    
    	<?php woo_main_before(); ?>
    	<div class="page_content_wrapper">
		<section id="main" class="col-left">
           
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                             
                <article <?php post_class(); ?>>
					
					<!--header>
						<h1><?php the_title(); ?></h1>
					</header-->
                    
                    <section class="entry">
	                	<?php the_content(); ?>
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
		
		<?php woo_main_after(); ?>
		<?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "true" ) get_sidebar(); ?>
    </div><!-- /#content -->
    </div>
	</div>
</div>
<?php get_footer(); ?>