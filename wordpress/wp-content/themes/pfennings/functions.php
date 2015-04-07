<?php
include('includes/wp-cuztom-helper/cuztom.php');

//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
include('includes/wp-cuztom-posts/custom-post-team.php');
include('includes/wp-cuztom-posts/custom-post-partners.php');
include('includes/wp-cuztom-posts/custom-generic.php');

//Load custom functions
//require_once('includes/functions/add-classes-to-body.php');
//require_once('includes/functions/admin-tinymce.php');
//require_once('includes/functions/custom-login-logo.php');

// Functions to Add
require_once('includes/functions/add-placeholder-field-gravity-forms.php');
require_once('includes/functions/add-social-share.php');
require_once('includes/functions/add-social-aggregator.php');
require_once('includes/functions/image-support.php');
require_once('includes/functions/pagination.php');
require_once('includes/functions/register-menu.php');
require_once('includes/functions/register-sidebar.php');

// Functions to Enqueue
require_once('includes/functions/enqueue-style.php');
require_once('includes/functions/enqueue-script.php');
// Functions to remove 
require_once('includes/functions/remove-header-meta.php');
require_once('includes/functions/remove-menu-id.php');
//require_once('includes/functions/remove-wp-version.php');
require_once('includes/functions/remove-image-dimensions.php');

// Utility Functions
require_once('includes/functions/first-image.php');
require_once('includes/functions/page-excerpts.php');
require_once('includes/functions/recent-post.php');
require_once('includes/functions/functions-store.php');
?>