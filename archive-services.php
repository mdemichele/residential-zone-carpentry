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

<section class="services-archive-page">

	<header class="services-archive-header">
		<h2 class="services-page-title">Services</h2>
		<hr class="services-header-line"></hr>
	</header>

	<div class="services-archive-content-section">
		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				?>
				<div class="services-archive-item">
				<?php
				// Text
				echo '<div class="services-item-content"><h3 class="services-item-title">' . get_the_title() . "</h3>";
				echo '<hr class="services-item-line"></hr>';
				echo '<p class="services-item-text">' . get_the_content() . '</p></div>';
				
				// Image 
				echo '<div class="services-item-image-container"><p class="services-item-image-headline">Latest In ' . get_the_title() . '</p>';
				echo '<div class="services-item-image">' . get_the_post_thumbnail() . '</div></div>';
				?>
				</div>
				
	<?php endwhile; else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	</div>
	
</section>

<?php
get_footer();
