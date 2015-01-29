<?php //Partners CPT

$args = array(
    'has_archive' => true,
    //'menu_position' => 5,
    'hierarchical' => true,
    'menu_icon' => 'dashicons-groups', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', )
    );

$grain = register_cuztom_post_type( 'Grain Mill', $args);

$grain->add_meta_box(
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

$grain->add_meta_box(
    'services',
    'Services', 
    array(
        'bundle',    
            array( 
                array(
                    'name'          => 'title',
                    'label'         => 'Title',
                    'description'   => 'Title of service',
                    'type'          => 'text',          
                ),
                array(
                    'name'          => 'content',
                    'label'         => 'Services description',
                    'description'   => 'Services description',
                    'type'          => 'textarea',          
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