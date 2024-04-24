<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The Thunderword - Official Newspaper of Highline College</title>
  <meta content="News from all around the Highline Campus." name="descriptison">
  <meta content="Thunderword, Highline, College" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo get_template_directory_uri(); ?>/img/t_favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="<?php echo get_template_directory_uri(); ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/aos/aos.css" rel="stylesheet">

  <style>

  #hc{
    margin-top: 115px;
  }
  #header{
    background-color: white;
    border-bottom: 1px solid #efefef;
  }
  .ribbon{
    height: 28px;
    background-color: #444444;
    color: #eeeeee;
    font-size: 90%;
  }

  .search-field {
    background-color: transparent;
    background-image: url(<?php echo get_template_directory_uri(); ?>/img/search.png);
    background-position: 5px center;
    background-repeat: no-repeat;
    background-size: 24px 24px;
    border: none;
    border-color: white;
    border-radius: 10px;
    cursor: pointer;
    height: 21px;
    margin: 0 0 0 0;
    padding: 0 0 0 34px;
    position: relative;
    -webkit-transition: width 400ms ease, background 400ms ease;
    transition:         width 400ms ease, background 400ms ease;
    width: 0;
    border-style: hidden!important;
}

.search-field:focus {
    background-color: #fff;
    border: 2px solid #c3c0ab;
    cursor: text;
    outline: 0;
    width: 230px;
}
.search-form
.search-submit {
  display:none;
}
.search-form{
    margin-left: 20px;
}
.dateshort{
  display: none;
}
@media (max-width:768px){

  .screen-reader-text{
    display: none;
  }
  .datelong{
    display: none;
  }
  .dateshort{
    display: contents;
  }
}
  <?php
  // Fix menu overlapif
  if ( is_admin_bar_showing() ) echo  '.fixed-top{ top:32px!important;  }';
  ?>
  </style>

  <?php wp_head();?>

</head>

<body <?php body_class();?>>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top align-items-center">
    <div class="ribbon">
      <div class="container-fluid d-flex pt-1">
        <div class="mr-auto">
          <i class='bx bx-calendar-alt' ></i> <span class="datelong"><?php echo date('l, F d, Y'); ?></span><span class="dateshort"><?php echo date('M d, Y'); ?></span>
        </div>
        <div class="">
          <!-- social-media-menu -->
            <?php
            wp_nav_menu(
              array(
                  'theme_location'=>'masthead-menu',
                  'menu_class'=>'',
                  'container_class'=>'masthead-menu float-right'
                )
            );
            ?>
            <!-- end social-media-menu -->
        </div>
        <div class="">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
    <div class="container d-flex align-items-center pt-3">

      <div class="logo mr-auto">
        <!-- <h1 class="text-light"><a href="index.html"><span>Vesperr</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
		  <a href="<?php echo get_home_url(); ?>"><img src="/wp-content/uploads/2023/03/LOGO-4.png" /> </a>
      </div>
      <!-- nav-menu -->
        <?php
        wp_nav_menu(
          array(
              'theme_location'=>'top-menu',
              'menu_class'=>'',
              'container'=>'nav',
              'container_class'=>'nav-menu d-none d-lg-block'
            )
        );
        ?>
        <!-- end nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <div  id="hc">

  <div class="container">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4" style="text-align:center">
          <div class="text-secondary date">
            The Student Newspaper of Highline College
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center justify-content-md-end">
          <!-- social-media-menu -->
            <?php
            wp_nav_menu(
              array(
                  'theme_location'=>'social-menu',
                  'menu_class'=>'',
                  'container_class'=>'social-menu float-lg-right mt-3 mt-md-0'
                )
            );
            ?>
            <!-- end social-media-menu -->
        </div>
      </div>
    </div>
</div>
