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
 * Birthday
 */
class Birthday extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * nachname
	 *
	 * @var \string
	 */
	public $nachname;

	/**
	 * Returns the nachname
	 *
	 * @return \string $nachname
	 */
	public function getNachname() {
		return $this->nachname;
	}

	/**
	 * Sets the nachname
	 *
	 * @param \string $nachname
	 * @return void
	 */
	public function setNachname($nachname) {
		$this->nachname = $nachname;
	}

	/**
	 * vorname
	 *
	 * @var \string
	 */
	public $vorname;

	/**
	 * Returns the vorname
	 *
	 * @return \string $vorname
	 */
	public function getVorname() {
		return $this->vorname;
	}

	/**
	 * Sets the vorname
	 *
	 * @param \string $vorname
	 * @return void
	 */
	public function setVorname($vorname) {
		$this->vorname = $vorname;
	}

	/**
	 * geburtsdatum
	 *
	 * @var \string
	 */
	public $geburtsdatum;

	/**
	 * Returns the geburtsdatum
	 *
	 * @return \string $geburtsdatum
	 */
	public function getGeburtsdatum() {
		return $this->geburtsdatum;
	}

	/**
	 * Sets the geburtsdatum
	 *
	 * @param \string $geburtsdatum
	 * @return void
	 */
	public function setGeburtsdatum($geburtsdatum) {
		$this->geburtsdatum = $geburtsdatum;
	}

	/**
	 * mitglied
	 *
	 * @var \int
	 */
	public $mitglied;

	/**
	 * Returns the mitglied
	 *
	 * @return \int $mitglied
	 */
	public function getMitglied() {
		return $this->mitglied;
	}

	/**
	 * Sets the mitglied
	 *
	 * @param \int $mitglied
	 * @return void
	 */
	public function setMitglied($mitglied) {
		$this->mitglied = $mitglied;
	}

	/**
	 * jahrgang
	 *
	 * @var \int
	 */
	protected $jahrgang;

	/**
	 * Returns the jahrgang
	 *
	 * @return \int $jahrgang
	 */
	public function getJahrgang() {
		return $this->jahrgang;
	}

	/**
	 * Sets the jahrgang
	 *
	 * @param \int $jahrgang
	 * @return void
	 */
	public function setJahrgang($jahrgang) {
		$this->jahrgang = $jahrgang;
	}

	/**
	 * persAlter
	 *
	 * @var \int
	 */
	protected $persAlter;

	/**
	 * Returns the persAlter
	 *
	 * @return \int $persAlter
	 */
	public function getPersAlter() {
		return $this->persAlter;
	}

	/**
	 * Sets the persAlter
	 *
	 * @param \int $persAlter
	 * @return void
	 */
	public function setPersAlter($persAlter) {
		$this->persAlter = $persAlter;
	}

	/**
	 * wtag
	 *
	 * @var \string
	 */
	public $wtag;

	/**
	 * Returns the wtag
	 *
	 * @return \string $wtag
	 */
	public function getWtag() {
		$wtagnamen = array('Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag');
		$parts = explode('.',$this->geburtsdatum);
		$year = date('Y');
		if (mktime(23,59,59,$parts[1],$parts[0],$year) < time()) { $year++; }
		$datum = mktime(0,0,0,$parts[1],$parts[0],$year);
		return $wtagnamen[date('w',$datum)];
	}
}
?>