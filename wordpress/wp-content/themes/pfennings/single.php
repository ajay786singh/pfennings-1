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
    <?php if(!$bannerImageId): ?>
        <h1><?php the_title(); ?></h1>
    <?php endif;?>
        <?php the_content(); ?>  
   </div>
   <?php get_sidebar();?>
</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>