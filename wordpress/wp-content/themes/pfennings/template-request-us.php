<aside>
	<div class="store-search">
		<h4>Look For A Store</h4>
		<form action="<?php the_permalink();?>#store-results" class="gform_wrapper">
			<input type="text" name="zipcode" id="zipcode" placeholder="Your Postal Code" value="<?php echo $_REQUEST['zipcode'];?>" />
			<input type="submit" value="Search" >
		</form>
	</div>
	 
	<?php gravity_form(1, true, true, false, '', true, 12); ?>
</aside>