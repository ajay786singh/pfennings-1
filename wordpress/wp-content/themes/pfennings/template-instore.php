<?php
/*
Template Name: In Stores
*/
get_header(); ?>

<!-- Get custom meta values -->
<?php
    $bannerHeadline     = wpautop(get_post_meta($post->ID,'_banner_heading',true));
    $bannerImageId      = get_post_meta($post->ID, '_banner_image', true);
    $bannerImageUrl     = wp_get_attachment_image_src($bannerImageId,'banner', true);
?>

<section role="slider" style="background: url(<?php echo $bannerImageUrl[0]; ?>) no-repeat; background-size: cover; background-position: center center;">
    <header>
        <hgroup>
            <h6 class="headline"> 
                <?php if ($bannerHeadline) { ?>
                    <?php echo $bannerHeadline; ?>
                <?php } else { ?>
                    <?php echo the_title(); ?>
                <?php  } ?> 
            </h6>
        </hgroup>
    </header>
</section>

<div class="down-arrow">
    <a id="down-link" href="#content" class="target"><i class="fa fa-chevron-down"></i></a>
</div>

<section role="main">
    <div class="team" id="store-results">
        <h4>HOME DELIVERY</h4>

        <!-- For loop cycle through Array -->
        <?php 
			global $wpdb;
			$search_zip = $_REQUEST['zipcode'];
			$query = "select * from wp_store_locator";
			if($search_zip !="") {
			
				$query.=" where sl_zip LIKE '%" . $search_zip . "%'";
			}
			$results = $wpdb->get_results($query);
			
			if($results) {
	            foreach($results as $result) {
				
	            // Get custom meta values    
	            $name   	= $result->sl_store;
				$address   	= $result->sl_address;
				$address2   = $result->sl_address2;
				$city   	= $result->sl_city;
	            $state   	= $result->sl_state;
				$country   	= $result->sl_country;
				$address3	=implode(", ", array_filter(array($city,$state,$country)));
				$zip   		= $result->sl_zip;
				$phone   	= $result->sl_phone;
				$image   	= $result->sl_image;
				$email   	= $result->sl_email;
            
		?>
        
        <div class="block-grid-2">
            <p>
				<?php if ($image) {
					echo wp_get_attachment_image($image) . '<br>';
					} 
				?>
				<?php if ($name): 
				   echo '<b>' . $name . '</b><br>';
				endif ?>
				<?php if ($address):
					echo $address . '<br>';
				endif ?>
				<?php if ($address2):
					echo $address2 . '<br>';
				endif ?>
				<?php if ($address3):
					echo $address3 . '<br>';
				endif ?>
				
				<?php if ($phone):
					echo $phone . '<br>';
				endif ?>
				<?php if ($zip):
					echo $zip . '<br>';
				endif ?>
				<?php if ($email):
					echo $email . '<br>';
				endif ?>
           </p>
        </div>
      
        <?php
				}
            } else {
				echo "<p class='green-box'>Sorry, there was no store within 25km found for <b>".$search_zip."</b>.<br>";
				echo "<a href='".get_permalink()."#store-results'>Get All Stores</a></p>";
			?>
			<h6>Other results: </h6>
			<?php 
				$query2="select * from wp_store_locator";
				$results="";
				$results=$wpdb->get_results($query2);
		
				if($results) {
					foreach($results as $result) {
					
					// Get custom meta values    
					$name   	= $result->sl_store;
					$address   	= $result->sl_address;
					$address2   = $result->sl_address2;
					$city   	= $result->sl_city;
					$state   	= $result->sl_state;
					$country   	= $result->sl_country;
					$address3	=implode(", ", array_filter(array($city,$state,$country)));
					$zip   		= $result->sl_zip;
					$phone   	= $result->sl_phone;
					$image   	= $result->sl_image;
					$email   	= $result->sl_email;	
				?>
        
				<div class="block-grid-2">
					<p>
						<?php if ($image) {
							echo wp_get_attachment_image($image) . '<br>';
							} 
						?>
						<?php if ($name): 
						   echo '<b>' . $name . '</b><br>';
						endif ?>
						<?php if ($address):
							echo $address . '<br>';
						endif ?>
						<?php if ($address2):
							echo $address2 . '<br>';
						endif ?>
						<?php if ($address3):
							echo $address3 . '<br>';
						endif ?>
						
						<?php if ($phone):
							echo $phone . '<br>';
						endif ?>
						<?php if ($zip):
							echo $zip . '<br>';
						endif ?>
						<?php if ($email):
							echo $email . '<br>';
						endif ?>
						
				   </p>
				</div>
			  
        	<?php }
            } 	
		} ?>
   </div>
   <?php get_template_part( 'template', 'request-us' ); ?>
</section>
<?php get_footer(); ?>