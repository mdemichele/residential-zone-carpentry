<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
get_header();
?>

	<header class="portfolio-page-header">
		<div class="portfolio-header-container">
			<h2 class="portfolio-page-title">Portfolio</h2>
			<hr class="portfolio-header-line"></hr>
		</div>
	</header>

	<div class="portfolio-projects-section">
			<?php
			// Start the Loop.
			if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<div class="portfolio-project-item">
				<?php 
				echo '<div class="portfolio-project-image"><a href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a></div>';
				echo '<div class="portfolio-project-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></div>';
				?>
				<hr class="portfolio-item-line"></hr>
				</div>
				<?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */				
		  ?>
		<?php endwhile; else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	</div>
	
<?php
get_footer();