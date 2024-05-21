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
			  <h5 class="rounded wpp_h5" style="text-align: center;">Most popular stories</h5>
			  <?php
				 if (function_exists('wpp_get_mostpopular')) {
				 wpp_get_mostpopular(array(
					'limit' => 5,
					'range' => 'all',
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
				 ?>
		   </div>
		</div>
<!-- column content ends here -->
  </div>
</div>
  </div>
</main>
<?php get_footer();?>
