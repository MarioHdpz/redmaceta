<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Eaterstop Lite
 */
?>
<div id="footer-wrapper">
<?php
$disablefooter = get_theme_mod('disabled_footer', '1');
if( $disablefooter == ''){
?>
  <div class="footer">
    	<div class="container">
             <div class="cols-4 widget-column-1">                  
               <?php if ( get_theme_mod('about_title') !== "") { ?>
                <h5><?php esc_attr_e( get_theme_mod( 'about_title', __('About Us','eaterstop-lite'))); ?></h5>             
			   <?php } ?>
               
                <?php if ( get_theme_mod('about_description') !== "") { ?>
                <p><?php esc_attr_e( get_theme_mod( 'about_description', __('We Provide all types of vegetarian and non vegetarian food in our restaurant. our Food quality is not only important main important things is customer satisfaction.','eaterstop-lite'))); ?></p>
			   <?php } ?> 
           
            </div><!--end .widget-column-1-->                 
			         
             
             <div class="cols-4 widget-column-2"> 
              <?php if ( get_theme_mod('menu_title') !== "") { ?>
                <h5><?php esc_attr_e( get_theme_mod( 'menu_title', __('Main Navigation','eaterstop-lite'))); ?></h5>            
			  <?php } ?>               
               
                <div class="menu">
                  <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                </div>                        	
                       	
              </div><!--end .widget-column-2-->     
                      
               <div class="cols-4 widget-column-3">                   
                <?php if ( get_theme_mod( 'latestpost_title' ) !== "" ){  ?>
                <h5><?php esc_attr_e( get_theme_mod( 'latestpost_title', __('Latest Posts','eaterstop-lite'))); ?></h5>              
			   <?php } ?>
				
                
                 <?php  global $wp_query;
$wp_query = new WP_Query(array('posts_per_page' => 4, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' )); ?>
                    <?php  while( have_posts() ) : the_post(); ?>
                  	<div class="recent-post">                    
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<span><?php echo get_the_date(); ?></span>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    
                </div><!--end .widget-column-3-->
                
                <div class="cols-4 widget-column-4">
                <?php if ( get_theme_mod( 'contact_title' ) !== "" ){  ?>
                <h5><?php esc_attr_e( get_theme_mod( 'contact_title', __('Contact Info','eaterstop-lite'))); ?></h5>              
			   <?php } ?>
                
               <?php if ( get_theme_mod('contact_add') !== "") { ?>
                <p><?php esc_attr_e( get_theme_mod( 'contact_add', __('505 New St, Demo Address here, Newyork US','eaterstop-lite'))); ?></p>             
			   <?php } ?>
                
                
              <div class="phone-no">	
              <?php if ( get_theme_mod('contact_no') !== "") { ?>
                <p><?php esc_attr_e( get_theme_mod( 'contact_no', __('Phone:+123 456 7890','eaterstop-lite'))); ?></p>              
			   <?php } ?>  
              
                         
               <?php if( get_theme_mod('contact_mail') !== ""){ ?>
              <?php esc_attr_e('Email: ', 'eaterstop-lite'); ?><a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?>"><?php echo get_theme_mod('contact_mail','contact@company.com'); ?></a>			
			  <?php } ?> 
           </div>
                
            
             <div class="clear"></div>                
                  <div class="social-icons">
					<?php if ( get_theme_mod('fb_link') !== "") { ?>
                    <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#')); ?>"></a> 
                    <?php } ?>
                    
                    <?php if ( get_theme_mod('twitt_link') !== "") { ?>
                    <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#')); ?>"></a>
                    <?php } ?> 
                    
                    <?php if ( get_theme_mod('gplus_link') !== "") { ?>
                    <a title="google-plus" class="gp" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#')); ?>"></a>
                    <?php } ?>
                    
                    <?php if ( get_theme_mod('linked_link') !== "") { ?> 
                    <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#')); ?>"></a>
                    <?php } ?>
                  </div>  
              
                   
                </div><!--end .widget-column-4-->
                
                
            <div class="clear"></div>
         </div><!--end .container-->   
        </div><!--end .footer-->   
        <?php } ?>
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt">
				<?php if ( get_theme_mod('copyright_text') !== "") { ?>
               		<?php echo esc_html( get_theme_mod( 'copyright_text', __('&copy; 2016 Eaterstop Lite. All Rights Reserved','eaterstop-lite'))); ?>       
                <?php } ?>               
       			 </div>
                <div class="design-by">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'eaterstop-lite' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'eaterstop-lite' ), 'WordPress' ); ?></a>
                </div>
                <div class="clear"></div>
            </div>            
        </div>
        
             
    </div>
<?php wp_footer(); ?>
</body>
</html>