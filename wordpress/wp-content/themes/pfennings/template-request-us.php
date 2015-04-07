<aside>
	<div class="store-search">
		<h4>Look For A Store</h4>
		<p><?php echo get_option('sl_instruction_message');?></p>
		<div class="search-form">
			<form action="" id="searchForm">
				<div id="address_search"> 
					<div id="addy_in_address" class="search_item">
						<label for="addressInput"><?php echo get_option('sl_search_label');?></label>
						<input type="text" id="address" name="address" placeholder="" size="50" value="">
					</div>                                                                
					<div class="search_item">            
						<div id="addy_in_radius">
							<label for="radiusSelect"><?php echo get_option('sl_radius_label');?></label>
								<select id="radiusSelect">
									<option value="10">10 km</option>
									<option value="25">25 km</option>
									<option value="50">50 km</option>
									<option value="100">100 km</option>
									<option value="200" selected="selected">200 km</option>
									<option value="500">500 km</option>
								</select>								
						</div>            
						<div id="radius_in_submit">
							<input type="submit" class="slp_ui_button" value="Find Locations" id="addressSubmit">
						</div>        
					</div> 
				</div>			
			</form>
		</div>
	</div>	 
	<?php gravity_form(1, true, true, false, '', true, 12); ?>
</aside>