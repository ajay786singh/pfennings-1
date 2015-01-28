<?php //Partners CPT

$args = array(
    'has_archive' => true,
    //'menu_position' => 5,
    'menu_icon' => 'dashicons-groups', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', )
    );

$services = register_cuztom_post_type( 'Services', $args);

$services->add_meta_box(
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

$services->add_meta_box(
    'services',
    'Services', 
    array(
        'bundle',    
            array( 
                array(
                    'name'          => 'content',
                    'label'         => 'Services description',
                    'description'   => 'Services description',
                    'type'          => 'wysiwyg',          
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