<?php
/**
 * Reverse Engineering
 * Doctrine
 * Generate XML from existing database.
 */
require dirname ( __FILE__ ) . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\DatabaseDriver;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\Export\ClassMetadataExporter;
use com\bornayuan\turtleshell\ConfigurationManager;

$isDevMode = true;
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

$entityManager->getConfiguration ()->setMetadataDriverImpl ( new DatabaseDriver ( $entityManager->getConnection ()->getSchemaManager () ) );

$cmf = new DisconnectedClassMetadataFactory ();
$cmf->setEntityManager ( $entityManager );
$metadata = $cmf->getAllMetadata ();
$cme = new ClassMetadataExporter ();
$exporter = $cme->getExporter ( 'xml', '/lib' );
$exporter->setMetadata ( $metadata );
$exporter->export ();
?>