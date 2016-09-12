<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Eaterstop Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$disableslide = get_theme_mod('disabled_slides', '1');
?>
<div class="header">
  <div class="container">
    <div class="logo">
     <?php eaterstop_lite_the_custom_logo(); ?>   
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>      
      </a>   
    </div><!-- logo -->
    <div class="hdrright">
    <div class="toggle"> <a class="toggleMenu" href="#">
      <?php esc_attr_e('Menu','eaterstop-lite'); ?>
      </a> </div> <!-- toggle -->
    <div class="sitenav">
      <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div><!-- site-nav -->
    <div class="clear"></div>
    </div><!-- .-->
  </div><!-- container -->
</div><!--.header -->
<?php if( $disableslide == ''){ ?>
<?php if ( is_front_page() && ! is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
     <?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
		<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $img_arr[] = $image;
        $id_arr[] = $post->ID;
        endwhile; wp_reset_postdata();
  	  }
    }
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php 
	$i=1;
	foreach($img_arr as $url){ ?>
      <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo $i; ?>" />
      <?php $i++; }  ?>
    </div>
		<?php 
        $i=1;
        foreach($id_arr as $id){ 
        $title = get_the_title( $id ); 
        $post = get_post($id); 
        $content = esc_html( wp_trim_words( $post->post_content, 40, '' ) );
        ?>
    <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo $title; ?></h2>
        <p><?php echo $content; ?></p>
        <div class="clear"></div>        
      </div>
    </div>
    <?php $i++; } ?>
  </div>
  <div class="clear"></div>
</section>
<?php } else { ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
     <div id="slider" class="nivoSlider">
       <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" />
       <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" />
       <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" />
      </div>
    <div id="slidecaption1" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Free Restaurant WordPress Theme', 'eaterstop-lite');?>
        </h2>
        <p><?php esc_html_e('We Provide all types of veg and non veg food in our restaurant.', 'eaterstop-lite');?></p>
      </div>
    </div>
    <div id="slidecaption2" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Good Times and Great Food ', 'eaterstop-lite'); ?>
        </h2>
        <p><?php esc_html_e('A right place to enjoy your happiness.', 'eaterstop-lite');?></p>
      </div>
    </div>
    <div id="slidecaption3" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Delicious and Fresh Food', 'eaterstop-lite');?>
        </h2>
        <p><?php esc_html_e('The right ingredients for the right food.', 'eaterstop-lite');?></p>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</section><!-- Slider Section -->
<?php } } } ?>