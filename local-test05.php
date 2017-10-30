<?php
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use com\bornayuan\turtleshell\ConfigurationManager;
use com\bornayuan\turtleshell\storage\entity\UserBasicEntity;

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


$ubEntity = new UserBasicEntity();
// $ubEntity ->setId(1);
// $ubEntity->setFirstName( 'Allen' );
// $entityManager->persist ( $ubEntity );
// $entityManager->flush ();
// echo 'Persist Operation: UserAddressEntity id=' . $uaEntity->getId() . ', lable=' . $uaEntity->getLabel() . '<br />';

$ubEntity = $entityManager->find('com\bornayuan\turtleshell\storage\entity\UserBasicEntity', 1);
$entityManager->flush ();

echo 'Find Operation: UserBasicEntity id=' . $ubEntity->getId() . ', lable=' . $ubEntity->getFirstName() . '<br />';

?>