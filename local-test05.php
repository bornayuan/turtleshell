<?php
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use com\bornayuan\turtleshell\ConfigurationManager;
use com\bornayuan\turtleshell\storage\entity\UserAddressEntity;

$isDevMode = true;

// the connection configuration
$databaseConfiguration = [ 
		'driver' => 'pdo_mysql',
		'host' => ConfigurationManager::$DATABASE_SERVER,
		'charset' => ConfigurationManager::$DATABASE_CHARSET,
		'user' => ConfigurationManager::$DATABASE_USERNAME,
		'password' => ConfigurationManager::$DATABASE_PASSWORD,
		'dbname' => ConfigurationManager::$DATABASE_NAME 
];

$xmlMapperPaths = [
		dirname ( __FILE__ ) . '/lib/com/bornayuan/turtleshell/storage/mapper'
];





$doctrineConfiguration = Setup::createXMLMetadataConfiguration ( $xmlMapperPaths, $isDevMode );
$entityManager = EntityManager::create ( $databaseConfiguration, $doctrineConfiguration );


$uaEntity = new UserAddressEntity ();
$uaEntity ->setId(1);
$uaEntity->setLabel ( 'HomeAddress'. date('ymdhis') );
$entityManager->persist ( $uaEntity );
$entityManager->flush ();
echo 'Persist Operation: UserAddressEntity id=' . $uaEntity->getId() . ', lable=' . $uaEntity->getLabel() . '<br />';

$uaEntity = $entityManager->find('com\bornayuan\turtleshell\storage\entity\UserAddressEntity', 1);
$entityManager->flush ();

echo 'Find Operation: UserAddressEntity id=' . $uaEntity->getId() . ', lable=' . $uaEntity->getLabel() . '<br />';

?>