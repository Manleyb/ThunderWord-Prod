<?php get_header();?>
<main id="main">
  <div class="container story">
<?php
$s=get_search_query();
$args = array( 's' =>$s );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
        _e("<h3 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h3>");?>
        <table class="table table-hover">
          <caption><?php echo $the_query->post_count; ?> results found</caption>
          <tbody>
        <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
                    <tr>
                      <td>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
                        <?php the_excerpt(); ?>
                      </td>
                    </tr>
                 <?php
        }
        ?>
      </tbody>
    </table>
        <?php
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
</div>
</main>
<?php get_footer();?>
