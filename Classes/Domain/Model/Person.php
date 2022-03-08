<?php
namespace FKU\FkuPeople\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Daniel Widmer <daniel.widmer@fku.ch>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * firstname
	 *
	 * @var string
	 */
	protected $firstname = '';

	/**
	 * lastname
	 *
	 * @var string
	 */
	protected $lastname = '';

	/**
	 * address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * housenumber
	 *
	 * @var string
	 */
	protected $housenumber = '';

	/**
	 * addressadd
	 *
	 * @var string
	 */
	protected $addressadd = '';

	/**
	 * zipcode
	 *
	 * @var string
	 */
	protected $zipcode = '';

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * phone
	 *
	 * @var string
	 */
	protected $phone = '';

	/**
	 * mobile
	 *
	 * @var string
	 */
	protected $mobile = '';

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * dateofbirth
	 *
	 * @var string
	 */
	protected $dateofbirth = '';

	/**
	 * geburtstag
	 *
	 * @var \DateTime
	 */
	protected $geburtstag = NULL;

	/**
	 * age
	 *
	 * @var integer
	 */
	protected $age = 0;

	/**
	 * memberstatus
	 *
	 * @var integer
	 */
	protected $memberstatus = 0;

	/**
	 * child
	 *
	 * @var integer
	 */
	protected $child = 0;

	/**
	 * duty
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FKU\FkuPeople\Domain\Model\Subteam>
	 */
	protected $duty = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->duty = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the firstname
	 *
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Sets the firstname
	 *
	 * @param string $firstname
	 * @return void
	 */
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
	}

	/**
	 * Returns the lastname
	 *
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Sets the lastname
	 *
	 * @param string $lastname
	 * @return void
	 */
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}

	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the housenumber
	 *
	 * @return string $housenumber
	 */
	public function getHousenumber() {
		return $this->housenumber;
	}

	/**
	 * Sets the housenumber
	 *
	 * @param string $housenumber
	 * @return void
	 */
	public function setHousenumber($housenumber) {
		$this->housenumber = $housenumber;
	}

	/**
	 * Returns the addressadd
	 *
	 * @return string $addressadd
	 */
	public function getAddressadd() {
		return $this->addressadd;
	}

	/**
	 * Sets the addressadd
	 *
	 * @param string $addressadd
	 * @return void
	 */
	public function setAddressadd($addressadd) {
		$this->addressadd = $addressadd;
	}

	/**
	 * Returns the zipcode
	 *
	 * @return string $zipcode
	 */
	public function getZipcode() {
		return $this->zipcode;
	}

	/**
	 * Sets the zipcode
	 *
	 * @param string $zipcode
	 * @return void
	 */
	public function setZipcode($zipcode) {
		$this->zipcode = $zipcode;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the phone
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Sets the phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Returns the mobile
	 *
	 * @return string $mobile
	 */
	public function getMobile() {
		return $this->mobile;
	}

	/**
	 * Sets the mobile
	 *
	 * @param string $mobile
	 * @return void
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the dateofbirth
	 *
	 * @return string $dateofbirth
	 */
	public function getDateofbirth() {
		return $this->dateofbirth;
	}

	/**
	 * Returns the geburtstag
	 *
	 * @return \DateTime $geburtstag
	 */
	public function getGeburtstag() {
		if ($this->dateofbirth) {
			return new \DateTime($this->dateofbirth);
		} else {
			return NULL;
		}
	}

	/**
	 * Returns the age
	 *
	 * @return int $age
	 */
	public function getAge() {
		return intval(date_diff(date_create($this->dateofbirth), date_create('today'))->y);
	}

	/**
	 * Sets the dateofbirth
	 *
	 * @param string $dateofbirth
	 * @return void
	 */
	public function setDateofbirth($dateofbirth) {
		$this->dateofbirth = $dateofbirth;
	}

	/**
	 * Returns the memberstatus
	 *
	 * @return integer $memberstatus
	 */
	public function getMemberstatus() {
		return $this->memberstatus;
	}

	/**
	 * Sets the memberstatus
	 *
	 * @param integer $memberstatus
	 * @return void
	 */
	public function setMemberstatus($memberstatus) {
		$this->memberstatus = $memberstatus;
	}

	/**
	 * Returns the child
	 *
	 * @return integer $child
	 */
	public function getChild() {
		if ($this->dateofbirth and $this->getAge() < 18) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Sets the child
	 *
	 * @param integer $child
	 * @return void
	 */
	public function setChild($child) {
		$this->child = $child;
	}

	/**
	 * Adds a Subteam
	 *
	 * @param \FKU\FkuPeople\Domain\Model\Subteam $duty
	 * @return void
	 */
	public function addDuty(\FKU\FkuPeople\Domain\Model\Subteam $duty) {
		$this->duty->attach($duty);
	}

	/**
	 * Removes a Subteam
	 *
	 * @param \FKU\FkuPeople\Domain\Model\Subteam $dutyToRemove The Subteam to be removed
	 * @return void
	 */
	public function removeDuty(\FKU\FkuPeople\Domain\Model\Subteam $dutyToRemove) {
		$this->duty->detach($dutyToRemove);
	}

	/**
	 * Returns the duty
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FKU\FkuPeople\Domain\Model\Subteam> $duty
	 */
	public function getDuty() {
		return $this->duty;
	}

	/**
	 * Sets the duty
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FKU\FkuPeople\Domain\Model\Subteam> $duty
	 * @return void
	 */
	public function setDuty(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $duty) {
		$this->duty = $duty;
	}

}