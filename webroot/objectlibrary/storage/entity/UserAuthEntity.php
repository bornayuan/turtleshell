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
	 * USER_BASIC_ID, it is primary key of UserBasicEntity and the length is 11.
	 *
	 * @var int
	 */
	private $userBasicId = - 1;
	
	/**
	 * USERNAME, length is 60.
	 *
	 * @var string
	 */
	private $username = null;
	
	/**
	 * PASSWORD, length is 60.
	 *
	 * @var string
	 */
	private $password = null;
	
	/**
	 * CREATED_TIMESTAMP, it is only for displaying with format 1900-01-01 11:01:01.
	 *
	 * @var string
	 */
	private $createdTimestamp = null;
	
	/**
	 * UPDATED_TIMESTAMP, it is only for displaying with format 1900-01-01 11:01:01.
	 *
	 * @var string
	 */
	private $updatedTimestamp = null;
	
	/**
	 */
	public function __construct() {
		parent::__construct ();
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
	 * @return string
	 */
	public function getCreatedTimestamp() {
		return $this->createdTimestamp;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getUpdatedTimestamp() {
		return $this->updatedTimestamp;
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
	 *
	 * @param string $createdTimestamp
	 */
	public function setCreatedTimestamp($createdTimestamp) {
		$this->createdTimestamp = $createdTimestamp;
	}
	
	/**
	 *
	 * @param string $updatedTimestamp
	 */
	public function setUpdatedTimestamp($updatedTimestamp) {
		$this->updatedTimestamp = $updatedTimestamp;
	}
}

?>