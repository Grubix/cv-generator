<?php

/* Directiores */
define('ROOT_DIR', dirname(dirname(__DIR__)) . '/');
define('FILES_DIR', ROOT_DIR . 'user_files/');
define('PUBLIC_DIR', ROOT_DIR . 'public/');
define('RESOURCES_DIR', ROOT_DIR . 'resources/');
define('TMP_DIR', ROOT_DIR . 'tmp/');
define('TEMPLATES_DIR', RESOURCES_DIR . 'templates/');
define('CV_TEMPLATES_DIR', TEMPLATES_DIR . 'cv_templates/');
define('APP_DIR', ROOT_DIR . 'app/');
define('CORE_DIR', APP_DIR . 'Core/');
define('MODELS_DIR', APP_DIR . 'Model/');
define('CONTROLLERS_DIR', APP_DIR . 'Controller/');

/* Session */
define('USER_ID', 'user-id');
define('CSRF_TOKEN', 'token');