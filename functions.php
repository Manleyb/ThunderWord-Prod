<?php

  function load_stylesheets(){

    //wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
    // Template Main CSS File
    wp_register_style('mystyle', get_template_directory_uri() . '/css/style01.css', array(), false, 'all');
    wp_enqueue_style('mystyle');

  }

  function load_tease_template($post){

  $html = '<div class="briefs-wrap">';
  $html .= '<b><a href="'. get_post_permalink($post->ID) .'">'. $post->post_title .'</a></b>';
  if (has_post_thumbnail( $post->ID ) ):

    if(get_post(get_post_thumbnail_id())->post_content == "wide"):
      $html .= '<div class="imgwrap d-flex justify-content-center">';
      $html .= '<div class="polaroid">';
      $html .= '<img src="'. get_the_post_thumbnail_url($post->ID) .'" alt="" class="img-fluid">';
      $html .= '</div>';
      $html .= '</div>';
      $html .=  apply_filters( 'the_excerpt', $post->post_excerpt );
    else:

      $html .= '<div class="row">';

      $html .= '<div class="col-md-3">';
      $html .= '<div class="imgwrap  d-flex justify-content-center">';
      $html .= '<div class="polaroid">';
      $html .= '<img src="'. get_the_post_thumbnail_url($post->ID, 'mug') .'" alt="" class="img-fluid imglisting">';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';

      $html .= '<div class="col-md-9">';
      $html .=  apply_filters( 'the_excerpt', $post->post_excerpt );
      $html .= '</div>';

      $html .= '</div>';
    endif;

  else:
    $html .=  apply_filters( 'the_excerpt', $post->post_excerpt );
  endif;
  $html .= '<div class="post-meta">';
  $html .= '<span class="d-block"><span class="date-read mr-3"><i class="bx bx-calendar-event"></i> '. date('M d, Y', strtotime($post->post_date)) .' </span><a href="'. get_post_permalink($post->ID) . '"><i class="bx bx-book-reader"></i> Read more</a></span>';
  $html .= '</div>';
  $html .= '</div>';
  return $html;

  }

    add_action('wp_enqueue_scripts', 'load_stylesheets');

    function loadjs(){

      wp_register_script('myscript', get_template_directory_uri() . '/js/main.js', '', 1, true);
      wp_enqueue_script('myscript');
    }

    add_action('wp_enqueue_scripts', 'loadjs');

    add_theme_support('post-thumbnails');
    add_theme_support('author');
    add_theme_support('menus');
    add_theme_support('html5', array('search-form'));

    register_nav_menus(
  	   array(
  	      'top-menu'=> __('Top Menu', 'theme'),
          'social-menu'=> __('Social Menu', 'theme'),
          'masthead-menu'=> __('Master Head Menu', 'theme')
        )
    );

    add_image_size('mug', 305, 0, false);
    add_image_size('wide', 545, 0, true);

    function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
      if ( class_exists( 'Jetpack_Likes' ) ) {
          remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
      }
    }
    add_action( 'loop_start', 'jptweak_remove_share' );

    add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args = array(
      'id' => 'featured-image-2',
      'desc' => 'Your description here.',
      'label_name' => 'Featured Image 2',
      'label_set' => 'Set featured image 2',
      'label_remove' => 'Remove featured image 2',
      'label_use' => 'Set featured image 2',
      'post_type' => array( 'page', 'post' ),
    );

    // Add featured-image-2 to pages only
   $args_2 = array(
     'id' => 'featured-image-3',
     'desc' => 'Your description here.',
     'label_name' => 'Featured Image 3',
     'label_set' => 'Set featured image 3',
     'label_remove' => 'Remove featured image 3',
     'label_use' => 'Set featured image 3',
     'post_type' => array( 'post' ),
   );

    $featured_images[] = $args;
    $featured_images[] = $args_2;

    return $featured_images;
  });

  /**
   * Register our sidebars and widgetized areas.
   *
   */
  function arphabet_widgets_init() {

  	register_sidebar( array(
  		'name'          => 'Home right sidebar',
  		'id'            => 'home_right_1',
  		'before_widget' => '<div>',
  		'after_widget'  => '</div>',
  		'before_title'  => '<h2 class="rounded">',
  		'after_title'   => '</h2>',
  	) );

  }
  add_action( 'widgets_init', 'arphabet_widgets_init' );

 ?>
