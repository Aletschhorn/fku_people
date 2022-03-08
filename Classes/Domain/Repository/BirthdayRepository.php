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
 * The repository for birthdays
 */
class BirthdayRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	/**
	* findBirthday
	*
	* @param \timestamp $timestamp
	* @param \int $days Interval of days to be covered
	* @return
	*/
	public function findBirthday($timestamp, $days=7) {

		$dateList = array();
		for ($i=0;$i<$days;$i++) {
			$datum = strtotime('+'.$i.' days', $timestamp);
			$dateList[] = date('j.n.', $datum);
		}
		
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(false);
		$result = $query->matching(
			$query->in('geburtsdatum',$dateList)
		)->execute();
		
		return $result;
	}
}
?>