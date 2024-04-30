<?php get_header();?>
<main id="main">
  <div class="container">
<div class="row">
  <div class="col-md-9">
    <h3><?php the_title();?></h3>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="story">
          <?php  the_content(); ?>
        </div>
      <?php
      endwhile;
      else: ?>
        <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
  </div>
  <div class="col-md-3 left-column">
    <!-- left column content goes here -->
  </div>
</div>
  </div>
</main>

<?php get_footer();?>
