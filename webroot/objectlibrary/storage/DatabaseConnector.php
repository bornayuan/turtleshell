<?php

namespace objectlibrary\storage;

use Exception;

/**
 *
 * @author borna
 *        
 */
class DatabaseConnector {
	/*
	 * Database configuration
	 */
	private $databaseServer = null;
	private $databasePort = null;
	private $databaseName = null;
	private $databaseUsername = null;
	private $databasePassword = null;
	private $databaseCharset = null;
	private $databaseSocket = null;
	private $databaseFlag = null;
	
	/*
	 * Database connection
	 */
	private $databaseConnection = null;
	
	/**
	 *
	 * @return object
	 */
	public function getDatabaseConnection() {
		return $this->databaseConnection;
	}
	
	/**
	 *
	 * @param object $databaseConnection
	 */
	public function setDatabaseConnection($databaseConnection) {
		$this->databaseConnection = $databaseConnection;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabaseSocket() {
		return $this->databaseSocket;
	}
	
	/**
	 *
	 * @param string $databaseSocket
	 */
	public function setDatabaseSocket($databaseSocket) {
		$this->databaseSocket = $databaseSocket;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabaseFlag() {
		return $this->databaseFlag;
	}
	
	/**
	 *
	 * @param string $databaseFlag
	 */
	public function setDatabaseFlag($databaseFlag) {
		$this->databaseFlag = $databaseFlag;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabaseCharset() {
		return $this->databaseCharset;
	}
	
	/**
	 *
	 * @param string $databaseCharset
	 */
	public function setDatabaseCharset($databaseCharset) {
		$this->databaseCharset = $databaseCharset;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabaseServer() {
		return $this->databaseServer;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabasePort() {
		return $this->databasePort;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabaseName() {
		return $this->databaseName;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabaseUsername() {
		return $this->databaseUsername;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDatabasePassword() {
		return $this->databasePassword;
	}
	
	/**
	 *
	 * @param string $databaseServer
	 */
	public function setDatabaseServer($databaseServer) {
		$this->databaseServer = $databaseServer;
	}
	
	/**
	 *
	 * @param string $databasePort
	 */
	public function setDatabasePort($databasePort) {
		$this->databasePort = $databasePort;
	}
	
	/**
	 *
	 * @param string $databaseName
	 */
	public function setDatabaseName($databaseName) {
		$this->databaseName = $databaseName;
	}
	
	/**
	 *
	 * @param string $databaseUsername
	 */
	public function setDatabaseUsername($databaseUsername) {
		$this->databaseUsername = $databaseUsername;
	}
	
	/**
	 *
	 * @param string $databasePassword
	 */
	public function setDatabasePassword($databasePassword) {
		$this->databasePassword = $databasePassword;
	}
	
	/**
	 * Construct method, initialize necessary variables.
	 */
	public function __construct() {
		/*
		 * Get database configuration information
		 */
		$this->setDatabaseServer ( constant ( 'DATABASE_SERVER' ) );
		$this->setDatabasePort ( constant ( 'DATABASE_PORT' ) );
		$this->setDatabaseName ( constant ( 'DATABASE_NAME' ) );
		$this->setDatabaseUsername ( constant ( 'DATABASE_USERNAME' ) );
		$this->setDatabasePassword ( constant ( 'DATABASE_PASSWORD' ) );
		$this->setDatabaseCharset ( constant ( 'DATABASE_CHARSET' ) );
	}
	
	/**
	 * Get version number
	 */
	public function getVersionNumber() {
		return 'V0.1.20171009';
	}
	
	/**
	 * Initialize
	 *
	 * @return boolean
	 */
	public function initialize() {
		/*
		 * TurtleShell uses mysqli_real_connect() for replacing mysqli_connect();
		 */
		// $conn = mysqli_connect ( $this->databaseServer, $this->databaseUsername, $this->databasePassword, $this->databaseName, $this->databasePort );
		
		/*
		 * Set null first
		 */
		$this->setDatabaseConnection ( null );
		
		try {
			/*
			 * Call mysqli_init() method for initializing database connection before calling mysqli_real_connect().
			 */
			$this->setDatabaseConnection ( mysqli_init () );
			
			/*
			 * Check the result of initializaation
			 */
			if ($this->getDatabaseConnection () == null) {
				echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->getConnection(): Call mysqli_init() failed</font> ');
				
				/*
				 * if the database connection cannot be initialized successfully, call exit() method.
				 */
				exit ();
			}
			
			/*
			 * Call mysqli_real_connect() and keep the result flag for checking.
			 */
			$connectionResultFlag = mysqli_real_connect ( 
					/*
					 * Database connection
					 */
					$this->getDatabaseConnection (), 
					/*
					 * Database server
					 */
					$this->getDatabaseServer (),
					/*
					 * Database username
					 */
					$this->getDatabaseUsername (),
					/*
					 * Database password
					 */ 
					$this->getDatabasePassword (),
					/*
					 * Database name
					 */ 
					$this->getDatabaseName (),
					/*
					 * Database port
					 */
					$this->getDatabasePort (),
					/*
					 * Database socket
					 */ 
					$this->getDatabaseSocket (),
					/*
					 * Database flag
					 */
					$this->getDatabaseFlag () );
			
			/*
			 * Check the result flag of connection
			 */
			if (! $connectionResultFlag) {
				echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->getConnection(): Connect database error: ' . mysqli_connect_error () . '</font> ');
				mysqli_close ( $this->getDatabaseConnection () );
				$this->setDatabaseConnection ( null );
				
				/*
				 * If the result flag is failed, call exit() method.
				 */
				exit ();
			} else {
				/*
				 * Set charset of database connection
				 */
				mysqli_set_charset ( $this->getDatabaseConnection (), $this->getDatabaseCharset () );
				
				/*
				 * Return successful result
				 */
				return true;
			}
		} catch ( Exception $e ) {
			echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->getConnection(): Exception: ' . $e->getMessage () . '</font> ';
			$this->setDatabaseConnection ( null );
			return false;
		}
	}
	
	/**
	 * Begin database transaction, a new database connection will be generated everytime.
	 */
	public function beginTransaction() {
		$this->initialize ();
		$this->setDatabaseConnection ( $this->getDatabaseConnection () );
		mysqli_begin_transaction ( $this->getDatabaseConnection () );
	}
	
	/**
	 * End database transaction, the database connection will be commited, and it will be rollbacked if anyissue.
	 *
	 * @return boolean
	 */
	public function endTransaction() {
		if ($this->getDatabaseConnection () == null) {
			echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->getConnection(): Error: Database connection is NULL</font> ';
			return false;
		} elseif (mysqli_error ( $this->getDatabaseConnection () ) != '') {
			echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->getConnection(): Error: ' . mysqli_error ( $this->getDatabaseConnection () ) . '</font> ';
			return false;
		} else {
			try {
				mysqli_commit ( $this->getDatabaseConnection () );
				return true;
			} catch ( Exception $e ) {
				mysqli_rollback ( $this->getDatabaseConnection () );
				echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->getConnection(): Error: ' . $e->getMessage () . '</font> ';
				return false;
			} finally {
				mysqli_close ( $this->getDatabaseConnection () );
				$this->setDatabaseConnection ( null );
			}
		}
	}
	public function sqlInjectionDefense() {
		
		/*
		 * Initilize PDO connection
		 */
		$pdoConnection = new \PDO ( 'mysql:host=' . $this->databaseServer . ';dbname=' . $this->databaseName, $this->databaseUsername, $this->databasePassword );
		
		/*
		 * Config PDO connection
		 */
		$pdoConnection->setAttribute ( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
		$pdoConnection->setAttribute ( \PDO::ATTR_EMULATE_PREPARES, false );
		
		/*
		 * Intialize PDO statement
		 */
		$pdoStatement = $pdoConnection->prepare ( 'SELECT * FROM TS_USER_BASIC WHERE ID = :id' );
		$pdoStatement->bindParam ( ':id', 1, \PDO::PARAM_INT );
		
		/*
		 * Execute action with transaction
		 */
		$pdoConnection->beginTransaction ();
		$pdoStatement->execute ();
		$pdoConnection->commit ();
		
		/*
		 * Check results.
		 */
		while ( $pdoResult = $pdoStatement->fetch ( \PDO::FETCH_ASSOC ) ) {
			print ('Unique Identity: ') ;
			print ($pdoResult ['unique_identity']) ;
		}
		print ("</br>") ;
	}
}

?>