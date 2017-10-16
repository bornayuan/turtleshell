<?php
require_once (dirname ( __FILE__ ) . '/ts-configuration.php');
require_once constant ( 'ABSPATH' ) . '/com/bornayuan/turtleshell/storage/StorageManager.php';

use com\bornayuan\turtleshell\storage\StorageManager;

$storage = new StorageManager ();
$ubEntity = $storage->loadUserBadic ( 1 );

echo 'StorageManager->loadUserBadic()';
echo '<br />';
echo 'ID: ' . $ubEntity->getId ();
echo '<br />';
echo 'Full Name: ' . $ubEntity->getFirstName () . ' ' . $ubEntity->getMiddleName () . '' . $ubEntity->getLastName ();
echo '<br />';
echo 'Unique Identity: ' . $ubEntity->getUniqueIdentity ();
echo '<br />';

echo '<br />';
echo '<br />';
echo '<br />';

echo 'StorageManager->signIn()';
echo '<br />';
$signInFlag = $storage->signIn ( 'forla', '654321' );
if ($signInFlag) {
	echo 'Sign In successfully!';
	echo '<br />';
} else {
	echo 'Sign In failed!';
	echo '<br />';
}

?>