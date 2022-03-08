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
 * Notificationrule
 */
class Notificationrule extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * extension
	 *
	 * @var string
	 */
	protected $extension = '';

	/**
	 * nid
	 *
	 * @var int
	 */
	protected $nid = 0;

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * message
	 *
	 * @var string
	 */
	protected $message = '';

	/**
	 * timingNow
	 *
	 * @var boolean
	 */
	protected $timingNow = FALSE;

	/**
	 * timingDay
	 *
	 * @var boolean
	 */
	protected $timingDay = FALSE;

	/**
	 * timingWeek
	 *
	 * @var boolean
	 */
	protected $timingWeek = FALSE;

	/**
	 * usergroup
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup>
	 */
	protected $usergroup = NULL;

	/**
	 * category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
	 */
	protected $category = NULL;

	/**
	 * Returns the extension
	 *
	 * @return string $extension
	 */
	public function getExtension() {
		return $this->extension;
	}

	/**
	 * Sets the extension
	 *
	 * @param string $rule
	 * @return void
	 */
	public function setExtension($extension) {
		$this->extension = $extension;
	}

	/**
	 * Returns the nid
	 *
	 * @return int $nid
	 */
	public function getNid() {
		return $this->nid;
	}

	/**
	 * Sets the nid
	 *
	 * @param int $nid
	 * @return void
	 */
	public function setNid($nid) {
		$this->nid = $nid;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $rule
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the message
	 *
	 * @return string $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Sets the message
	 *
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Returns the timingNow
	 *
	 * @return boolean $timingNow
	 */
	public function getTimingNow() {
		return $this->timingNow;
	}

	/**
	 * Sets the timingNow
	 *
	 * @param string $timingNow
	 * @return void
	 */
	public function setTimingNow($timingNow) {
		$this->timingNow = $timingNow;
	}

	/**
	 * Returns the boolean state of timingNow
	 *
	 * @return boolean
	 */
	public function isTimingNow() {
		return $this->timingNow;
	}

	/**
	 * Returns the timingDay
	 *
	 * @return boolean $timingDay
	 */
	public function getTimingDay() {
		return $this->timingDay;
	}

	/**
	 * Sets the timingDay
	 *
	 * @param string $timingDay
	 * @return void
	 */
	public function setTimingDay($timingDay) {
		$this->timingDay = $timingDay;
	}

	/**
	 * Returns the boolean state of timingDay
	 *
	 * @return boolean
	 */
	public function isTimingDay() {
		return $this->timingDay;
	}

	/**
	 * Returns the timingWeek
	 *
	 * @return boolean $timingWeek
	 */
	public function getTimingWeek() {
		return $this->timingWeek;
	}

	/**
	 * Sets the timingWeek
	 *
	 * @param string $timingWeek
	 * @return void
	 */
	public function setTimingWeek($timingWeek) {
		$this->timingWeek = $timingWeek;
	}

	/**
	 * Returns the boolean state of timingWeek
	 *
	 * @return boolean
	 */
	public function isTimingWeek() {
		return $this->timingWeek;
	}

	/**
	 * Adds a usergroup
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroupToAdd
	 * @return void
	 */
	public function addUsergroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroupToAdd) {
		$this->usergroup->attach($usergroupToAdd);
	}
	
	/**
	 * Removes a usergroup
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroupToRemove The usergroup to be removed
	 * @return void
	 */
	public function removeUsergroup(\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroupToRemove) {
		$this->usergroup->detach($usergroupToRemove);
	}
	
	/**
	 * Returns the usergroups
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup> $usergroup
	 */
	public function getUsergroup() {
		return $this->usergroup;
	}
	
	/**
	 * Sets the usergroups
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup> $usergroup
	 * @return void
	 */
	public function setUsergroup(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $usergroup) {
		$this->usergroup = $usergroup;
	}

	/**
	 * Adds a category
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToAdd
	 * @return void
	 */
	public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToAdd) {
		$this->category->attach($categoryToAdd);
	}
	
	/**
	 * Removes a category
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The usergroup to be removed
	 * @return void
	 */
	public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}
	
	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

}