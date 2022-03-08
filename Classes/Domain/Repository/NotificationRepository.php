<?php
namespace FKU\FkuPeople\Domain\Repository;

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
 * The repository for Notifications
 */
class NotificationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	* findAllOfUser Returns all notification rules of a sepcific user
	*
	* @param \FKU\FkuPeople\Domain\Model\User $user
	* @return
	*/

	public function findAllOfUser(\FKU\FkuPeople\Domain\Model\User $user) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching($query->equals('user',$user));
		$query->setOrderings(array('timing'=>\TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		return $query->execute();
	}

	/**
	* findSomeOfUser Returns given notification rules of a specific user
	*
	* @param \FKU\FkuPeople\Domain\Model\User $user
	* @param array $ruleIds
	* @param string $extension Name of extension
	* @return
	*/

	public function findSomeOfUser(\FKU\FkuPeople\Domain\Model\User $user, $ruleIds, $extension) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		foreach ($ruleIds as $ruleId) {
			$matching[] = $query->equals('rule.nid',$ruleId);
		}
		$query->matching(
			$query->logicalAnd(
				array(
					$query->equals('user',$user),
					$query->logicalAnd(
						$query->equals('rule.extension',$extension),
						$query->logicalOr($matching)
					)
				)
			)
		);
		return $query->execute();
	}

	/**
	* findAllPerRule Returns given notification of a specific notification rule
	*
	* @param array $ruleIds
	* @param string $extension Name of extension
	* @return
	*/

	public function findAllPerRule($ruleIds, $extension) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		foreach ($ruleIds as $ruleId) {
			$matching[] = $query->equals('rule.nid',$ruleId);
		}
		$query->matching(
			$query->logicalAnd(
				$query->equals('rule.extension',$extension),
				$query->logicalOr($matching)
			)
		);
		return $query->execute();
	}

	/**
	* findAllOfExtension Returns all set notifications of a specific extension
	*
	* @param string $extension Name of extension
	* @return
	*/

	public function findAllOfExtension($extension) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching($query->equals('rule.extension',$extension));
		return $query->execute();
	}

}