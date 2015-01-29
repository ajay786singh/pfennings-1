<footer>
    <div class="footer-inner">
        <!-- Column 1 -->
        <div class="content">
            <h5>Get in Touch</h5>
            <p>
                Pfenning's Organic Farm<br>
                1209 Waterloo Street<br>
                Baden, ON. N3A 1T1<br>
                f: +1 (519) 662-4083<br>
                <a class="button-phone" href="tel://+15196623468">t: +1 (519) 662-3468</a><br>
                <a class="button-phone" href="tel://8776623468">Toll free: 877-662-3468</a><br>
                <a class="button-email" href="mailto: veggies@pfenningsfarms.ca">veggies@pfenningsfarms.ca</a><br>
                <a class="button-map" href="https://goo.gl/maps/RnHjJ" target="_blank">Map</a>
            </p>
        </div>  

        <!-- Column 2 -->
        <div class="content"> 
            <h5>Latest News</h5>
            <?php recentposts(); ?>
        </div>

        <!-- Column 3 -->
         <div class="content">
            <h5>Newsletter</h5>
            <form action="http://hypenotic.us1.list-manage.com/subscribe/post?u=24fdcfc8d7addaf3c603f28a9&amp;id=06041ce3ca" method="post">
                <input type="hidden" value="2" name="group[2][2]" id="mce-group[2]-2-1">
                <fieldset>
                    <ol>
                        <li><input name="EMAIL" placeholder="you@yourdomain.com" type="email" value=""  id="mce-EMAIL" required></li>
                        <li><input type="submit" value="Subscribe"></li>
                    </ol>
                </fieldset>
            </form>
            <div class="social-share">
                <span class='symbol'><a href="https://www.facebook.com/pfenningsfarm">circlefacebook</a></span>
                <span class='symbol'><a href="mailto: veggies@pfenningsfarms.ca">circleemail</a></span>
                <span class='symbol'><a href="https://twitter.com/PfOrganicFarms">circletwitterbird</a></span></a>
            </div>
        </div> 
    </div>
    <div class="footer-inner">
       <div class="copyright">
            <small>Made with love by <a href="http://hypenotic.com">Hypenotic</a></small>
        </div>
    </div>
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