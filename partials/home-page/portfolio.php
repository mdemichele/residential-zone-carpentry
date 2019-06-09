<section class="portfolio-section" id="home-portfolio">

<div class="portfolio-heading">
  <h3 class="portfolio-title">My Work</h3>
</div>

<!-- Custom Post Type Section -->
<?php

// Specify the Custom Post Type and targeted attributes
$args = array(
  'post_type' => 'projects',
  'post_status' => 'publish',
  'showposts' => '8',
);

// The Query
$projects = new WP_Query( $args );
?>

<div class="projects-container">

<?php
// The Loop
if ( $projects->have_posts() ) {
	while ( $projects->have_posts() ) {
		$projects->the_post();
		echo '<div class="project-item">
            <a class="project-hover" href="' . get_permalink() . '">View Project</a>' 
            . get_the_post_thumbnail() . 
         '</div>';
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
  echo '<h1>Oops!</h1>';
}
?>
</div>
<!-- End Custom Post Type -->


<!-- CTA Button Section -->
<div class="portfolio-cta-container">
  <a href="http://residentialzonecarpentry.com/projects/" class="theme-button">See More Projects</a>
</dv>

</section>
