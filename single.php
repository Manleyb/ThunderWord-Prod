<?php get_header(); ?>
<main id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-9">

        <?php if (has_post_thumbnail()): ?>
          <div class="imgwrap">
            <div class="row">
              <?php
              // Checking if the post has a featured image (post thumbnail)
              if (has_post_thumbnail('featured-image-1')) :
              ?>
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="polaroid" style="max-width:305px;">
                    <img src="<?php echo the_post_thumbnail_url('mug'); ?>" alt="" class="img-fluid">
                    <div>
                      <p class="container">
                        <?php echo get_the_post_thumbnail_caption(); ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php
              // Check if the post has a featured image (post thumbnail)
              if (has_post_thumbnail('featured-image-2')) :
              ?>
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="polaroid" style="max-width:305px;">
                    <img src="<?php echo kdmfi_get_featured_image_src('featured-image-2', 'wide'); ?>" alt="" class="img-fluid">
                    <div>
                      <p class="container">
                        <?php echo get_post(kdmfi_get_featured_image_id('featured-image-2'))->post_excerpt;  ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <?php
              // Checking if the post has a featured image (post thumbnail)
              if (has_post_thumbnail('featured-image-3')) :
              ?>
                <div class="col-md-4 d-flex justify-content-center">
                  <div class="polaroid" style="max-width:305px;">
                    <img src="<?php echo kdmfi_get_featured_image_src('featured-image-3', 'wide'); ?>" alt="" class="img-fluid">
                    <div>
                      <p class="container">
                        <?php echo get_post(kdmfi_get_featured_image_id('featured-image-3'))->post_excerpt;  ?>
                      </p>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

            </div>
          </div>

        <?php else : ?>
          <div class="imgwrap d-flex justify-content-center">
            <div class="polaroid" <?php if (get_post(get_post_thumbnail_id())->post_content != "wide") : echo 'style="max-width:305px;"'; endif; ?>>
              <img src="<?php if (get_post(get_post_thumbnail_id())->post_content == "wide") : the_post_thumbnail_url(); else : the_post_thumbnail_url('mug'); endif; ?>" alt="" class="img-fluid">
              <div class="container">
                <p class="date-read"><?php echo get_the_post_thumbnail_caption(); ?></p>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <h3><?php the_title(); ?></h3>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="news-meta">
              <span class="d-block author">
                <?php
                $my_post_meta = get_post_meta($post->ID, 'Authors', true);
                if (!empty($my_post_meta)) :
                    echo $my_post_meta;
                else :
                    // Replace the_author() with get_the_author_posts_link()
                    echo '<span class="author-name">' . get_the_author_posts_link() . '</span>';

                    // The switch statement can remain unchanged
                    switch (get_the_author()) :
                        case "Editor":
                            echo "<span class='bullet'>&bullet;</span><span class='author-role'>The Thunderword</span>";
                            break;
                        case "Thunderword Staff":
                            echo "";
                            break;
                        default:
                            echo "<span class='mx-1 bullet'>&bullet;</span><span class='author-role'>Staff Reporter</span>";
                    endswitch;
                endif;
                ?>
            </span>

              <span class="date-read"><i class='bx bx-calendar-event'></i> <?php echo get_the_date('M d, Y'); ?> <span class="icon-star2"></span></span>
            </div>
            <div class="story">
              <?php the_content(); ?>
            </div>
          <?php
          endwhile;
        else : ?>
          <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
        <?php
        if (function_exists('sharing_display')) {
          sharing_display('', true);
        }

        if (class_exists('Jetpack_Likes')) {
          $custom_likes = new Jetpack_Likes;
          echo $custom_likes->post_likes('');
        }
        add_action('loop_start', 'jptweak_remove_share');
        ?>
      </div>
      <div class="col-md-3 left-column">
        <div class="whitebox">
          <?php if (is_active_sidebar('home_right_1')) : ?>
            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
              <?php dynamic_sidebar('home_right_1'); ?>
            </div><!-- #primary-sidebar -->
          <?php endif; ?>
        </div>
        <div class="whitebox">
          <h5>Tag cloud</h5>
          <div class="separator">
          </div>
          <div class="wbody mt-1">
            <?php st_tag_cloud(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
