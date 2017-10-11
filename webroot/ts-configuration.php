<?php
/*
 * Global Definitions
 */
if (! defined ( 'ABSPATH' )) {
	define ( 'ABSPATH', dirname ( __FILE__ ) );
}

/*
 * System Configuration Information
 */
require_once constant ( 'ABSPATH' ) . '/ts-configuration-system.php';

/*
 * Database Configuration Information
 */
require_once constant ( 'ABSPATH' ) . '/ts-configuration-database.php';

?>