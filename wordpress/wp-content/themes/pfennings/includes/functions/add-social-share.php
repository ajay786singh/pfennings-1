<?php
/* Function to add social sharing buttons on right side of any template or page

add this line:- if(social_share()) { social_share();}
*/

function social_share() {
	$title = get_the_title();
	$link = get_the_permalink();
    $content= get_the_excerpt();
	$img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	if($img==''){
		$img=get_bloginfo('template_url').'/images/logo.png';	
	}
?>
	<div class="share-before share-filled share-small" id="share">
		<div class="twitter sharrre" id="twitter" data-url="<?php echo $link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $content;?>" data-title="Tweet">
			<div class="box"><a class="count" href="#">0</a><a class="share" href="#">Tweet</a></div>
		</div>
		<div class="googlePlus sharrre" id="googleplus" data-url="<?php echo $link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $content;?>" data-title="Share">
			<div class="box"><a class="count" href="#">0</a><a class="share" href="#">Share</a></div>
		</div>
		<div class="facebook sharrre" id="facebook" data-url="<?php echo $link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $content;?>" data-title="Share">
			<div class="box"><a class="count" href="#">0</a><a class="share" href="#">Share</a></div>
		</div>
		<div class="linkedin sharrre" id="linkedin" data-url="<?php echo $link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $content;?>" data-title="Share">
			<div class="box"><a class="count" href="#">0</a><a class="share" href="#">Share</a></div>
		</div>
		<div class="pinterest sharrre" id="pinterest" data-url="<?php echo $link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $content;?>" data-title="Share">
			<div class="box"><a class="count" href="#">0</a><a class="share" href="#">Share</a></div>
		</div>
	</div>
<?php 
}
?>