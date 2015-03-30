<?php
/*
Template Name: In Stores
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- Get custom meta values -->
<section class="store-map"></section>
<section role="main">
    <div class="team" id="store-results">
        <h4>HOME DELIVERY</h4>
		<?php the_content();?>
   </div>
   <?php get_template_part( 'template', 'request-us' ); ?>
</section>
<?php endwhile;endif; wp_reset_query();?>
<?php get_footer(); ?>