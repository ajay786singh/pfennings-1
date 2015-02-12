<?php
/*
Template Name: Order
*/
get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

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

	<h3>To set up an account</h3>
	<p>Please <a href="/team/staff">contact our sales team</a> to find out more about buying our produce.<p>
	<h3>Already have an account? Send us your order</h3>
	<div class="order-form-container">
		<div class="content">
			<div class="step-box">
				<h5>Step 1</h5>
				<span class="icon"><i class="fa fa-cloud-download fa-5x"></i></span>
				<p>To get started, download our order form</p>
			</div>
		</div>

		<div class="content">
			<div class="step-box">
				<h5>Step 2</h5>
				<span class="icon">
				<i class="fa fa-print fa-5x"></i>
				</span>
				<p>Print the form and fill in your order.</p>
			</div>
		</div>

		<div class="content">
			<div class="step-box">
				<h5>Step 3</h5>
				<span class="icon">
				<i class="fa fa-check-square fa-5x"></i>
				</span>
				<p>Submit completed forms</p>
			</div>
		</div>
	</div>
<article>
    <?php the_content(); ?>
    </article>
</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>