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
                    <p><?php echo the_title(); ?></p>
                <?php  } ?> 
            </h6>
        </hgroup>
    </header>
</section>

<div class="down-arrow">
    <a id="down-link" href="#content" class="target"><i class="fa fa-chevron-down"></i></a>
</div>

<section role="main" id="isotope-container">
	<div class="post-container">
		<div class="filters button-group js-radio-button-group">
			<div class="secondary">
				<label>Filter:</label>
				<a href="?show=all"     id="show-all"     class="button is-checked" data-filter="*">All</a>
				<a href="?show=facebook"  id="show-facebook"  class="button" data-filter=".facebook">Facebook</a>			
				<a href="?show=instagram"  id="show-instagram"  class="button" data-filter=".instagram">Instagram</a>			
				<a href="?show=blog"    id="show-blog"    class="button" data-filter=".blog">Blog</a>
			</div>
			<?php 				
				$args = array(
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty' => '1',
				); 
				$categories=get_categories($args);
				if($categories) {	
			?>
					<div class="secondary">	
						<label>Blog Categories:</label>
						<?php foreach ($categories as $category) { ?>
						<a href="?show=<?php echo $category->category_nicename;?>" id="show-<?php echo $category->category_nicename;?>" class="button" data-filter=".<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a>
						<?php } ?>
					</div>
			<?php } ?>
		</div>
		<div class="isotope">
		<!-- loop starts -->
			<?php 
				$feeds = array( array('label'=>'twitter','link'=>'https://twitter.com/PfOrganicFarms','filter'=>'social'));
				$results = json_cached_results($feeds);
				show_feed_results($results);
			?>
			
		<!-- loop ends -->
		</div>
	</div>	
</section>
<?php get_footer(); ?>