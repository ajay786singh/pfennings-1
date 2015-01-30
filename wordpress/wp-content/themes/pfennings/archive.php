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

<?php 
    $args  = array(
        'posts_per_page' => 10,
        'paged' => $paged,
    );
    query_posts($args);
?>

<section role="main">
	<div class="post-container">
    <!-- loop starts -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
    	<!-- Get post values -->
    	<?php
    		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
    		$imageDummy = "http://placehold.it/150&text=Pfennings";
    	?>

        <div class="post">
			<div class="post-image">
				<?php 
					if(!$image) { ?>
						<img src="<?php echo $imageDummy; ?>">
					<?php } else { ?>
						<img src="<?php echo $image[0]; ?>">
				<?php } ?>
			</div>
			<div class="post-content">
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<small><?php the_author_posts_link(); ?>, <?php echo get_the_date(); ?> in <?php echo get_the_category_list(' / '); ?></small>  
				<p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
			</div>
		</div>	
    <?php endwhile; endif; ?>
		
		<?php pagination(); ?>
		
	</div>
	<?php get_sidebar();?>
	
</section>
<?php get_footer(); ?>