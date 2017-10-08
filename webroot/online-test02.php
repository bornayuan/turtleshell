<?php
require (dirname ( __FILE__ ) . '/ts-configuration.php');

try {
	$conn = mysqli_init ();
	if (! $conn) {
		die ( '<p>Call mysqli_init() failed!</p>' );
	} else {
		echo '<p>Call  mysqli_init() successfully!</p>';
	}
	
	$connFlag = mysqli_real_connect ( $conn, constant ( 'DATABASE_SERVER' ), constant ( 'DATABASE_USERNAME' ), constant ( 'DATABASE_PASSWORD' ), constant ( 'DATABASE_NAME' ), constant ( 'DATABASE_PORT' ), constant ( 'DATABASE_SOCKET' ), constant ( 'DATABASE_FLAG' ) );
	if (! $connFlag) {
		die ( '<p>Connect Error: ' . mysqli_connect_error () . '</p>');
	} else {
		echo 'Connect database successfully!</p>';
	}
	
	mysqli_close ( $conn );
	echo '<p>Close database connection successfully!</p>';
	
} catch ( Exception $e ) {
	echo '<p>' . $e->getMessage () . '</p>';
}
?>