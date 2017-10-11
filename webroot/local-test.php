<?php
require (dirname ( __FILE__ ) . '/ts-configuration.php');
require constant ( 'ABSPATH' ) . '/objectlibrary/storage/StorageManager.php';

use objectlibrary\storage\StorageManager;

$storage = new StorageManager ();
$ubEntity = $storage->loadUserBadic ( 1 );

echo 'Full Name: ' . $ubEntity->getFirstName () . ' ' . $ubEntity->getMiddleName () . '' . $ubEntity->getLastName ();
echo '<br />';
echo 'Unique Identity: ' . $ubEntity->getUniqueIdentity ();

?>