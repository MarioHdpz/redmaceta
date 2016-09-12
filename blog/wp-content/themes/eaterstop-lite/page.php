<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Eaterstop Lite
 */

get_header(); ?>
<?php
$disablewelcome = get_theme_mod('disabled_welcomepage', '1');
$disablepageboxes = get_theme_mod('disabled_pageboxes', '1');
?>
<?php if ( is_front_page() && ! is_home() ) { ?>
<?php if( $disablewelcome == ''){ ?>
<section id="wrapfirst">
  <div class="container">
    <div class="welcomewrap">
      <?php if( get_theme_mod('page-setting1')) { ?>
      <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
      <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>     
      <h2>
        <?php the_title(); ?>
      </h2>
      <?php the_content(); ?>
      <div class="clear"></div>
      <?php endwhile; wp_reset_postdata(); } else { ?>
      
      <h2>
        <?php esc_attr_e('Todays Special Menu','eaterstop-lite'); ?>
      </h2>
      <p>
        <?php esc_attr_e('Our Eaterstop Lite is a Free WordPress Theme build in customizer. It has simple and user friendly theme options. It is compatible with WordPress latest version also compatible with many WordPress popular plugins.','eaterstop-lite'); ?>
      </p>
      <?php } ?>
    </div> <!-- welcomewrap-->
    <div class="clear"></div>
  </div> <!-- container -->
</section>
<div class="clear"></div>
<?php } ?>

<?php if( $disablepageboxes == ''){ ?>
<div id="ourservices">
    <div class="container">               
        	<?php if( get_theme_mod('page-column1',false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column1',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="cols2">
                   <div class="servicesthumb">
                     <a href="<?php the_permalink(); ?>">				 
                      <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( array(160,160,true));?>            
                       <?php } else { ?>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.jpg" alt=""/>
                       <?php } ?>
                       </a>
                   </div>              
                      <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                     <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                  
        	   </div>
             <?php endwhile;
						wp_reset_postdata(); ?>
        <?php } else { ?>
          <div class="cols2">
              <div class="servicesthumb">
               <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/menu1.jpg" alt="" /></a>
              </div>            
              <a href="#"><h3><?php _e('Our Best Dessert','eaterstop-lite'); ?></h3></a>             
              <p><?php _e('Our Restaurants Speciality is we make everyday hot and special dishes. also we make national and international Recipes. ','eaterstop-lite'); ?></p>            
         </div>        
		<?php } ?>
        
        <?php if( get_theme_mod('page-column2',false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column2',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="cols2">
				 <div class="servicesthumb">
                     <a href="<?php the_permalink(); ?>">				 
                      <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( array(160,160,true));?>            
                       <?php } else { ?>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.jpg"  alt=""/>
                       <?php } ?>
                       </a>
                   </div>                 
                      <a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
                     <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                  
        	   </div>
             <?php endwhile;
						wp_reset_postdata(); ?>
        <?php } else { ?>
          <div class="cols2">
            <div class="servicesthumb">
               <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/menu2.jpg" alt="" /></a>
              </div>             
              <a href="#"><h3><?php _e('Excellent Menu','eaterstop-lite'); ?></h3></a>             
              <p><?php _e('We provide excellent menu for our customers. Traditional soup served with grilled sourdough bread is our speciality.','eaterstop-lite'); ?></p>          
         </div>        
		<?php } ?>
             
             
             <?php if( get_theme_mod('page-column3',false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column3',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="cols2">
				  <div class="servicesthumb">
                     <a href="<?php the_permalink(); ?>">				 
                      <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( array(160,160,true));?>            
                       <?php } else { ?>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.jpg" alt=""/>
                       <?php } ?>
                       </a>
                   </div>                  
                     <a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
                     <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
        	   </div>
             <?php endwhile;
						wp_reset_postdata(); ?>
        <?php } else { ?>
          <div class="cols2">
              <div class="servicesthumb">
               <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/menu3.jpg" alt="" /></a>
              </div>             
              <a href="#"><h3><?php _e('Green Healthy Foods','eaterstop-lite'); ?></h3></a>             
              <p><?php _e('Green and Healthy Foods is also provided by our restaurants which makes your dishes tasty.','eaterstop-lite'); ?></p>             
         </div>        
		<?php } ?>
             
             
             <?php if( get_theme_mod('page-column4',false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column4',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="cols2 lastcols">
				 <div class="servicesthumb">
                     <a href="<?php the_permalink(); ?>">				 
                      <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( array(160,160,true));?>            
                       <?php } else { ?>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.jpg" alt=""/>
                       <?php } ?>
                       </a>
                   </div>
                  
                      <a href="<?php the_permalink(); ?>"><h3> <?php the_title(); ?></h3></a>
                     <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
        	   </div>
             <?php endwhile;
						wp_reset_postdata(); ?>
        <?php } else { ?>
          <div class="cols2 lastcols">
             <div class="servicesthumb">
               <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/menu4.jpg" alt="" /></a>
              </div>             
              <a href="#"><h3><?php _e('Special Salad','eaterstop-lite'); ?></h3></a>             
            <p><?php _e('All of the food are served with the special salad. Which makes your eating moment so enjoyable.','eaterstop-lite'); ?></p>            
         </div>        
		<?php } ?>        
    <div class="clear"></div>
    </div><!-- .container -->
</div><!-- #ourservices -->
<?php } }?>

<div class="container">
      <div class="page_content">
    		 <section class="site-main">               
            		<?php if( have_posts() ) :
							while( have_posts() ) : the_post(); ?>
                            	<h1 class="entry-title"><?php the_title(); ?></h1>
                                <div class="entry-content">
                                			<?php the_content(); ?>
                                            <?php
												//If comments are open or we have at least one comment, load up the comment template
												if ( comments_open() || '0' != get_comments_number() )
													comments_template();
												?>
                                </div><!-- entry-content -->
                      		<?php endwhile; else : endif; ?>
                    
            </section><!-- section-->
   
     <?php get_sidebar();?>      
    <div class="clear"></div>
    </div><!-- .page_content --> 
 </div><!-- .container --> 
<?php get_footer(); ?>