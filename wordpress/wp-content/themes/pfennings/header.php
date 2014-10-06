<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name') ?></title>
    <?php 
        $args   =array('post_type' => 'post','posts_per_page' => 1);query_posts($args);
        if (have_posts()) : while(have_posts()) : the_post();
        if (is_single()) { ?>
            <meta property="og:url" content="<?php the_permalink() ?>"/>
            <meta property="og:title" content="<?php single_post_title(''); ?>" />
            <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:image" content="<?php if (function_exists('catch_that_image')) {echo catch_that_image(); }?>" />
        <?php } else { ?>
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
            <meta property="og:description" content="<?php bloginfo('description'); ?>" />
            <meta property="og:type" content="website" />
            <meta property="og:image" content="<?php bloginfo('template_url' ); ?>/images/logo.png">
    <?php } endwhile; endif; ?>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <?php wp_reset_query(); ?>

    <script>
  (function(d) {
    var config = {
      kitId: 'lrw1dbe',
      scriptTimeout: 3000
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>

<script type="text/javascript">
  var ShopifyStoreConfig = {shop:"pfennings-organic-vegetables-inc.myshopify.com", collections:[28537207,28536907,28537219]};
  (function() {
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; 
    s.src = "//widgets.shopifyapps.com/assets/shopifystore.js";
    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
  })();  
</script>
<noscript>Please enable javascript, or <a href="http://pfennings-organic-vegetables-inc.myshopify.com">click here</a> to visit my <a href="http://www.shopify.com/tour/ecommerce-website">ecommerce web site</a> powered by Shopify.</noscript>
    
    <?php wp_head(); ?>
</head>

<body class="wrap push">
<section role="banner">
    <header>
        <div class="logo">
            <a href="<?php bloginfo('url'); ?>">Pfenning's Organic Farm</a>
        </div>
        <div class="top-nav">
        <ul>
            <li><a class="button" href='#shopify-store'><button>View my Store</button></a></li>
            <li><a href="#menu" class="menu-link">menu &#9776;</a></li>
        </ul>
        <nav id="menu" class="panel" role="navigation">
            <?php wp_nav_menu(array('theme_location'=>'header-menu'));?>
        </nav>
    </header>
</section>