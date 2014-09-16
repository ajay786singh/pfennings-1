<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

<!-- Get custom meta values -->
<?php 
    $team = get_post_meta($post->ID,'_teammate',true);
?>

<div class="fullscreen background" style="background-image:url('<?php bloginfo('template_url' ); ?>/images/bg-connect.jpg');" data-img-width="1400" data-img-height="800">
    <div class="content-a">
        <div class="content-b">
            <h1>Pfennings Farm</h1>
            <a href="https://goo.gl/maps/RnHjJ" target="_blank" class="button"><button><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Directions to our Farm</button></a>
        </div>
    </div>
</div>

<div class="down-arrow">
        <a id="down-link" href="#some-recent-work" class="target"><i class="fa fa-chevron-down"></i></a>
    </div>


<section role="main">
    <aside style="border: 1px solid pink;">
        <?php gravity_form(1, true, true, false, '', true, 12); ?>
    </aside>


    <div class="team"> 
        <!--<h1><?php the_title(); ?></h1>-->
        <?php the_content(); ?>

        <!-- For loop cycle through Array -->
        <?php if($team) {
            foreach($team as $teammate) {
               //print_r($teammate);

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
             <?php if ($image):
                echo wp_get_attachment_image($image) . '<br>';
            endif ?>
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
                echo '<i class="fa fa-envelope"></i> <a href="mailto:' . $email . '">' . $email . '</a><br>';
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