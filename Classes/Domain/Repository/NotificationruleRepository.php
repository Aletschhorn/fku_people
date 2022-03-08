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
 * The repository for Notificationrules
 */
class NotificationruleRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function findAll() {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->execute();
	}

	/**
	* findFilteredByUsergroup
	*
	* @param \array $userGroups
	* @return
	*/

	public function findFilteredByUsergroup($userGroups) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching($query->in('usergroup',$userGroups));
		return $query->execute();
	}

	/**
	* findSingle
	*
	* @param string $extension
	* @param integer $nid
	* @return
	*/

	public function findSingle($extension, $nid) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching($query->logicalAnd(
			$query->equals('extension',$extension),
			$query->equals('nid',$nid)
		));
		return $query->execute();
	}


	/**
	* findMultiple
	*
	* @param string $extension
	* @param array $nids
	* @return
	*/

	public function findMultiple($extension, $nids) {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching($query->logicalAnd(
			$query->equals('extension',$extension),
			$query->in('nid',$nids)
		));
		return $query->execute();
	}



}