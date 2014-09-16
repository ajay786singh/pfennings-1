<footer>
    <div class="footer-inner">
        <div class="content">
            <h5>Get the Newsletter</h5>
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
                <span class='symbol'><a href="https://twitter.com/hypenotic">roundedtwitterbird</a></span></a>
                <span class='symbol'><a href="https://www.facebook.com/hypenotic">roundedfacebook</a></span>
                <span class='symbol'><a href="mailto:#">roundedemail</a></span>
            </div>
        </div>
        <div class="content">
            <h5>Mission</h5>
            <p>Pfenning's Organic Farm is a grower/packer/shipper of certified organic produce. More than just a farm, ours is a "Quality of Life" business that takes a holistic approach to sustainability, and we live the organic concepts in our daily lives and business practices.</p>
        </div>  
        <div class="content">
            <h5>Contact</h5>
            <p>
                Pfenning's Organic Farm<br>
                1209 Waterloo Street<br>
                Baden, ON<br>
                N3A 1T1<br>
                <i class="fa fa-map-marker"></i> <a href="https://goo.gl/maps/RnHjJ" target="_blank">Map</a>
            </p>

            <p>
                Ph: +1 (519) 662-3468<br>
                Toll free: 877-662-3468<br>
                Fax: +1 (519) 662-4083<br>
                <a href="mailto: veggies@pfenningsfarms.ca">veggies@pfenningsfarms.ca</a>
        </div>  

    </div>
    <div class="footer-inner">
        <p class="small">&copy; 2014 Pfennings Farm Inc. All Rights Reserved.</p>
    </div>
</footer>

<?php wp_footer();?>

<script>

   jQuery(document).ready(function() {
    jQuery('.menu-link').bigSlide();
});


    /* fix vertical when not overflow
call fullscreenFix() if .fullscreen content changes */
function fullscreenFix(){
    var h = jQuery('body').height();
    // set .fullscreen height
    jQuery(".content-b").each(function(i){
        if(jQuery(this).innerHeight() <= h){
            jQuery(this).closest(".fullscreen").addClass("not-overflow");
        }
    });
}
jQuery(window).resize(fullscreenFix);
fullscreenFix();

/* resize background images */
function backgroundResize(){
    var windowH = jQuery(window).height();
    jQuery(".background").each(function(i){
        var path = jQuery(this);
        // variables
        var contW = path.width();
        var contH = path.height();
        var imgW = path.attr("data-img-width");
        var imgH = path.attr("data-img-height");
        var ratio = imgW / imgH;
        // overflowing difference
        var diff = parseFloat(path.attr("data-diff"));
        diff = diff ? diff : 0;
        // remaining height to have fullscreen image only on parallax
        var remainingH = 0;
        if(path.hasClass("parallax")){
            var maxH = contH > windowH ? contH : windowH;
            remainingH = windowH - contH;
        }
        // set img values depending on cont
        imgH = contH + remainingH + diff;
        imgW = imgH * ratio;
        // fix when too large
        if(contW > imgW){
            imgW = contW;
            imgH = imgW / ratio;
        }
        //
        path.data("resized-imgW", imgW);
        path.data("resized-imgH", imgH);
        path.css("background-size", imgW + "px " + imgH + "px");
    });
}
jQuery(window).resize(backgroundResize);
jQuery(window).focus(backgroundResize);
backgroundResize();

</script>

</body>
</html>