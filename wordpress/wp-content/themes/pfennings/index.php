<?php get_header(); ?>

<?php 
query_posts('post_type=page&p=16');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'banner', true);
		}
    ?>
    <div class="banner" style="background-image:url('<?php echo $image_url[0]; ?>'); display: block;">  	
            <div class="container">
                <section class="span-10">
                    <?php the_title( '<h2>', '</h2>' ); ?>
					<?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
                    <?php the_content(); ?>
                </section>
            </div>
    </div>

<?php endwhile; endif; wp_reset_query();?>
<?php get_footer(); ?>