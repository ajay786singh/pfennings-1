<?php get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'full', true);
		}
    ?>        
    <div class="page-title">
            <div class="container">
                <section class="span-10-center">
                    <?php the_title( '<h1 class="headline">', '</h1>' ); ?>
                    <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
	            </section>
            </div>    
    </div>     
    <div class="page-content">  	
            <div class="container">
                <section class="span-10-center">
                    <?php the_content(); ?>
                </section>
                <?php 
					$tabs = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) ); 
					if($tabs) {
				?>
                <section class="span-10-center">
                	<div class="tabs">
                    	<ul class="tab-header">
                       		<?php 
							$i=1;	
							foreach($tabs as $tab) { 
								$sub_heading=get_post_meta($tab->ID,'_sub_heading',true);
							?>	
                            <li <?php if($i==1) { ?>class="active-tab-header" <?php } ?>>
                            	<a href="#" id="tab-<?php echo $tab->ID;?>">
                                    <h5><?php echo $tab->post_title; ?></h5>
                                    <h6><?php if($sub_heading) echo $sub_heading; ?></h6>
                                </a>
                            </li>
                       		<?php $i++; } ?>
                        </ul>
                        <div class="tab-content">
                        	<?php 
							$j=1;	
							foreach($tabs as $tab) { 
								$sub_heading=get_post_meta($tab->ID,'_sub_heading',true);
							?>	
                            <div id="tab-<?php echo $tab->ID;?>" class="tab <?php if($j==1) echo "active-tab-content"?>">
								<?php echo $tab->post_content; ?>
                            </div>
                            <?php $j++; } ?>
                        </div>
                    </div>
                </section>
                <?php } ?>
            </div>
    </div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>