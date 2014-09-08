<?php get_header(); ?>
<section class="page-content"> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container">
        	<div class="span-8-center single-content">
            	<?php the_title("<h2>","</h2>");?>
				<p class="meta"><span class="sub-meta">Written by <?php echo ucfirst(get_the_author()); ?></span>
                <?php
					if(get_post_meta($post->ID,'_brochure_file',true)) {
				?>
                <span><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download">Download this article</a></span>
                <?php
					}
					echo "</p>";
					if(get_post_meta($post->ID,'_brochure_content',true)) {
				?>
                <p class="description"><?php echo get_post_meta($post->ID,'_brochure_content',true);?></p>
                <?php } ?>
                <?php the_content();?>
            </div>
    </div>
<?php endwhile; endif; ?>
<section class="container" id="pagination">
    <div class="span-8-center single-content">
        <p><a href="<?php bloginfo('url');?>/products">< Return to Products Page</a></p>
        <p><a href="<?php bloginfo('url');?>/articles-and-brochures/">< Return to Articles Page</a></p>
        
		<hr />
    </div>
</section>
<?php get_template_part( 'template-part', 'add_related_posts' ); ?>
<?php
	$next_article = new WP_Query(array(
	'posts_per_page' => 1,
	'post__not_in' => array($post->ID)
	));
	if($next_article->have_posts()) {
?>
<section class="container related">
    <div class="span-8-center single-content">
        <h6>ARTICLE</h6>
        <?php while($next_article->have_posts()):$next_article->the_post(); ?>
        <div class="span-5">
            <h3><?php the_title();?></h3>
        </div>
        <div class="span-7">
            <p><?php echo get_post_meta(get_the_ID(),'_brochure_content',true);?></p>
            <p class="meta inline-meta">
            	 <?php
					if(get_post_meta($post->ID,'_brochure_file',true)) {
				?>
                <span><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download"></a></span>
                <?php } ?>
            	<span><a href="<?php the_permalink();?>" class="more"></a></span>
            </p>
        </div>
        <?php endwhile; ?>
    </div>
</section>
<?php } ?>
</section>

<?php get_footer(); ?>