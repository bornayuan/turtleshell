<?php

/*
 * Abstract path definition
 */
if (! defined ( 'ABSPATH' )) {
	define ( 'ABSPATH', dirname ( __FILE__ ) );
}

/*
 * System Configuration Information
 */
require_once ABSPATH . '/ts-configuration-system.php';

/*
 * Database Configuration Information
 */
require_once ABSPATH . '/ts-configuration-database.php';

?>