<?php get_header(); ?>

<!-- Loop starts -->
<?php if(have_posts()):while(have_posts()):the_post();?>

<!-- Get custom meta values -->
<?php 
    $team = get_post_meta($post->ID,'_teammate',true);
?>

<section role="main">
    <article>
        <h1><?php the_title(); ?></h1>
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

        <p>
            <?php if ($name): 
               echo $name . '<br>';
            endif ?>
            <?php if ($title):
                echo $title . '<br>';
            endif ?>
            <?php if ($veggie):
                echo $veggie . '<br>';
            endif ?>
            <?php if ($email):
                echo $email . '<br>';
            endif ?>
            <?php if ($phone):
                echo $phone . '<br>';
            endif ?>
            <?php if ($image):
                echo wp_get_attachment_image($image);
            endif ?>
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