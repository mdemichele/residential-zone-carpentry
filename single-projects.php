<?php
/**
* Single post template
*
* @package WordPress
* @version 1.0
*/
get_header();
?>
<section class="project-single-page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php echo '<div class="project-single-header"><h2 class="project-single-title">' . get_the_title() . '</h2></div>'; ?>
		<?php echo '<div class="project-single-container"><div class="project-single-content"><h3 class="project-single-content-title">The Project</h3><p class="project-single-text">' . get_the_content() . '</p></div>' . '<div class="project-single-image-container">' . get_the_post_thumbnail() . '</div></div>'; ?>

<?php endwhile; endif; ?>

</section>
<?php get_footer();
