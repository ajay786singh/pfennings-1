<?php
/*
Template Name: Blog Archive
*/
get_header(); ?>
<!-- Get custom meta values -->
<?php 
    $bannerHeadline     = wpautop(get_post_meta($post->ID,'_banner_heading',true));
    $bannerImageId      = get_post_meta($post->ID, '_banner_image', true);
    $bannerImageUrl     = wp_get_attachment_image_src($bannerImageId,'banner', true);
	if($bannerImageUrl == "") {
		$image=get_bloginfo('template_url')."/dist/images/bg-hero.png";
	} else {
		//$image=$bannerImageUrl[0];
		$image=get_bloginfo('template_url')."/dist/images/bg-hero.png";
	}
	
?>
<section role="slider" style="background-image: url(<?php echo $image; ?>);">
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

<section role="main">
	
	<div class="post-container">
    <!-- loop starts -->
		<?php 
			$feeds = array( array('label'=>'twitter','link'=>'https://twitter.com/PfOrganicFarms','filter'=>'social'));
			$results = json_cached_results($feeds);
			show_feed_results($results);
		?>
		
	<!-- loop ends -->
    </div>
	<aside>
		<?php get_sidebar();?>
	</aside>
</section>
<?php get_footer(); ?>