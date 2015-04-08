<?php
function load_stores() {
	global $wpdb;
	$data='';
	$output='';
	$location=$_POST['location'];
	$query="SELECT * FROM  `wp_store_locator`";
	$data['filter']='no';
	$map_center=get_option('csl-slplus_map_center');
	$zoom_level=get_option('sl_zoom_level');
	$home_icon=get_option('sl_map_home_icon');
	$end_icon=get_option('sl_map_end_icon');
	$data['map_center']=$map_center;
	$data['zoom_level']=$zoom_level;
	$data['home_icon']=$home_icon;
	$data['end_icon']=$end_icon;
	
	if($location) {
		$query.=" where `sl_city` LIKE  '".$location."' OR `sl_zip` like '".$location."'";
		$data['filter']='yes';
	}
	$results=$wpdb->get_results($query,ARRAY_A);
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
						'directions'=>'',
						'latitude'=>$latitude,
						'longitude'=>$longitude,
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
	$data='';
	$map_center=get_option('csl-slplus_map_center');
	$zoom_level=get_option('sl_zoom_level');
	$home_icon=get_option('sl_map_home_icon');
	$end_icon=get_option('sl_map_end_icon');
	$data['map_center']=$map_center;
	$data['zoom_level']=$zoom_level;
	$data['home_icon']=$home_icon;
	$data['end_icon']=$end_icon;
	echo json_encode($data);
	die(0);
}
add_action( 'wp_ajax_get_map_settings', 'get_map_settings');
add_action( 'wp_ajax_nopriv_get_map_settings', 'get_map_settings');
?>