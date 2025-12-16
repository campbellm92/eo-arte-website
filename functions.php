<?php
if (!defined('ABSPATH'))
    exit;

//functions and styles
require_once 'inc/enqueue.php';
require_once 'inc/cleanup.php';
require_once 'inc/gallery.php';

//components
require_once 'components/buttons.php';

// custom post types
require_once 'inc/custom-post-types/event.php';
require_once 'inc/custom-post-types/workshop.php';
require_once 'inc/custom-post-types/artist.php';

// theme support
require_once 'inc/theme-support.php';

//handlers
require_once 'inc/convert-img-to-webp-on-media-upload.php';
require_once 'inc/date-time-formatters.php';
require_once 'inc/get-svg-markup.php';
require_once 'inc/handle-contact-form-submission.php';
