<?php
require_once (dirname ( __FILE__ ) . '/ts-configuration.php');
require_once ABSPATH . '/com/bornayuan/turtleshell/service/ServiceProvider.php';

use com\bornayuan\turtleshell\service\ServiceProvider;

$service = new ServiceProvider ();
$ubEntity = $service->loadUserBasic ( 1 );

echo 'ServiceProvider->loadUserBadic()';
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
$signInFlag = $service->signIn ( 'forla', '654321' );
if ($signInFlag) {
	echo 'Sign In successfully!';
	echo '<br />';
} else {
	echo 'Sign In failed!';
	echo '<br />';
}

?>