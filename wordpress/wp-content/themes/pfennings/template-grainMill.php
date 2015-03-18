<?php
/*
Template Name: grainMill
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
    <div class="leadIn">
        <h2>Why Do You Need a Grain Mill?</h2>
        <p>Most supermarket flours and cereals have been ground weeks or months before they are used. When wholegrain is cracked, rolled or milled, the grain begins to oxidize rapidly within hours leaving grains to become stale, rancid and potentially mucous forming. In most whole foods, herbs, spices and seeds, the nutrients remain dormant until cracked. Once ground the volatile germ oils, enzymes, and vitamins are released with an aromatic flavour and freshness.</p>
        
        <p>Ideal for the home baker, these mills will grind most dry grains including, wheat, barley, oats, rice, spelt, rye, millet, buckwheat, various lentils & soy beans. The F100 will also grind whole maize and chickpeas. SAMAP flour mills produce the finest of flour in your own kitchen, at your own convenience.</p>
        
        <h5>Did you know:</h5>
        <ul>
            <li>Whole grain is a good source of dietary fibre, protein essential fatty acids, B-complex vitamins and vitamin E.</li>
            <li>The outside layer of the grain kernel, called the husk, is composed mostly of fibre and minerals. Insoluble fibre passes through the body undigested, cleaning the digestive tract by 'sweeping' harmful deposits from the body. This function may be a significant help in preventing heart disease and cancer. The soluble fibre present in grains slows digestion and allows optimum absorption of nutrients, such as natural oils and carbohydrates.</li>
            <li>The germ is full of highly unsaturated fatty acids, as well as vitamin E, which acts as a highly effective anti-oxidant.</li>
            <li>Unfortunately, the oils and unsaturated fatty acids are very volatile and begin to oxidize and turn rancid almost immediately after grinding. Rancid oils contain free radicals which have been connected to heart disease and other degenerative diseases. Free radicals are also formed when grains are milled at high temperatures, commonly occurring with metal grinding mechanisms.</li>
        </ul>
        
        <p>We sell SAMAP Mills which use a grinding stone made of NAXOS BASALT embedded in stabilized Magnesite. This means a 100% natural grinding stone which through its design does not require sharpening even after years of continuous use.</p>

        <p>All SAMAP Electric Models employ a patented cooling turbine which keeps the grinding stones and flour cool even in continuous use applications.</p>
        
        <p>Pfenning's is the Canadian Importer and distributor of SAMAP Grain Mills. We carry four models of SAMAP Mills and The Marcato Marga.</p>
    </div>
<article class="readyToOrder">
    <?php the_content(); ?>
</article>

<div class="models">
    <h2>Our Models</h2>
</div>
<?php 
    endwhile; endif;
?>


<?php if(have_posts()):while(have_posts()):the_post();

    $thispage = $post->ID;
    $childpages = query_posts('post_per_page=100&orderby=menu_order&order=asc&post_type=page&post_parent='.$thispage);
    
    if($childpages) { 
    foreach ($childpages as $post) :
        setup_postdata($post); 
?>

<div class="oddeven" >
    <span class="image">
        <?php echo get_the_post_thumbnail($post->ID, array(400,300)); ?>
    </span>
    <span class="content">
        <h2><?php the_title(); ?></h2>
        <?php the_content();?>
    </span>  
</div>
     
     <?php
        endforeach;
     } ?>

</section>

<?php 
    endwhile; endif;
?>

<?php get_footer(); ?>