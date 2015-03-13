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

<section role="slider" style="background-image: url(<?php echo $bannerImageUrl[0]; ?>);">
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

<section role="main">
	<div class="setUpAccount">
		<h3>To set up an account</h3>
		<p>Please <a href="/team/staff">contact our sales team</a> to find out more about buying our produce.<p>
		<h3>Already have an account? </br> Send us your order</h3>
	</div>	


	<div class="order-form-container">
		<div class="content">
			<div class="step-box">
				<span class="icon"><i class="fa fa-cloud-download fa-5x"></i></span>
				<h6>Step 1</h6>
				<p class="big">download</p>
				<p>To get started, download the current <a href=" http://pfenningsfarms.ca/wordpress/wp-content/uploads/2015/02/pfennings-productlist-feb192015.pdf">order form.</a></p>
			</div>
		</div>

		<div class="content">
			<div class="step-box">
				<span class="icon">
				<i class="fa fa-print fa-5x"></i>
				</span>
				<h6>Step 2</h6>
				<p class="big">print</p>
				<p>Print the form and fill in your order.</p>
			</div>
		</div>

		<div class="content">
			<div class="step-box">
				<span class="icon">
				<i class="fa fa-check-square fa-5x"></i>
				</span>
				<h6>Step 3</h6>
				<p class="big">submit</p>
				<p>You can give us your order by email, phone or fax</p>
				<ul class="submitOptions">
					<li>Web savvy: Email the completed form to <a href="mailto:veggies@pfenningsfarms.ca">veggies@pfenningsfarms.ca</a></li>
					<li>Chatty Cathy?: Order by phone: 519-662-3468. Toll Free: 877-662-3488</li>
					<li>Old school? Us too. Order by fax: 519-662-4083</li>
				</ul>
			</div>
		</div>
	</div>
	<article class="orderProduce">
	    <?php the_content(); ?>
	</article>
</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>