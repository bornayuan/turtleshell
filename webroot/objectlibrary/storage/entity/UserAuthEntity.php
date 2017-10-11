<?php

namespace objectlibrary\storage\entity;

require constant ( 'ABSPATH' ) . '/objectlibrary/storage/entity/GenericEntity.php';

/**
 *
 * @author borna
 *        
 */
class UserAuthEntity extends GenericEntity {
	
	/**
	 * Primary key of UserBasicEntity
	 *
	 * @var int, lenght is 11
	 */
	private $userBasicId = - 1;
	
	/**
	 * Username for signing in
	 *
	 * @var string, length is 60
	 */
	private $username = null;
	
	/**
	 * Password for signing in
	 *
	 * @var string, length is 60
	 */
	private $password = null;
	
	/**
	 * Created Timestamp
	 *
	 * @var object, date
	 */
	private $createdTimestamp = null;
	
	/**
	 * Updated Timestamp
	 *
	 * @var object, date
	 */
	private $updatedTimestamp = null;
	
	/**
	 *
	 * @return object,
	 */
	public function getCreatedTimestamp() {
		return $this->createdTimestamp;
	}
	
	/**
	 *
	 * @return object,
	 */
	public function getUpdatedTimestamp() {
		return $this->updatedTimestamp;
	}
	
	/**
	 *
	 * @param object, $createdTimestamp
	 */
	public function setCreatedTimestamp($createdTimestamp) {
		$this->createdTimestamp = $createdTimestamp;
	}
	
	/**
	 *
	 * @param object, $updatedTimestamp
	 */
	public function setUpdatedTimestamp($updatedTimestamp) {
		$this->updatedTimestamp = $updatedTimestamp;
	}
	
	/**
	 *
	 * @return number
	 */
	public function getUserBasicId() {
		return $this->userBasicId;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 *
	 * @param number $userBasicId
	 */
	public function setUserBasicId($userBasicId) {
		$this->userBasicId = $userBasicId;
	}
	
	/**
	 *
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}
	
	/**
	 *
	 * @param string $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
	
	/**
	 */
	public function __construct() {
		parent::__construct ();
	}
}

?>