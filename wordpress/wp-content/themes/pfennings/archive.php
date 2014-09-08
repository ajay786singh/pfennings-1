<?php
/*
Template Name: Article & Brochures Archive
*/
get_header(); ?>

<?php 
    $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args   =array(
    	'post_type' => array('post','brochure'),
    	'paged' => $paged
    );
    query_posts($args);
?>

<section class="page-content">
	<div class="container">
        	<div class="span-8-center">
            	<?php the_title("<h2>","</h2>");?>
                 <?php 
					$args = array(
							'hide_empty' => 1,
							'orderby' => 'name',
							'order' => 'ASC',
							'exclude' => 1
							);
				 	$categories=get_categories($args);
					if($categories) {
				 ?>
                
	             <h3>Select a Category</h3>
                 	<ul class="filter">
						<?php 
						$i=1;
						$default_color = "#67c4a1";
						foreach($categories as $category) { 							
							$term_meta =  get_option( "term_meta_product_category_".$category->term_id );
							$color = $term_meta['_product_category_color'];
							if($color) {
							$color=	$color ;
							}else {
							$color=	$default_color ;
							}
							
						?>
                        <li <?php if($i==1) { echo 'class="active"';}?> data-background="<?php echo $color; ?>"><a href="#" id="<?php echo $category->slug;?>"><?php echo $category->cat_name;?></a></li>
                        <?php $i++;} ?>
                 	</ul>
                 <?php } ?>
	        </div>	       
    	</div>            
        <div class="container related">
        	<?php if(have_posts()): while(have_posts()):the_post();
						$post_type=get_post_type(get_the_ID());
						if($post_type=='post') $post_type = "Article";
						
						$category = get_the_category( get_the_ID() );
			?>
        	<div class="span-8-center" data-category="<?php echo $category[0]->slug;?>">
                <h6><?php echo strtoupper($post_type);?></h6>
            	<div class="span-5"><h3><?php the_title();?></h3></div>
            	<div class="span-6">
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
                <hr />                
            </div>
            <?php endwhile;endif;wp_reset_query();?>
        </div>
</section>
<?php get_footer(); ?>