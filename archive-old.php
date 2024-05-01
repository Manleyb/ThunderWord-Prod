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
