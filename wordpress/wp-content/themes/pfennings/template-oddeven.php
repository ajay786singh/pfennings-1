<?php
/*
Template Name: Odd/Even
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
    <?php the_content(); ?>

    <div class="team">
        <!-- For loop cycle through Array -->
        <?php if($currentPartners) {
            foreach($currentPartners as $partner) {

            // Get custom meta values    
            $currentName        = $partner['_name'];
            $currentFarm        = $partner['_farm'];
            $currentLocation    = $partner['_location'];
            $currentProduce     = $partner['_produce'];
            $currentLink        = $partner['_link'];
            $currentImage       = $partner['_image'];
        ?>

        <ul class="list">
            <li>
                <?php if ($currentImage) {
                    echo wp_get_attachment_image($currentImage) . '<br>';
                    } else {
                    echo '<img src="http://placehold.it/300x150"><br>';
                    }
                ?>
                <?php if ($currentName): 
                   echo $currentName . '<br>';
                endif ?>
                <?php if ($currentFarm):
                    echo $currentFarm . '<br>';
                endif ?>
                <?php if ($currentLocation):
                    echo $currentLocation . '<br>';
                endif ?>
                <?php if ($currentProduce):
                    echo $currentProduce . '<br>';
                endif ?>
                <?php if ($currentLink):
                    echo '<a href="http://' . $currentLink . '" target="_blank">' . $currentLink . '</a><br>';
                endif ?>
            </li>
        </ul>
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