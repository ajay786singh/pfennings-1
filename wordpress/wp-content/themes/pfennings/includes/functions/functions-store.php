<?php
function load_stores() {
	global $wpdb;
	$query="SELECT * FROM  `wp_store_locator`";
	$results=$wpdb->get_results($query,ARRAY_A);
	$data='';
	$output='';
	if($results) {
		$data['type']='success';
		$count= count($results);
		for($i=0;$i<$count;$i++) {
			$title=$results[$i]['sl_store'];
			$address=array_filter(array($results[$i]['sl_address'],$results[$i]['sl_address2']));
			$address=implode(',', $address);
			$city=$results[$i]['sl_city'];
			$state=$results[$i]['sl_state'];
			$zip=$results[$i]['sl_zip'];
			$country=$results[$i]['sl_country'];
			$phone=$results[$i]['sl_phone'];
			$fax=$results[$i]['sl_fax'];
			$email=$results[$i]['sl_email'];
			$website=$results[$i]['sl_url'];
			$latitude=$results[$i]['sl_latitude'];
			$longitude=$results[$i]['sl_longitude'];
			$citystatezip=array_filter(array($city,$state,$zip));
			$citystatezip=implode(',', $citystatezip);
			$output[]=array(	
						'title'=>$title,
						'address'=>$address,
						'city'=>$city,
						'state'=>$state,
						'zip'=>$state,
						'citystatezip'=>$citystatezip,
						'country'=>$country,
						'phone'=>$phone,
						'fax'=>$fax,
						'website'=>$website,
						'email'=>$email,
						'directions'=>''
					);
			$data['result']=$output;
		}
	}else {
		$data['type']='error';
	}
	echo json_encode($data);
	die(0);
}
add_action( 'wp_ajax_load_stores', 'load_stores' );
add_action( 'wp_ajax_nopriv_load_stores', 'load_stores' );
function get_map_settings() {
	global $wpdb;
	$query="SELECT * FROM  `wp_sl_setting` WHERE `sl_setting_name` LIKE  'sl_vars'";
	$results = $wpdb->get_row($query,ARRAY_A);
	$results = unserialize($results['sl_setting_value']);
	echo json_encode($results);
	die(0);
}
add_action( 'wp_ajax_get_map_settings', 'get_map_settings');
add_action( 'wp_ajax_nopriv_get_map_settings', 'get_map_settings');
?>