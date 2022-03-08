<?php
namespace FKU\FkuPeople\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
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
 * User
 */
class User extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser { 

	/**
	 * txFkupeopleFkudbid
	 *
	 * @var integer
	 */
	protected $txFkupeopleFkudbid = 0;

	/**
	 * txFkupeopleFkudbsync
	 *
	 * @var \DateTime
	 */
	protected $txFkupeopleFkudbsync = '0000-00-00 00:00:00';

	/**
	 * txFkupeoplePlanningcal
	 *
	 * @var string
	 */
	protected $txFkupeoplePlanningcal = '';

	/**
	 * txFkupeoplePlanningAlarm
	 *
	 * @var integer
	 */
	protected $txFkupeoplePlanningAlarm = 0;

	/**
	 * txFkupeopleNotificationHour
	 *
	 * @var integer
	 */
	protected $txFkupeopleNotificationHour = 0;

	/**
	 * txFkupeopleNotificationWeekday
	 *
	 * @var integer
	 */
	protected $txFkupeopleNotificationWeekday = 0;

	/**
	 * txFkupeopleNotificationWeekdayhour
	 *
	 * @var integer
	 */
	protected $txFkupeopleNotificationWeekdayhour = 0;

	/**
	 * txFkupeopleNotificationCacheday
	 *
	 * @var string
	 */
	protected $txFkupeopleNotificationCacheday = '';

	/**
	 * txFkupeopleNotificationCacheweek
	 *
	 * @var string
	 */
	protected $txFkupeopleNotificationCacheweek = '';

	/**
	 * Returns the txFkupeopleFkudbid
	 *
	 * @return integer $txFkupeopleFkudbid
	 */
	public function getTxFkupeopleFkudbid() {
		return $this->txFkupeopleFkudbid;
	}

	/**
	 * Sets the txFkupeopleFkudbid
	 *
	 * @param integer $txFkupeopleFkudbid
	 * @return void
	 */
	public function setTxFkupeopleFkudbid($txFkupeopleFkudbid) {
		$this->txFkupeopleFkudbid = $txFkupeopleFkudbid;
	}

	/**
	 * Returns the txFkupeopleFkudbsync
	 *
	 * @return \DateTime $txFkupeopleFkudbsync
	 */
	public function getTxFkupeopleFkudbsync() {
		return $this->txFkupeopleFkudbsync;
	}

	/**
	 * Sets the txFkupeopleFkudbsync
	 *
	 * @param \DateTime $txFkupeopleFkudbsync
	 * @return void
	 */
	public function setTxFkupeopleFkudbsync($txFkupeopleFkudbsync) {
		$this->txFkupeopleFkudbsync = $txFkupeopleFkudbsync;
	}

	/**
	 * Returns the txFkupeoplePlanningcal
	 *
	 * @return string $txFkupeoplePlanningcal
	 */
	public function getTxFkupeoplePlanningcal() {
		return $this->txFkupeoplePlanningcal;
	}

	/**
	 * Sets the txFkupeoplePlanningcal
	 *
	 * @param string $txFkupeoplePlanningcal
	 * @return void
	 */
	public function setTxFkupeoplePlanningcal($txFkupeoplePlanningcal) {
		$this->txFkupeoplePlanningcal = $txFkupeoplePlanningcal;
	}

	/**
	 * Returns the txFkupeoplePlanningAlarm
	 *
	 * @return string $txFkupeoplePlanningAlarm
	 */
	public function getTxFkupeoplePlanningAlarm() {
		return $this->txFkupeoplePlanningAlarm;
	}

	/**
	 * Sets the txFkupeoplePlanningAlarm
	 *
	 * @param string $txFkupeoplePlanningAlarm
	 * @return void
	 */
	public function setTxFkupeoplePlanningAlarm($txFkupeoplePlanningAlarm) {
		$this->txFkupeoplePlanningAlarm = $txFkupeoplePlanningAlarm;
	}

	/**
	 * Returns the txFkupeopleNotificationHour
	 *
	 * @return integer $txFkupeopleNotificationHour
	 */
	public function getTxFkupeopleNotificationHour() {
		return $this->txFkupeopleNotificationHour;
	}

	/**
	 * Sets the txFkupeopleNotificationHour
	 *
	 * @param integer $txFkupeopleNotificationHour
	 * @return void
	 */
	public function setTxFkupeopleNotificationHour($txFkupeopleNotificationHour) {
		$this->txFkupeopleNotificationHour = $txFkupeopleNotificationHour;
	}

	/**
	 * Returns the txFkupeopleNotificationWeekday
	 *
	 * @return integer $txFkupeopleNotificationWeekday
	 */
	public function getTxFkupeopleNotificationWeekday() {
		return $this->txFkupeopleNotificationWeekday;
	}

	/**
	 * Sets the txFkupeopleNotificationWeekday
	 *
	 * @param integer $txFkupeopleNotificationWeekday
	 * @return void
	 */
	public function setTxFkupeopleNotificationWeekday($txFkupeopleNotificationWeekday) {
		$this->txFkupeopleNotificationWeekday = $txFkupeopleNotificationWeekday;
	}

	/**
	 * Returns the txFkupeopleNotificationWeekdayhour
	 *
	 * @return integer $txFkupeopleNotificationWeekdayhour
	 */
	public function getTxFkupeopleNotificationWeekdayhour() {
		return $this->txFkupeopleNotificationWeekdayhour;
	}

	/**
	 * Sets the txFkupeopleNotificationWeekdayhour
	 *
	 * @param integer $txFkupeopleNotificationWeekdayhour
	 * @return void
	 */
	public function setTxFkupeopleNotificationWeekdayhour($txFkupeopleNotificationWeekdayhour) {
		$this->txFkupeopleNotificationWeekdayhour = $txFkupeopleNotificationWeekdayhour;
	}

	/**
	 * Returns the txFkupeopleNotificationCacheday
	 *
	 * @return string $txFkupeopleNotificationCacheday
	 */
	public function getTxFkupeopleNotificationCacheday() {
		return $this->txFkupeopleNotificationCacheday;
	}

	/**
	 * Sets the txFkupeopleNotificationCacheday
	 *
	 * @param string $txFkupeopleNotificationCacheday
	 * @return void
	 */
	public function setTxFkupeopleNotificationCacheday($txFkupeopleNotificationCacheday) {
		$this->txFkupeopleNotificationCacheday = $txFkupeopleNotificationCacheday;
	}

	/**
	 * Returns the txFkupeopleNotificationCacheweek
	 *
	 * @return string $txFkupeopleNotificationCacheweek
	 */
	public function getTxFkupeopleNotificationCacheweek() {
		return $this->txFkupeopleNotificationCacheweek;
	}

	/**
	 * Sets the txFkupeopleNotificationCacheweek
	 *
	 * @param string $txFkupeopleNotificationCacheweek
	 * @return void
	 */
	public function setTxFkupeopleNotificationCacheweek($txFkupeopleNotificationCacheweek) {
		$this->txFkupeopleNotificationCacheweek = $txFkupeopleNotificationCacheweek;
	}

}