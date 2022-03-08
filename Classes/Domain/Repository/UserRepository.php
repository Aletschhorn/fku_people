<?php
namespace FKU\FkuPeople\Domain\Repository;

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
 * The repository for Users
 */
class UserRepository extends \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository {

	/**
	* findByPersonUid
	*
	* @param integer $uid
	* @return
	*/
	public function findByPersonUid ($uid) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		return $query->matching($query->equals('txFkupeopleFkudbid', $uid))->execute()->getFirst();
	}

	/**
	* findPlanningcal
	*
	* @return
	*/
	public function findPlanningcal () {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		return $query->matching($query->logicalNot($query->equals('txFkupeoplePlanningcal','')))->execute();
	}

	/**
	* findDailyNotification
	*
	* @param integer $hour
	* @return
	*/
	public function findDailyNotification ($hour) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching(
			$query->logicalAnd(
				$query->equals('txFkupeopleNotificationHour',$hour),
				$query->logicalNot($query->equals('txFkupeopleNotificationCacheday',''))
			)
		);
		return $query->execute();
	}

	/**
	* findWeeklyNotification
	*
	* @param integer $weekday
	* @param integer $hour
	* @return
	*/
	public function findWeeklyNotification ($weekday, $hour) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching(
			$query->logicalAnd(
				$query->equals('txFkupeopleNotificationWeekday',$weekday),
				$query->equals('txFkupeopleNotificationWeekdayhour',$hour),
				$query->logicalNot($query->equals('txFkupeopleNotificationCacheweek',''))
			)
		);
		return $query->execute();
	}

	/**
	* findSyncable
	*
	* @return
	*/
	public function findSyncable () {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		return $query->matching($query->greaterThan('txFkupeopleFkudbid',0))->execute();
	}

}