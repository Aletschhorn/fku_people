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
 * The repository for Persons
 */
class PersonRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	* defaultOrderings
	*
	* @var array
	*/
	protected $defaultOrderings = array('name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);

	/**
	* findAllWithName
	*
	* @return
	*/

	public function findAllWithName() {
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$result = $query->matching($query->logicalNot($query->equals('name','')));
		return $result->execute();
	}


	/**
	* findByFullName
	*
	* @param \string $name
	* @return
	*/

	public function findByFullName($name) {
		if (trim($name) == '') { return false; }
		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$result = $query->matching($query->equals('name',$name));
		return $result->execute()->getFirst();
	}


	/**
	* findBySubteam
	*
	* @param \array $teams
	* @return
	*/

	public function findBySubteam($teams) {
		if (! is_array($teams)) { return false; }
		if (sizeof($teams) == 0) { return false; }

		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		$query->matching($query->in('duty.uid',$teams));
		$query->setOrderings(array('name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		return $query->execute();
	}


	/**
	* findFiltered
	*
	* @param \string $name
	* @param \int $team
	* @param \array $type 0 = adults, 1 = children
	* @param \array $status 0 = no member, 1 = Freundeskreis, 2 = member
	* @return
	*/
	public function findFiltered($name = NULL, $team = 0, $type = array(0,1), $status = array (0,1,2)) {

		$query = $this->createQuery();
		if ($team > 0) {
			// if searching for members of a team, the type (child) status is neglected
			$result = $query->matching(
				$query->logicalAnd(
					$query->like('name','%'.$name.'%'),
					$query->equals('duty.team',$team),
					$query->in('memberstatus',$status)
				)
			);
		} else {
			$eightteenYears = date('Y-m-d',strtotime('- 18 years'));
			if (in_array(0,$type) and in_array(1,$type)) {
				$result = $query->matching(
					$query->logicalAnd(
						$query->like('name','%'.$name.'%'),
						$query->in('memberstatus',$status)
					)
				);
			} elseif (in_array(1,$type)) {
				$result = $query->matching(
					$query->logicalAnd(
						$query->like('name','%'.$name.'%'),
						$query->in('memberstatus',$status),
						$query->greaterThan('dateofbirth',$eightteenYears)
					)
				);
			} elseif (in_array(0,$type)) {
				$result = $query->matching(
					$query->logicalAnd(
						$query->like('name','%'.$name.'%'),
						$query->in('memberstatus',$status),
						$query->lessThanOrEqual('dateofbirth',$eightteenYears)
					)
				);
			}
		}
		return $result->execute();
	}

	/**
	* findBirthday
	*
	* @param \timestamp $timestamp Birthdate
	* @param \array $type 0 = adults, 1 = children
	* @param \array $status 0 = no member, 1 = Freundeskreis, 2 = member
	* @return
	*/
	public function findBirthday($timestamp, $type = array(0,1), $status = array (0,1,2)) {

		$searchstring = '%-'.date('m',$timestamp).'-'.date('d',$timestamp).' 00:00:00';
		$orderings = array ('lastname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING, 'firstname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
		
		$eightteenYears = date('Y-m-d',strtotime('- 18 years'));

		$query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
		if (in_array(0,$type) and in_array(1,$type)) {
			$query->matching(
				$query->logicalAnd(
					$query->like('dateofbirth',$searchstring),
					$query->logicalOr(
						$query->in('memberstatus',$status),
						$query->greaterThan('dateofbirth',$eightteenYears)
					)
				)
			);
		} elseif (in_array(0,$type)) {
			$query->matching(
				$query->logicalAnd(
					$query->like('dateofbirth',$searchstring),
					$query->in('memberstatus',$status),
					$query->lessThanOrEqual('dateofbirth',$eightteenYears)
				)
			);
		} elseif (in_array(1,$type)) {
			$query->matching(
				$query->logicalAnd(
					$query->like('dateofbirth',$searchstring),
					$query->greaterThan('dateofbirth',$eightteenYears)
				)
			);
		}
		$query->setOrderings($orderings);
		return $query->execute();
	}
	
}