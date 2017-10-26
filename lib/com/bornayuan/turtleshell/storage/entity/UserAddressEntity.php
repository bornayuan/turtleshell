<?php

namespace com\bornayuan\turtleshell\storage\entity;

/**
 *
 * @author borna
 *        
 */
class UserAddressEntity {
	private $id;
	private $label;
	private $country;
	private $state;
	private $city;
	private $street;
	private $zip;
	private $createdTimestamp;
	private $updatedTimestamp;
	
	/**
	 */
	public function __construct() {
	}
	/**
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getLabel() {
		return $this->label;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getCountry() {
		return $this->country;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getState() {
		return $this->state;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getCity() {
		return $this->city;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getStreet() {
		return $this->street;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getZip() {
		return $this->zip;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getCreatedTimestamp() {
		return $this->createdTimestamp;
	}
	
	/**
	 *
	 * @return mixed
	 */
	public function getUpdatedTimestamp() {
		return $this->updatedTimestamp;
	}
	
	/**
	 *
	 * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 *
	 * @param mixed $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}
	
	/**
	 *
	 * @param mixed $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}
	
	/**
	 *
	 * @param mixed $state
	 */
	public function setState($state) {
		$this->state = $state;
	}
	
	/**
	 *
	 * @param mixed $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}
	
	/**
	 *
	 * @param mixed $street
	 */
	public function setStreet($street) {
		$this->street = $street;
	}
	
	/**
	 *
	 * @param mixed $zip
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}
	
	/**
	 *
	 * @param mixed $createdTimestamp
	 */
	public function setCreatedTimestamp($createdTimestamp) {
		$this->createdTimestamp = $createdTimestamp;
	}
	
	/**
	 *
	 * @param mixed $updatedTimestamp
	 */
	public function setUpdatedTimestamp($updatedTimestamp) {
		$this->updatedTimestamp = $updatedTimestamp;
	}
}

