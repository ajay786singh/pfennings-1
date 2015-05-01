<?php
/* Function to add social sharing buttons on right side of any template or page

add this line:- if(social_share()) { social_share();}
*/
function get_tiny_url($url)  {  
	$ch = curl_init();  
	$timeout = 5;  
	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
	$data = curl_exec($ch);  
	curl_close($ch);  
	return $data;  
}

function social_share() {
	$id=get_the_ID();
	$title = get_the_title();
	$link = get_the_permalink();
    $content= get_the_excerpt();
	$img = wp_get_attachment_url( get_post_thumbnail_id($id) );
	$twitter_link = get_tiny_url($link);
	if($img==''){
		$img=get_bloginfo('template_url').'/images/logo.png';	
	}
?>
	<div class="share-before share-filled share-small" id="share">
		<div class="twitter sharrre" id="twitter" data-url="<?php echo $twitter_link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $title;?>" data-title="Tweet">
			<div class="box"><a class="count" href="#">0</a><a class="share" href="#">Tweet</a></div>
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