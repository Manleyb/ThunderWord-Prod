<<<<<<< HEAD
<?php get_header(); ?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col">
        <!-- Content starts here -->
        <div class="container" data-aos="fade-up" data-aos-delay="200">
          <?php if (is_author()) : ?>
            <div class="author-wrapper">
              <div class="authors-info">
                <!-- Display author name -->
                <h1>Author: <?php echo get_the_author(); ?></h1>
                <?php
                // Display author avatar
                echo get_avatar(get_the_author_meta('ID'), 400);
                ?>
                <!-- Display author's description -->
                <p class="authorsDescription"><?php echo get_the_author_meta('description'); ?></p>
              </div>
              <?php else : ?>
              <!-- Display archive title -->
              <h1><?php single_cat_title(); ?></h1>
          <?php endif; ?>

          <div class="authors-posts">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Loop through posts -->
            <?php echo load_tease_template(get_post()); ?> 
            <?php endwhile; ?>
            <?php else : ?>
              <!-- No posts found -->
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
          </div>
          <!-- Content ends here -->

          <!-- Sidebar content -->
          <!-- <div class="col-md-3 left-column"></div> -->
    </div>
  </div>
</main>
<?php get_footer(); ?>
=======
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
>>>>>>> e4672d6d2dba2e0e6eb7ac7a76ab2fcfde2a2ac6
