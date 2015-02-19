<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

<!-- Get custom meta values -->
<?php 
    $team               = get_post_meta($post->ID,'_teammate',true);
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
    <aside>
        <?php gravity_form(1, true, true, false, '', true, 12); ?>
    </aside>

    <div class="team">
        <?php the_content(); ?>

        <!-- For loop cycle through Array -->
        <?php if($team) {
            foreach($team as $teammate) {

            // Get custom meta values    
            $name   = $teammate['_name'];
            $title  = $teammate['_title'];
            $veggie = $teammate['_veggie'];
            $email  = $teammate['_email'];
            $phone  = $teammate['_phone'];
            $image  = $teammate['_image'];
        ?>
        
        <div class="list">
            <p>
             <?php if ($image) {
                echo wp_get_attachment_image($image) . '<br>';
                } else {
                echo '<img src="http://placehold.it/300x150"><br>';
                }
            ?>
            <?php if ($name): 
               echo '<b>' . $name . '</b><br>';
            endif ?>
            <?php if ($title):
                echo $title . '<br>';
            endif ?>
            <?php if ($veggie):
                echo '<i class="fa fa-heart"></i> ' . $veggie . '<br>';
            endif ?>
            <?php if ($email):
                echo '<i class="fa fa-envelope"></i> <a href="mailto:' . $email . '">Email</a><br>';
            endif ?>
            <?php if ($phone):
                echo '<i class="fa fa-phone"></i> ' . $phone . '<br>';
            endif ?>
           </p>
        </div>
      
        <?php
                }
            }
        ?>
   </div>
</section>

<?php 
    endwhile; 
    endif;
?>

<?php get_footer(); ?>