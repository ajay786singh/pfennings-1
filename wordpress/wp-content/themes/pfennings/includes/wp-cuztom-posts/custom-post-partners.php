<?php //Partners CPT

$args = array(
	'has_archive' => true,
	//'menu_position' => 5,
	'menu_icon' => 'dashicons-groups', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', )
 	);

$partners = register_cuztom_post_type( 'Partners', $args);

$partners->add_meta_box(
	'banner',
    'Featured banner', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 800px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'heading',
            'label'         => 'Banner Text',
            'description'   => 'Enter text',
            'type'          => 'wysiwyg',
            
        )
    )
);


$partners->add_meta_box(
	'ordering',
	'Interested in Ordering',
		array(
			array(
				'name'          => 'sub_text',
				'label'         => 'Brief paragraph',
				'description'   => 'Write a fantastic paragraph for those interested in ordering',
				'type'          => 'textarea',          
			)
		)
	);
$partners->add_meta_box(
	'partnering',
	'Interested in Partnering',
		array(
			array(
				'name'          => 'sub_text',
				'label'         => 'Brief paragraph',
				'description'   => 'Write something that makes those coming here want to be a partner',
				'type'          => 'textarea',          
			)
		)
	);
$partners->add_meta_box(
	'current_partners',
	'Current Partners',	
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
					'name'          => 'farm',
					'label'         => 'Farm name',
					'description'   => '',
					'type'          => 'text',          
				),
				array(
					'name'          => 'location',
					'label'         => 'Location',
					'description'   => 'Location of farm',
					'type'          => 'text',          
				),
				array(
					'name'          => 'produce',
					'label'         => 'Produce specialty',
					'description'   => 'Comma delimited list of produce',
					'type'          => 'text',          
				),
			    array(
        			'name'          => 'link',
        			'label'         => 'Website address',
        			'description'   => 'Example: "www.example.com',
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