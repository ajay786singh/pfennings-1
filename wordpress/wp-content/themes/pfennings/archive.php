<?php
/*
Template Name: Blog Archive
*/
get_header(); ?>
<section role="slider">
    <header>
        <hgroup>
			<h6 class="headline"> Blog</h6>
        </hgroup>
    </header>
</section>

<?php 
    $args  = array(
        'posts_per_page' => 10,
        'paged' => $paged,
    );
    query_posts($args);
?>

<section role="main">
    
    <div class="team">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="post">
			<div class="post-image">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); 
					if($image =='') {
						$img="http://placehold.it/150&text=Pfennings";
					}else {
						$img=$image[0];
					}
				?>
				<img src="<?php echo $img;?>"/>
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