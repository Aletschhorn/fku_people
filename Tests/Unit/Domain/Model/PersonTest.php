<?php

namespace FKU\FkuPeople\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Daniel Widmer <daniel.widmer@fku.ch>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \FKU\FkuPeople\Domain\Model\Person.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Daniel Widmer <daniel.widmer@fku.ch>
 */
class PersonTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \FKU\FkuPeople\Domain\Model\Person
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \FKU\FkuPeople\Domain\Model\Person();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFirstnameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getFirstname()
		);
	}

	/**
	 * @test
	 */
	public function setFirstnameForStringSetsFirstname() {
		$this->subject->setFirstname('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'firstname',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLastnameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getLastname()
		);
	}

	/**
	 * @test
	 */
	public function setLastnameForStringSetsLastname() {
		$this->subject->setLastname('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lastname',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAddress()
		);
	}

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress() {
		$this->subject->setAddress('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'address',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHousenumberReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getHousenumber()
		);
	}

	/**
	 * @test
	 */
	public function setHousenumberForStringSetsHousenumber() {
		$this->subject->setHousenumber('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'housenumber',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAddressaddReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAddressadd()
		);
	}

	/**
	 * @test
	 */
	public function setAddressaddForStringSetsAddressadd() {
		$this->subject->setAddressadd('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'addressadd',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getZipcodeReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getZipcode()
		);
	}

	/**
	 * @test
	 */
	public function setZipcodeForStringSetsZipcode() {
		$this->subject->setZipcode('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zipcode',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCity()
		);
	}

	/**
	 * @test
	 */
	public function setCityForStringSetsCity() {
		$this->subject->setCity('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'city',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhoneReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone() {
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMobileReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getMobile()
		);
	}

	/**
	 * @test
	 */
	public function setMobileForStringSetsMobile() {
		$this->subject->setMobile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mobile',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateofbirthReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDateofbirth()
		);
	}

	/**
	 * @test
	 */
	public function setDateofbirthForStringSetsDateofbirth() {
		$this->subject->setDateofbirth('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dateofbirth',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMemberstatusReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getMemberstatus()
		);
	}

	/**
	 * @test
	 */
	public function setMemberstatusForIntegerSetsMemberstatus() {
		$this->subject->setMemberstatus(12);

		$this->assertAttributeEquals(
			12,
			'memberstatus',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDutyReturnsInitialValueForSubteam() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getDuty()
		);
	}

	/**
	 * @test
	 */
	public function setDutyForObjectStorageContainingSubteamSetsDuty() {
		$duty = new \FKU\FkuPeople\Domain\Model\Subteam();
		$objectStorageHoldingExactlyOneDuty = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneDuty->attach($duty);
		$this->subject->setDuty($objectStorageHoldingExactlyOneDuty);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneDuty,
			'duty',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addDutyToObjectStorageHoldingDuty() {
		$duty = new \FKU\FkuPeople\Domain\Model\Subteam();
		$dutyObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$dutyObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($duty));
		$this->inject($this->subject, 'duty', $dutyObjectStorageMock);

		$this->subject->addDuty($duty);
	}

	/**
	 * @test
	 */
	public function removeDutyFromObjectStorageHoldingDuty() {
		$duty = new \FKU\FkuPeople\Domain\Model\Subteam();
		$dutyObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$dutyObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($duty));
		$this->inject($this->subject, 'duty', $dutyObjectStorageMock);

		$this->subject->removeDuty($duty);

	}
}
