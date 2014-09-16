<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

<!-- Get custom meta values -->
<?php 
    $ordering           = get_post_meta($post->ID,'_ordering_sub_text',true);
    $partnering         = get_post_meta($post->ID,'_partnering_sub_text',true);
    $currentPartners    = get_post_meta($post->ID,'_current_partners',true);
?>

<div class="fullscreen background" style="background-image:url('<?php bloginfo('template_url' ); ?>/images/bg-partners.jpg');" data-img-width="1400" data-img-height="800">
    <div class="content-a">
        <div class="content-b">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</div>

<div class="down-arrow">
    <a id="down-link" href="#content" class="target"><i class="fa fa-chevron-down"></i></a>
</div>

<section role="main">
    <?php the_content(); ?>

    <aside>
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
    </aside>

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

        <div class="list">
            <p>
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