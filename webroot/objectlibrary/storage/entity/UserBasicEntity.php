<?php

namespace objectlibrary\storage\entity;

require constant ( 'ABSPATH' ) . '/objectlibrary/storage/entity/GenericEntity.php';

/**
 *
 * @author borna
 *        
 */
class UserBasicEntity extends GenericEntity {
	private $firstName;
	private $middleName;
	private $lastName;
	private $nickName;
	private $email;
	private $uniqueIdentity;
	
	/**
	 */
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getMiddleName() {
		return $this->middleName;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getNickName() {
		return $this->nickName;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getUniqueIdentity() {
		return $this->uniqueIdentity;
	}
	
	/**
	 *
	 * @param mixed $firstName
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	
	/**
	 *
	 * @param mixed $middleName
	 */
	public function setMiddleName($middleName) {
		$this->middleName = $middleName;
	}
	
	/**
	 *
	 * @param mixed $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	
	/**
	 *
	 * @param mixed $nickName
	 */
	public function setNickName($nickName) {
		$this->nickName = $nickName;
	}
	
	/**
	 *
	 * @param mixed $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	
	/**
	 *
	 * @param mixed $uniqueIdentity
	 */
	public function setUniqueIdentity($uniqueIdentity) {
		$this->uniqueIdentity = $uniqueIdentity;
	}
}

?>