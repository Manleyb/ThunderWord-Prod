<?php
/**
 * This is the template for displaying author archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ThunderWord
 */

get_header();

?>

<div class="authorPageWrapper">
    <main id="main" class="site-main col-md-9">
        <h2 class="title">Authors Page</h2>
        <p class="subtitle">Learn more about <?php the_author(); ?> and get to know the person behind the post you have read.</p>
        <div class="authorWrapper">
            <section class="author">
                <?php if ( have_posts() ) : ?>
                    <div class="author-bio">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
                        <div class="author-bio-wrapper">
                            <h2><?php the_author(); ?></h2>
                            <label>
							  <?php
								$author_id = get_the_author_meta('ID');
								$author_nickname = get_the_author_meta('nickname', $author_id);
								echo $author_nickname;
							  ?>
							</label>
                        </div>
                    </div>
                    <p><?php the_author_meta( 'description' ); ?></p>
            </section>

            <h2><?php the_author(); ?> Recent Posts</h2>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php echo load_tease_template(get_post()); ?>
            <?php endwhile; endif; ?>

            <?php endif; ?>
        </div>
    </main>

    <div class="col-md-3 left-column">
        <div class="whitebox">
            <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
                <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'home_right_1' ); ?>
                </div><!-- #primary-sidebar -->
            <?php endif; ?>
        </div>

        <div class="whitebox">
            <h5>Tag cloud</h5>
            <div class="separator"></div>
            <div class="wbody mt-1">
                <?php st_tag_cloud(); ?>
            </div>
        </div>
  </div>
</div>

<?php
    // get_sidebar();
    get_footer();
?>

