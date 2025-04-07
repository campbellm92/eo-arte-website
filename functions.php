<?php
if (!defined('ABSPATH'))
    exit;

//functions
require_once 'inc/enqueue.php';


//components
require_once 'components/buttons.php';

// custom post types
require_once 'inc/custom-post-types/event.php';
require_once 'inc/custom-post-types/workshop.php';

// theme support
require_once 'inc/theme-support.php';

//handlers
require_once 'inc/img-to-webp.php';
require_once 'inc/date-time-formatters.php';