<?php

namespace com\bornayuan\turtleshell\storage\database;

use com\bornayuan\turtleshell\ConfigurationManager;
use Exception;

/**
 *
 * @author borna
 *        
 */
class DatabaseConnector {
	
	/**
	 * Database server
	 *
	 * @var string
	 */
	private $databaseServer = null;
	
	/**
	 * Database port
	 *
	 * @var int, MySQL default port is 3306.
	 */
	private $databasePort = 3306;
	
	/**
	 * Database name
	 *
	 * @var string
	 */
	private $databaseName = null;
	
	/**
	 * Database username
	 *
	 * @var string
	 */
	private $databaseUsername = null;
	
	/**
	 * Database password
	 *
	 * @var string
	 */
	private $databasePassword = null;
	
	/**
	 * Database charset
	 *
	 * @var string
	 */
	private $databaseCharset = null;
	
	/**
	 * Database socket
	 *
	 * @var string
	 */
	private $databaseSocket = null;
	
	/**
	 * Database connection client falg
	 * MYSQLI_CLIENT_COMPRESS
	 * MYSQLI_CLIENT_FOUND_ROWS
	 * MYSQLI_CLIENT_IGNORE_SPACE
	 * MYSQLI_CLIENT_INTERACTIVE
	 * MYSQLI_CLIENT_LOCAL_FILES
	 * MYSQLI_CLIENT_MULTI_STATEMENTS
	 * MYSQLI_CLIENT_MULTI_RESULTS
	 * MYSQLI_CLIENT_NO_SCHEMA
	 * MYSQLI_CLIENT_ODBC
	 * MYSQLI_CLIENT_SSL
	 *
	 * @var int, MySQL connection client flag default value is 0.
	 */
	private $databaseFlag = 0;
	
	/**
	 * Database connection
	 *
	 * @var resource
	 */
	private $databaseConnection = null;
	
	/**
	 * This flag will be checked in method beginTransaction().
	 *
	 * @var bool, true value is for managing the transaction in this class, false value means the transaction has been managed by caller, and anyway the connection will be generated if the current connection is null.
	 */
	private $independentTransactionFlag = true;
	
