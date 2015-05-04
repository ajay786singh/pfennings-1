<footer>
    <div class="footer-inner">
        <div class="footer-content fLogo_area">
            <div class="footer_logo">
				<a href="<?php bloginfo('url');?>">
                    <img src="<?php bloginfo('template_url' ); ?>/dist/images/logo-white.png">
                </a>
            </div>
        </div>
        <!-- Column 1 -->
        <div class="footer-content">
            <h5>Get in Touch</h5>
            <p>
                1209 Waterloo Street<br>
                New Hamburg, ON. N3A 1T1 <br>
                <a class="button-map" href="https://goo.gl/maps/RnHjJ" target="_blank">Map</a><br>

                <a class="button-phone" href="tel://+15196623468"><b>t:</b> +1 (519) 662-3468</a><br>

                <a class="button-phone" href="tel://8776623468"><b>Toll free:</b> 877-662-3468</a><br>
                
                <b>f:</b> +1 (519) 662-4083<br>

                <a class="button-email" href="mailto:veggies@pfenningsfarms.ca">veggies@pfenningsfarms.ca</a><br>
            </p>

            <div class="social-share">
                <span class='symbol'><a target="_blank" href="https://www.facebook.com/pfenningsfarm">circlefacebook</a></span>
                <span class='symbol'><a target="_blank" href="https://twitter.com/PfOrganicFarms">circletwitterbird</a></span></a>
            </div>
        </div>  

        <!-- Column 2 -->
        <div class="footer-content latest-news"> 
            <h5>Latest News</h5>
            <?php recentposts(); ?>
        </div>

        <!-- Column 3 -->
         <div class="footer-content">
            <h5>Get community flavoured news in your inbox</h5>

            <form action="//pfenningsfarms.us10.list-manage.com/subscribe/post?u=eb15a6953cd072b51e5330b15&amp;id=2cc6b23376" method="post">
                <input type="hidden" value="2" name="group[2][2]" id="mce-group[2]-2-1">
                <fieldset>
                    <ol>
                        <li><input name="FNAME" placeholder="First Name" type="text" value="" id="mce-FNAME"></li>
                        <li><input name="EMAIL" placeholder="you@yourdomain.com" type="email" value=""  id="mce-EMAIL" required></li>
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_eb15a6953cd072b51e5330b15_2cc6b23376" tabindex="-1" value=""></div>
                        <li><input type="submit" value="Subscribe"></li>
                    </ol>
                </fieldset>
            </form>
        </div>
        <div class="copyright">
             <small>Made with Purpose by B Corp Certified <a href="http://hypenotic.com">Hypenotic</a></small>
         </div> 
    </div>
	<img src="http://hypelabs.ca/pfennings/wordpress/wp-content/uploads/2015/05/fijian_frangipani_wallpaper_flowers_nature_wallpaper_1600_1200_1649.jpg">
</footer>

</div><!--/wrapper-->
<?php wp_footer();?>
<script>
    var menu = new Menu;
</script>
<script>
    jQuery(document).ready(function() {
        jQuery('#input_1_1').attr('placeholder','Favourite store');
        jQuery('#input_1_2').attr('placeholder','Location');
        jQuery('#input_1_4').attr('placeholder','Produce');
        jQuery('#input_1_5').attr('placeholder','Name');
        jQuery('#input_1_6').attr('placeholder','Email');
    });
</script>

</body>
</html>