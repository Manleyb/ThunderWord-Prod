<?php get_header();?>
<main id="main">
  <div class="container">
<div class="row">
  <div class="col-md-9">
    <!-- content starts here -->
    <div class="container" data-aos="fade-up" data-aos-delay="200">
      <div class="d-md-flex align-items-md-stretch">
        <div class="count-box">
          <i class='bx bx-news' ></i>
          <h3><?php single_cat_title(); ?></h3>
        </div>
      </div>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php echo load_tease_template(get_post()); ?>
	  
<?php endwhile; endif; ?>

</div>
  <!-- content ends here -->
  </div>
  
  <div class="col-md-3 left-column">
		<!-- column content starts here -->
		<div class="whitebox bg-white pb-4">
			<div>
			<!--  // Here we are getting the current categories name to include in the popluar stories title -->
				<?php 
				  	$current_category = get_queried_object();
					if ($current_category instanceof WP_Term && $current_category->taxonomy == 'category') {
						$current_category_name = $current_category->name;
						echo '<h5 class="rounded wpp_h5" style="text-align: center;text-transform: capitalize;">popular ' . $current_category_name . ' stories</h5>';
					} 

				  	// Here we are getting the current category given id number. This is called "term_id".
				  	$current_category = get_queried_object();
				  	if (is_a($current_category, 'WP_Term') && $current_category->taxonomy == 'category') {
					  // Storing the id in a variable.
					  $current_category_id = $current_category->term_id;

					  if (function_exists('wpp_get_mostpopular')) {
						  wpp_get_mostpopular(array(
							  'limit' => 5,
							  'range' => 'last7days',
							  'order_by' => 'view',
							  'taxonomy' => 'category', 
							  'term_id' => $current_category_id,
							  'stats_author' => 1,
							  'wpp_start' => '<div class="popular-posts">',
							  'wpp_end' => '</div>',
							  'post_html' => '<div class="posts">
											<span class="counter">{item_position}</span>
											<span class="wrap">{title}</span>
										</div>',
						  ));
					  }
				  } else {
					  // If there is no category which will not happen. We fetch the top stories without the category.
					  if (function_exists('wpp_get_mostpopular')) {
						  	wpp_get_mostpopular(array(
							  'limit' => 5,
							  'range' => 'last7days',
							  'order_by' => 'view',
							  'stats_author' => 1,
							  'wpp_start' => '<div class="popular-posts">',
							  'wpp_end' => '</div>',
							  'post_html' => '<div class="posts">
											<span class="counter">{item_position}</span>
											<span class="wrap">{title}</span>
										</div>',
						  	));
					  	}
				  	}
				?>
			</div>
		</div>
		<!-- column content ends here -->
  	</div>
  </div>
</div>
</main>
<?php get_footer();?>
