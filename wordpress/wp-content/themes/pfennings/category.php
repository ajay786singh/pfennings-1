<?php get_header(); ?>

<section role="main">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="archive">
            <article>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                <small><?php the_author_posts_link(); ?>, <?php echo get_the_date(); ?> in <?php echo get_the_category_list(' / '); ?></small>  
            </article>
        </div>
    <?php endwhile; endif; ?>
</section>

<?php pagination(); ?>
<?php get_footer(); ?>