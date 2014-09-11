<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

<!-- Get custom meta values -->
<?php 
    $ordering           = get_post_meta($post->ID,'_ordering_sub_text',true);
    $partnering         = get_post_meta($post->ID,'_partnering_sub_text',true);
    $currentPartners    = get_post_meta($post->ID,'_current_partners',true);
?>

<section role="main">
    <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

        <?php if ($ordering):?>
            <h4>Interested in ordering?</h4>
            <p><?php echo $ordering; ?></p>
            <button>Order now</button>
        <?php endif ?>

        <?php if ($partnering):?>
            <h4>Interested in partnering?</h4>
            <p><?php echo $partnering; ?></p> 
            <button>Learn more</button>
        <?php endif ?>

        <!-- For loop cycle through Array -->
        <?php if($currentPartners) {
            foreach($currentPartners as $partner) {
            //print_r($partner);

            // Get custom meta values    
            $currentName        = $partner['_name'];
            $currentFarm        = $partner['_farm'];
            $currentLocation    = $partner['_location'];
            $currentProduce     = $partner['_produce'];
            $currentLink        = $partner['_link'];
            $currentImage       = $partner['_image'];

        ?>

        <p>
            <?php if ($currentName): 
               echo $currentName . '<br>';
            endif ?>
            <?php if ($currentFarm):?>
                <?php echo $currentFarm; ?><br>
            <?php endif ?>
            <?php if ($currentLocation):?>
                <?php echo $currentLocation; ?><br>
            <?php endif ?>
            <?php if ($currentProduce):?>
                <?php echo $currentProduce; ?><br>
            <?php endif ?>
            <?php if ($currentLink):?>
                <?php echo '<a href="http://' . $currentLink . '" target="_blank">' . $currentLink . '</a>'; ?><br>
            <?php endif ?>
            <?php if ($currentImage):?>
                <?php echo wp_get_attachment_image($currentImage); ?>
            <?php endif ?>
        </p>

        <?php
                }
            }
        ?>

   </article>
</section>

<?php 
    endwhile; 
    endif;
?>

<?php get_footer(); ?>