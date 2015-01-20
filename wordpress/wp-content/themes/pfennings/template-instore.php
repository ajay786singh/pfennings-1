<?php
/*
Template Name: In Stores
*/
get_header(); ?>


<section role="main">

<?php if (function_exists('sl_template')) {print sl_template('[STORE-LOCATOR]');} ?> 
	
    <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>  
   </article>
</section>

<?php get_footer(); ?>

