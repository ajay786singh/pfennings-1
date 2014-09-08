<?php
/*
Template Name: 404
*/

 get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
<?php 
	query_posts('post_type=page&p=21');	
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'full', true);
		}
    ?>        
    <div class="page-title">
            <div class="container">
                <section class="span-10 center">
                    <?php the_title( '<h1 class="front-headline">', '</h1>' ); ?>
                    <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
	            </section>
            </div>    
    </div>     
    <div class="page-content">  	
            <div class="container">
                <section class="span-10 center">
                    <?php the_content(); ?>
                    <?php wp_nav_menu(array('theme_location'=> '404-page-menu'));?>
                </section>
            </div>
     </div>           
<?php endwhile;endif;wp_reset_query();?>     
<?php get_footer(); ?>