	/**
	 * Constructor, initialize necessary variables.
	 *
	 * @param bool $independentTransactionFlag[optional]
	 * @param resource $databaseConnection[optional]
	 */
	public function __construct() {
		/*
		 * Initialize database configuration with default values.
		 */
		$this->setDatabaseServer ( ConfigurationManager::$DATABASE_SERVER );
		$this->setDatabasePort ( ConfigurationManager::$DATABASE_PORT );
		$this->setDatabaseName ( ConfigurationManager::$DATABASE_NAME );
		$this->setDatabaseUsername ( ConfigurationManager::$DATABASE_USERNAME );
		$this->setDatabasePassword ( ConfigurationManager::$DATABASE_PASSWORD );
		$this->setDatabaseCharset ( ConfigurationManager::$DATABASE_CHARSET );
		
		/*
		 * Check the argument(s)
		 */
		$argumentCountNumber = func_num_args ();
		if ($argumentCountNumber == 0) {
			// do nothing...
		} elseif ($argumentCountNumber == 1) {
			$this->setIndependentTransactionFlag ( func_get_arg ( 0 ) );
			if (! $this->getIndependentTransactionFlag ()) {
				echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->__construct(): Error: Database connection parameter is necessary, if transaction is not independent.</font> ');
				exit ();
			}
		} elseif ($argumentCountNumber == 2) {
			$this->setIndependentTransactionFlag ( func_get_arg ( 0 ) );
			if ($this->getIndependentTransactionFlag ()) {
				echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->__construct(): Error: Database connection parameter is not necessary, if transaction is independent.</font> ');
				exit ();
			}
			$this->setDatabaseConnection ( func_get_arg ( 1 ) );
		} else {
			echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->__construct(): Error: Incorrect argument(s).</font> ');
			exit ();
		}
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
	 * @return int
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
	 * @return string
	 */
	public function getDatabaseCharset() {
		return $this->databaseCharset;
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
	 * @return int
	 */
	public function getDatabaseFlag() {
		return $this->databaseFlag;
	}
	
	/**
	 *
	 * @return resource
	 */
	public function getDatabaseConnection() {
		return $this->databaseConnection;
	}
	
	/**
	 *
	 * @return bool
	 */
	public function getIndependentTransactionFlag() {
		return $this->independentTransactionFlag;
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
	 * @param int $databasePort
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
	 *
	 * @param string $databaseCharset
	 */
	public function setDatabaseCharset($databaseCharset) {
		$this->databaseCharset = $databaseCharset;
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
	 * @param int $databaseFlag
	 */
	public function setDatabaseFlag($databaseFlag) {
		$this->databaseFlag = $databaseFlag;
	}
	
	/**
	 *
	 * @param resource $databaseConnection
	 */
	public function setDatabaseConnection($databaseConnection) {
		$this->databaseConnection = $databaseConnection;
	}
	
	/**
	 *
	 * @param bool $independentTransactionFlag
	 */
	public function setIndependentTransactionFlag($independentTransactionFlag) {
		$this->independentTransactionFlag = $independentTransactionFlag;
	}
	
	/**
	 * Generate database connection
	 *
	 * @return bool, true is for generating database connection successfully, and false is for faild.
	 */
	private function connect() {
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
				echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->connect(): Call mysqli_init() failed</font> ');
				
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
				echo (' <font color="#FF0000">TurtleShell, DatabaseConnector->connect(): Connect database error: ' . mysqli_connect_error () . '</font> ');
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
			echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->connect(): Exception: ' . $e->getMessage () . '</font> ';
			$this->setDatabaseConnection ( null );
			return false;
		}
	}
	
	/**
	 * Begin transaction, and it will check $independentTransactionFlag.
	 */
	public function beginTransaction() {
		/*
		 * Check $independentTransactionFlag
		 */
		if ($this->getIndependentTransactionFlag ()) {
			/*
			 * $independentTransactionFlag = true
			 *
			 * Connect database and generate a new connection.
			 */
			if (! $this->connect ()) {
				echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->beginTransaction(): Error: connect database failed</font> ';
				exit ();
			}
			
			/*
			 * Begin transaction
			 */
			mysqli_begin_transaction ( $this->getDatabaseConnection () );
		} else {
			/*
			 * $independentTransactionFlag = false
			 *
			 * The database connection must be ready
			 */
			if ($this->getDatabaseConnection () == null) {
				echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->beginTransaction(): Error: Database connection should not be null, if transaction is independent.</font> ';
				exit ();
			}
		}
	}
	
	/**
	 * End database transaction, the database connection will be commited, and it will be rollbacked if anyissue.
	 *
	 * @return boolean
	 */
	public function endTransaction() {
		/*
		 * $independentTransactionFlag = true, commit
		 * $independentTransactionFlag = false, do nothing
		 */
		if ($this->getIndependentTransactionFlag ()) {
			/*
			 * try to commit
			 */
			if ($this->getDatabaseConnection () == null) {
				echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->endTransaction(): Error: Database connection is null.</font> ';
				$this->setDatabaseConnection ( null );
				return false;
			} elseif (mysqli_error ( $this->getDatabaseConnection () ) != '') {
				echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->endTransaction(): Error: ' . mysqli_error ( $this->getDatabaseConnection () ) . '</font> ';
				$this->setDatabaseConnection ( null );
				return false;
			} else {
				try {
					mysqli_commit ( $this->getDatabaseConnection () );
					return true;
				} catch ( Exception $e ) {
					mysqli_rollback ( $this->getDatabaseConnection () );
					echo ' <font color="#FF0000">TurtleShell, DatabaseConnector->endTransaction(): Error: ' . $e->getMessage () . '</font> ';
					return false;
				} finally {
					mysqli_close ( $this->getDatabaseConnection () );
					$this->setDatabaseConnection ( null );
				}
			}
		} else {
			/*
			 * do nothing
			 */
		}
	}
	
	/**
	 * Test purpose
	 */
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