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
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\Export\ClassMetadataExporter;
use com\bornayuan\turtleshell\ConfigurationManager;

/*
 * Prepare parameters
 */
$isDevMode = true;
$databaseConfiguration =  ConfigurationManager::getDatabaseConfiguration();

$xmlMapperPaths = [ 
		ConfigurationManager::getMapperFilePath()
];

/*
 * Initialize
 */
$doctrineConfiguration = Setup::createXMLMetadataConfiguration ( $xmlMapperPaths, $isDevMode );
$entityManager = EntityManager::create ( $databaseConfiguration, $doctrineConfiguration );
$connection = $entityManager->getConnection ();
$schemaManager = $connection->getSchemaManager ();
$databaseDriver = new DatabaseDriver ( $schemaManager );
$entityManager->getConfiguration ()->setMetadataDriverImpl ( $databaseDriver );

/*
 * Generate Mappers
 */
$cmf = new DisconnectedClassMetadataFactory ();
$cmf->setEntityManager ( $entityManager );
$metadata = $cmf->getAllMetadata ();
$cme = new ClassMetadataExporter ();
$exporter = $cme->getExporter ( 'xml', ConfigurationManager::getMapperFilePath() );
$exporter->setMetadata ( $metadata );
$exporter->export ();

/*
 * Generate Entities
 */
$generator = new EntityGenerator();
$generator->setGenerateAnnotations(true);
$generator->setGenerateStubMethods(true);
$generator->setRegenerateEntityIfExists(true);
$generator->setUpdateEntityIfExists(true);
$generator->generate($metadata, ConfigurationManager::getEntityFilePath());
?>