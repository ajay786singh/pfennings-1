<?php
/*
Template Name: In Stores
*/
get_header(); ?>

<!-- Get custom meta values -->
<?php
    $bannerHeadline     = wpautop(get_post_meta($post->ID,'_banner_heading',true));
    $bannerImageId      = get_post_meta($post->ID, '_banner_image', true);
    $bannerImageUrl     = wp_get_attachment_image_src($bannerImageId,'banner', true);
?>

<section role="slider" style="background: url(<?php echo $bannerImageUrl[0]; ?>) no-repeat; background-size: cover; background-position: center center;">
    <header>
        <hgroup>
            <h6 class="headline"> 
                <?php if ($bannerHeadline) { ?>
                    <?php echo $bannerHeadline; ?>
                <?php } else { ?>
                    <?php echo the_title(); ?>
                <?php  } ?> 
            </h6>
        </hgroup>
    </header>
</section>

<div class="down-arrow">
    <a id="down-link" href="#content" class="target"><i class="fa fa-chevron-down"></i></a>
</div>
<section class="store-map"></section>
<section role="main">
    <div class="team" id="store-results">
        <h4>HOME DELIVERY</h4>
		<?php the_content();?>
   </div>
   <?php get_template_part( 'template', 'request-us' ); ?>
</section>
<?php get_footer(); ?>