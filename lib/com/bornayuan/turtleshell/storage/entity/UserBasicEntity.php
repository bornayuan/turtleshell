<?php

namespace com\bornayuan\turtleshell\storage\entity;

/**
 *
 * @author borna
 *        
 */
class UserBasicEntity extends GenericEntity {
	
	/**
	 * FIRST_NAME, length is 60.
	 *
	 * @var string
	 */
	public $firstName = null;
	
	/**
	 * MIDDLE_NAME, length is 60.
	 *
	 * @var string
	 */
	public $middleName = null;
	
	/**
	 * LAST_NAME, length is 60.
	 *
	 * @var string
	 */
	public $lastName = null;
	
	/**
	 * NICK_NAME, length is 60.
	 *
	 * @var string
	 */
	public $nickName = null;
	
	/**
	 * EMAIL, length is 60.
	 *
	 * @var string
	 */
	public $email = null;
	
	/**
	 * UNIQUE_IDENTITY, length is 60.
	 *
	 * @var string
	 */
	public $uniqueIdentity = null;
	
	/**
	 * CREATED_TIMESTAMP, it is only for displaying with format 1900-01-01 11:01:01.
	 *
	 * @var string
	 */
	public $createdTimestamp = null;
	
	/**
	 * UPDATED_TIMESTAMP, it is only for displaying with format 1900-01-01 11:01:01.
	 *
	 * @var string
	 */
	public $updatedTimestamp = null;
	
	/**
	 * Constructor
	 */
	public function __construct() {
	}
	
	/**
	 *
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getMiddleName() {
		return $this->middleName;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getNickName() {
		return $this->nickName;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getUniqueIdentity() {
		return $this->uniqueIdentity;
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
	 * @param string $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	
	/**
	 *
	 * @param string $middleName
	 */
	public function setMiddleName($middleName) {
		$this->middleName = $middleName;
	}
	
	/**
	 *
	 * @param string $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	
	/**
	 *
	 * @param string $nickName
	 */
	public function setNickName($nickName) {
		$this->nickName = $nickName;
	}
	
	/**
	 *
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	
	/**
	 *
	 * @param string $uniqueIdentity
	 */
	public function setUniqueIdentity($uniqueIdentity) {
		$this->uniqueIdentity = $uniqueIdentity;
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