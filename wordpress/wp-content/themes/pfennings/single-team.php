<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

<!-- Get custom meta values -->
<?php 
    $team = get_post_meta($post->ID,'_teammate',true);
?>

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