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

<!-- column content ends here -->
  </div>
</div>
  </div>
</main>
<?php get_footer();?>
