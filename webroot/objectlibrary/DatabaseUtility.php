<?php

namespace objectlibrary;

/**
 *
 * @author borna
 *        
 */
class DatabaseUtility {
	private $databaseServer = 'localhost';
	private $databasePort = '3306';
	private $databaseName = 'turtleshell';
	private $databaseUsername = 'root';
	private $databasePassword = '';
	
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
	 */
	public function __construct() {
	}
	
	public function getVersionNumber() {
		print ('Version Number: V0.1.20171001') ;
		print ("</br>") ;
	}
	
	
	public function getConnection() {
		print ('DatabaseUtility->getConnection()') ;
		print ('</br>') ;
		
		print ('Start generating database connection...') ;
		print ('</br>') ;
		$conn = mysqli_connect ( $this->databaseServer, $this->databaseUsername, $this->databasePassword, $this->databaseName, $this->databasePort );
		
		if (mysqli_error ( $conn )) {
			print (mysqli_error ( $conn )) ;
			print ('</br>') ;
			exit ();
		} else {
			print ('Generated database connection successfully') ;
			print ('</br>') ;
			mysqli_set_charset ( $conn, 'uft8' );
			print ('Set charset of database successfully') ;
			print ('</br>') ;
			
			return $conn;
		}
	}
	
	public function getUserBasicById($id) {
		print ('DatabaseUtility->getUserBasicById()') ;
		print ('</br>') ;
		
		$sql = 'SELECT * FROM TS_USER_BASIC WHERE ID=' . $id;
		print ('SQL: ' . $sql) ;
		print ('</br>') ;
		
		$conn = $this->getConnection ();
		print ('Got database connection') ;
		print ('</br>') ;
		
		print ('Start querying database...') ;
		$result = mysqli_query ( $conn, $sql );
		
		if ($result) {
			print ('Queried database successfully') ;
			print ('</br>') ;
			
			if (mysqli_num_rows ( $result ) > 0) {
				print ('<table width="800" border="1">') ;
				while ( $row = mysqli_fetch_assoc ( $result ) ) {
					print ('<tr>') ;
					print ('<td>' . $row ['first_name'] . ' ' . $row ['middle_name'] . ' ' . $row ['last_name'] . '</td>') ;
					print ('<td>' . $row ['email'] . '</td>') ;
					print ('<td>' . $row ['unique_identity'] . '</td>') ;
					print ('<td>' . $row ['created_timestamp'] . '</td>') ;
					print ('</tr>') ;
				}
				print ('</table>') ;
			} else {
				print ('Do not find any data from database</br>') ;
				print ('</br>') ;
			}
		} else {
			print ("Query database failed</br>") ;
			print ('</br>') ;
		}
	}
	
	
	public function sqlInjectionDefense($id) {
		
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
		$pdoStatement->bindParam ( ':id', $id, \PDO::PARAM_INT );
		
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

