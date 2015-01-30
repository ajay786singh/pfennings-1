<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()): while(have_posts()): the_post();?>

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

<section role="main">
    <div class="post-container">
		<p>
		<?php echo get_the_date('F d, Y'); ?><br>
        <i>By: <?php echo get_the_author(); ?></i></p>
		<div class="post-social-share">
			<ul>
				<li><a href="" id="fb-share">FB-Share</a></li>
				<li><a href="" id="twitter-share">Twitter</a></li>
				<li><a href="" id="pinit-share">pinit-Share</a></li>
				<li><a href="" id="gplus-share">gplus-Share</a></li>
				<li><a href="" id="fancy-share">fancy-Share</a></li>
			</ul>
			
		</div>
        <?php the_content(); ?>

        <?php comments_template()?>
    
   </div>
   <?php get_sidebar();?>
</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>