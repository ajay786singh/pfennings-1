<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name') ?></title>

<script>
  (function(d) {
    var config = {
      kitId: 'igh1gex',
      scriptTimeout: 3000
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<!--
<script type="text/javascript">
  var ShopifyStoreConfig = {shop:"pfennings-organic-vegetables-inc.myshopify.com", collections:[28537207,28536907,28537219]};
  (function() {
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; 
    s.src = "//widgets.shopifyapps.com/assets/shopifystore.js";
    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
  })();  
</script>
<noscript>Please enable javascript, or <a href="http://pfennings-organic-vegetables-inc.myshopify.com">click here</a> to visit my <a href="http://www.shopify.com/tour/ecommerce-website">ecommerce web site</a> powered by Shopify.</noscript>
-->
<?php wp_head(); ?>
<script>
	var share_function_url="<?php bloginfo('template_url');?>/includes/social-share/sharrre.php";
	var only_single=0;
	<?php if (is_single()) { ?>
		only_single=1;
	<?php } ?>
</script>
</head>

<body <?php body_class();?>>
<div id="mm-menu-toggle" class="mm-menu-toggle">Menu</div>
  
<nav id="mm-menu" class="mm-menu">
	<?php wp_nav_menu(array('theme_location'=>'header-menu','items_wrap'=> '<ul id="%1$s" class="mm-menu__items %2$s">%3$s</ul>','walker'=> new Walker_MM_Menu()));?>     
</nav>

<section role="banner">
    <header class="original">
        <div class="logo">
            <a href="<?php bloginfo('url');?>">
				<img src="<?php bloginfo('template_url' ); ?>/dist/images/pfenningslogo.png">
			</a>
        </div>
        <div class="logo_sticky">
            <a href="<?php bloginfo('url');?>">
                <h1>Pfenning's Organic Farms<span class="tagline">Community Flavoured Agriculture</span>
</h1>
            </a>
        </div>
        <!--<div id="mm-menu-toggle" class="mm-menu-toggle"><span></span>Menu</div> -->
    </header>
</section>
<div id="wrapper" class="wrapper">