<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()): while(have_posts()): the_post();?>

<!-- Get custom meta values -->
<?php
    $postThumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'banner' );
?>
<script>
	var share_image ='<?php echo $postThumb;?>';
</script>
<section role="slider" style="background: url(<?php echo $postThumb['0']; ?>) no-repeat; background-size: cover; background-position: center center;">
    <header>
        <hgroup>
            <h6 class="headline">              
                <?php echo the_title(); ?>
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
		<?php if(social_share()) { social_share();}?>
        <?php the_content(); ?>

        <?php comments_template()?>
    
   </div>
   <?php get_sidebar();?>
</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>