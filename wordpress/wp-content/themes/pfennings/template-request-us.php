<aside>
	<div class="store-search">
		<h4>Look For A Store</h4>
		<form action="" class="gform_wrapper">
			<input type="text" name="zipcode" placeholder="Your Postal Code" value="<?php echo $_REQUEST['zipcode'];?>" />
			<input type="submit" value="Search" >
		</form>
	</div>
	 
	<?php gravity_form(1, true, true, false, '', true, 12); ?>
</aside>