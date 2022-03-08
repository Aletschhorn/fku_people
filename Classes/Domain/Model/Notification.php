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
 * Notification
 */
class Notification extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * rule
	 *
	 * @var \FKU\FkuPeople\Domain\Model\Notificationrule
	 */
	protected $rule;

	/**
	 * days
	 *
	 * @var integer
	 */
	protected $days = 0;

	/**
	 * user
	 *
	 * @var \FKU\FkuPeople\Domain\Model\User
	 */
	protected $user;

	/**
	 * timing
	 *
	 * @var integer
	 */
	protected $timing = 0;

	/**
	 * Returns the rule
	 *
	 * @return \FKU\FkuPeople\Domain\Model\Notificationrule $rule
	 */
	public function getRule() {
		return $this->rule;
	}

	/**
	 * Sets the rule
	 *
	 * @param \FKU\FkuPeople\Domain\Model\Notificationrule $rule
	 * @return void
	 */
	public function setRule(\FKU\FkuPeople\Domain\Model\Notificationrule $rule) {
		$this->rule = $rule;
	}

	/**
	 * Returns the days
	 *
	 * @return \integer $days
	 */
	public function getDays() {
		return $this->days;
	}

	/**
	 * Sets the days
	 *
	 * @param \integer $days
	 * @return void
	 */
	public function setDays($days) {
		$this->days = $days;
	}

	/**
	 * Returns the user
	 *
	 * @return \FKU\FkuPeople\Domain\Model\User $user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Sets the user
	 *
	 * @param \FKU\FkuPeople\Domain\Model\User $user
	 * @return void
	 */
	public function setUser(\FKU\FkuPeople\Domain\Model\User $user) {
		$this->user = $user;
	}

	/**
	 * Returns the timing
	 *
	 * @return \integer $timing
	 */
	public function getTiming() {
		return $this->timing;
	}

	/**
	 * Sets the timing
	 *
	 * @param \integer $timing
	 * @return void
	 */
	public function setTiming($timing) {
		$this->timing = $timing;
	}

}