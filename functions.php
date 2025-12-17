<?php
if (!defined('ABSPATH'))
    exit;

//functions and styles
require_once 'inc/assets/enqueue.php';
require_once 'inc/core/cleanup.php';
require_once 'inc/media/gallery.php';

// custom post types
require_once 'inc/custom-post-types/event.php';
require_once 'inc/custom-post-types/workshop.php';
require_once 'inc/custom-post-types/artist.php';

// theme support
require_once 'inc/core/theme-support.php';

//handlers + utils
require_once 'inc/utils/convert-img-to-webp-on-media-upload.php';
require_once 'inc/utils/date-time-formatters.php';
require_once 'inc/utils/get-svg-markup.php';
require_once 'inc/handlers/handle-contact-form-submission.php';

//components
require_once 'components/buttons.php';