<?php get_header();?>
<main id="main">
  <!-- ======= Slider Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container">
    <div class="owl-carousel testimonials-carousel" data-aos="fade-up" data-aos-delay="200">
      <?php $query = new WP_Query( array( 'category_name' => 'carousel' ) ); ?>
      <?php if ( $query->have_posts() ) : ?>
              <!-- pagination here -->

               <!-- the loop -->
               <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="testimonial-wrap">
        <div class="testimonial-item d-block d-lg-flex">
          <div class="img-bg" style="cursor: pointer;background-image: url('<?php echo kdmfi_get_featured_image_src( 'featured-image-2', 'wide' ); ?>')" onclick="location.href='<?php the_permalink();?>';"></div>
          <div class="contents">
            <span class="caption"><?php if (get_the_author() == "Sponsored") :  ?> Sponsored <?php else: ?> Editor's Pick <?php endif;?></span>
            <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
            <div class="mb-3"><?php the_excerpt(); ?></div>
            <div class="post-meta">
              <?php if (get_the_author() != "Sponsored") : ?><span class="d-block"><a href="<?php the_permalink();?>"><?php the_author(); ?></a> in <a href="/category/news/">News</a></span><?php endif; ?>
              <span class="date-read"><i class='bx bx-calendar-event'></i><?php echo get_the_date( 'M d, Y' ); ?><?php if (get_the_author() != "Sponsored") : ?><span class="mx-1">&bullet;</span> 3 min read <?php endif; ?></span>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    </div>
  </div>
</section>
  <!-- End Slider Section --><!--
  <div class="container mt-4">
<div class="polaroid" style="margin-top:0;"><a href="https://kingcounty.gov/council/upthegrove/COVID-19.aspx" target="_blank" ><img src="<?php echo get_template_directory_uri(); ?>/img/218upthegrovead_w.jpg" alt="" class="img-fluid" /></a></div>
  </div>-->
  <!-- News listing Section -->
  <section id="faq" class="faq">
    <div class="container">
<div class="row">
  <div class="col-md-9">
    <!--
    <div class="container" style="padding-top:15px;" data-aos="fade-up" data-aos-delay="200">
      <div class="polaroid" style="margin-top:0;"><img src="<?php echo get_template_directory_uri(); ?>/img/twordad.jpg" alt="" class="img-fluid" /></div>
    </div>-->

<?php
$categories = get_categories( array(
  'orderby' => 'description',
  'parent'  => 0
) );

foreach ( $categories as $category ) {
  $props = explode(',', $category->description);

  if($props[2]=="false"):
    continue;
  endif;

?>
  <div class="container <?php if($category->name != "Community"): echo "mt-5"; endif; ?>" data-aos="fade-up" data-aos-delay="200">
   <div class="d-md-flex align-items-md-stretch">
     <div class="count-box">
       <i class='<?php echo $props[1]; ?>' ></i>
       <h3><?php echo $category->name; ?></h3>
     </div>
   </div>

   <?php $query = new WP_Query( array( 'category_name' => $category->slug ) ); ?>
   <?php if ( $query->have_posts() ) : ?>

       <!-- pagination here -->

       <!-- the loop -->
       <?php while ( $query->have_posts() ) : $query->the_post(); ?>
       <?php echo load_tease_template(get_post()); ?>
       <?php endwhile; ?>
       <!-- end of the loop -->

       <!-- pagination here -->

       <?php wp_reset_postdata(); ?>

   <?php else : ?>
       <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
   <?php endif; ?>
</div>
<?php } ?><!-- End loop of categories -->

  </div>
<div class="col-md-3 left-column">
  <!-- // This is for the front page aka home page. -->
  <!-- // popular posts first displayed. -->
  <div class="whitebox bg-white pb-4">
    <div>
      <h5 class="rounded wpp_h5" style="text-align: center;">Most popular stories</h5>
      <?php
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
        ?>
    </div>
  </div>

  <!-- // The rest of the sidebar content displayed.  -->
  <?php the_content(); ?>
</div>
</div>
    </div>
  </section>

</main><!-- End #main -->
<?php get_footer();?>
