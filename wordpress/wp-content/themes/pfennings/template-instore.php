<?php
/*
Template Name: In Stores
*/
get_header(); ?>
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		$bannerHeadline     = wpautop(get_post_meta($post->ID,'_banner_heading',true));
 ?>
<!-- Get custom meta values -->
<section class="store-map" role="slider">
	<header>
        <hgroup>
            <h6 class="headline"> 
                <?php if ($bannerHeadline) { ?>
                    <?php echo $bannerHeadline; ?>
                <?php } else { ?>
                    <p><?php echo the_title(); ?></p>
                <?php  } ?> 
            </h6>
        </hgroup>
    </header>
	<div id="map"></div>
</section>
<div class="down-arrow">
    <a id="down-link" href="#content" class="target"><i class="fa fa-chevron-down"></i></a>
</div>
<section role="main">
    <div class="team" id="store-results">
        <h4>HOME DELIVERY</h4>
		<div class="stores">
		</div>
   </div>
   <?php get_template_part( 'template', 'request-us' ); ?>
</section>
<?php endwhile;endif; wp_reset_query();?>
<?php get_footer(); ?>