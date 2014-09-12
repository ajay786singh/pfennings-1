<?php //Connect CPT

$args = array(
	'has_archive' => true,
	'menu_icon' => 'dashicons-smiley', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title' )
 	);

$team = register_cuztom_post_type( 'Team', $args);

$team->add_meta_box(
	'teammate',
	'Team',	
	array(
		'bundle',    
			array( 
				array(
					'name'          => 'name',
					'label'         => 'Name',
					'description'   => 'First and Last name',
					'type'          => 'text',          
				),
				array(
					'name'          => 'title',
					'label'         => 'Title',
					'description'   => '',
					'type'          => 'text',          
				),
				array(
					'name'          => 'veggie',
					'label'         => 'Favourite veggie',
					'description'   => '',
					'type'          => 'text',          
				),
			    array(
        			'name'          => 'email',
        			'label'         => 'Email',
        			'description'   => '',
        			'type'          => 'text'
     			),
     			array(
        			'name'          => 'phone',
        			'label'         => 'Phone',
        			'description'   => '',
        			'type'          => 'text'
     			),
     			array(
			        'name'          => 'image',
			        'label'         => 'Image',
			        'description'   => 'Dimensions 300px x 300px',
			        'type'          => 'image',
			    )
			)
		)
);	
?>