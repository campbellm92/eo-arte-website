<?php
if (!defined('ABSPATH'))
    exit;

// require helpers, custom post types, filters, settings from inc/

// WP admin
require_once 'inc/admin/admin-sidebar.php';

// assets
require_once 'inc/assets/enqueue.php';

//core
require_once 'inc/core/cleanup.php';
require_once 'inc/core/theme-support.php';

// custom post types
require_once 'inc/custom-post-types/event.php';
require_once 'inc/custom-post-types/workshop.php';
require_once 'inc/custom-post-types/artist.php';

// handlers
require_once 'inc/handlers/handle-contact-form-submission.php';

// media
require_once 'inc/media/gallery.php';

// utils
require_once 'inc/utils/convert-img-to-webp-on-media-upload.php';
require_once 'inc/utils/date-time-formatters.php';
require_once 'inc/utils/get-svg-markup.php';

// components
require_once 'components/buttons.php';