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
		<?php 
		 $args = array(
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order',
			'child_of' => get_the_ID(),
			'parent' => get_the_ID(),
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$pages = get_pages($args); 
		if($pages) {
			$i=1;
			foreach($pages as $page) {
				$content = $page->post_content;
				if ( ! $content ) // Check for empty page
					continue;

				$content = apply_filters( 'the_content', $content );
				$icon=$page->post_name;
				if($i==1) {
					$icon='cloud-'.$icon;
				}
				if($i==3) {
					$icon='check-square';
				}
		?>
		<div class="content">
			<div class="step-box">
				<span class="icon"><i class="fa fa-<?php echo $icon;?> fa-5x"></i></span>
				<h6>Step <?php echo $i;?></h6>
				<p class="big"><?php echo $page->post_title;?></p>
				<?php echo $content;?>
			</div>
		</div>
		<?php 
			$i++;
			} 
		}
		wp_reset_query();	
		?>
		</div>
	<article class="orderProduce">
	    <?php the_content(); ?>
	</article>
</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>