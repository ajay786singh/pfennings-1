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
					<?php $radius=get_option('sl_map_radii');
						if($radius) {
						$radius=explode(",",$radius);
					?>
					<div class="search_item">            
						<div id="addy_in_radius">
							<label for="radiusSelect"><?php echo get_option('sl_radius_label');?></label>
								<select id="radiusSelect">
									<?php 
										foreach ($radius as $radi) {
											$selected=(preg_match('/\(.*\)/', $radi))? " selected='selected' " : "" ;
											$radi=preg_replace('/[^0-9\.]/', '', $radi);
											echo "<option value='$radi' $selected>$radi km</option>";	
										} 
									?>
								</select>								
						</div>            
					</div> 
					<?php } ?>
					<div id="radius_in_submit">
							<input type="submit" class="slp_ui_button" value="Find Locations" id="addressSubmit">
						</div>
				</div>			
			</form>
		</div>
	</div>	 
	<?php gravity_form(1, true, true, false, '', true, 12); ?>
</aside>