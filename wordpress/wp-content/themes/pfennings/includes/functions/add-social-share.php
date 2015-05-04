<?php
/* Function to add social sharing buttons on right side of any template or page

add this line:- if(social_share()) { social_share();}
*/

add_image_size('fb-preview', 90, 90, true);

// Get featured image
function social_share_get_FB_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'fb-preview');
        return $post_thumbnail_img[0];
    }
}
 
// Get post excerpt
function social_share_get_FB_description($post) {
    if ($post->post_excerpt) {
        return $post->post_excerpt;
    }
    else {
        // Post excerpt is not set, so we take first 55 words from post content
        $excerpt_length = 55;
        // Clean post content
        $text = str_replace("\r\n"," ", strip_tags(strip_shortcodes($post->post_content)));
        $words = explode(' ', $text, $excerpt_length + 1);
        if (count($words) > $excerpt_length) {
            array_pop($words);
            $excerpt = implode(' ', $words);
            return $excerpt;
        }
    }
}

function social_share_FB_header() {
    global $post;
	$post_description=htmlspecialchars(social_share_get_FB_description($post));
	$post_featured_image = social_share_get_FB_image($post->ID);
    if ( (is_single())) {
?>
  <meta property="og:title" content="<?php echo $post->post_title; ?>" />
  <meta property="description" content="<?php echo $post_description; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?php echo $post_featured_image; ?>" />
<?php
    }
}
add_action('wp_head', 'social_share_FB_header');

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
	global $post;
	$id=get_the_ID();
	$title = get_the_title();
	$link = get_the_permalink();
    $content= get_the_excerpt();
	$fb_content=htmlspecialchars(social_share_get_FB_description($post));
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
		<div class="facebook sharrre" id="facebook" data-url="<?php echo $link;?>" data-urlalt="<?php echo $link;?>" data-text="<?php echo $fb_content;?>" data-title="Share">
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