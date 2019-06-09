<section class="reviews-section">

<!-- Heading -->
<div class="reviews-heading">
  <h3 class="reviews-title">What My Clients Say</h3>
</div>

<!-- Reviews Custom Post Type Section -->
<?php 

// Target Reviews Post Type
$args = array(
  'post_type' => 'reviews',
  'post_status' => 'publish',
  'showposts' => '3',
);

// The Query
$reviews = new WP_Query( $args );

?>

<div class="reviews-container">
<?php
// The Loop
if ( $reviews->have_posts() ) {
  while ( $reviews->have_posts() ) {
    $reviews->the_post();
    echo '<div class="review-item" id="' . get_the_ID() . '"><p class="review-text">"' . get_the_content() . '"</p><strong><p class="review-title">- ' . get_the_title() . '</p></strong></div>';
  }
  // Restore original Post Data
  wp_reset_postdata();
}  else {
  // No Posts Found
  echo '<h1>Oops!</h1>';
}
?>
</div>

</section>
