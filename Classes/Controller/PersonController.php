<?php
namespace FKU\FkuPeople\Controller;

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
 * PersonController
 */

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Crypto\PasswordHashing\SaltedPasswordService;
use FKU\FkuPeople\Domain\Repository\UserRepository;
use FKU\FkuPeople\Domain\Repository\PersonRepository;
use FKU\FkuPeople\Domain\Repository\TeamRepository;
use FKU\FkuPeople\Domain\Repository\SubteamRepository;
use FKU\FkuPeople\Domain\Repository\NotificationRepository;
use FKU\FkuPeople\Domain\Repository\NotificationruleRepository;
use FKU\FkuPeople\Domain\Model\Notification;

class PersonController extends ActionController {

	/**
    * User Repository
    *
    * @var UserRepository
    */
    protected $userRepository;

	/**
	 * personRepository
	 *
	 * @var PersonRepository
	 */
	protected $personRepository = NULL;

	/**
	 * teamRepository
	 *
	 * @var TeamRepository
	 */
	protected $teamRepository = NULL;

	/**
	 * subteamRepository
	 *
	 * @var SubteamRepository
	 */
	protected $subteamRepository = NULL;

	/**
	 * notificationRepository
	 *
	 * @var NotificationRepository
	 */
	protected $notificationRepository = NULL;

	/**
	 * notificationruleRepository
	 *
	 * @var NotificationruleRepository
	 */
	protected $notificationruleRepository = NULL;

	/**
	 * @param UserRepository $userRepository
	 * @param PersonRepository $personRepository
	 * @param TeamRepository $teamRepository
	 * @param SubteamRepository $subteamRepository
	 * @param NotificationRepository $notificationRepository
	 * @param NotificationruleRepository $notificationruleRepository
	 */
	public function __construct(
			UserRepository $userRepository,
			PersonRepository $personRepository,
			TeamRepository $teamRepository,
			SubteamRepository $subteamRepository,
			NotificationRepository $notificationRepository,
			NotificationruleRepository $notificationruleRepository
		) {
		$this->userRepository = $userRepository;
		$this->personRepository = $personRepository;
		$this->teamRepository = $teamRepository;
		$this->subteamRepository = $subteamRepository;
		$this->notificationRepository = $notificationRepository;
		$this->notificationruleRepository = $notificationruleRepository;
	}
	
	/**
	 * action dashboard
	 *
	 * @return void
	 */
	public function dashboardAction() {
		$teams = $this->teamRepository->findAll();
		$this->view->assignMultiple(array(
			'teams' => $teams,
			'settings' => $this->settings,
		));
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		
		$status_member = 1;
		$status_friend = 1;
		$status_none = 1;
		$type_adult = 1;
		$type_child = 1;
		$listtype = 1;
		if ($this->request->hasArgument('name')) { $name = trim($this->request->getArgument('name')); }
		if ($this->request->hasArgument('team')) { $team = intval($this->request->getArgument('team')); }
		if ($this->request->hasArgument('status_member')) { $status_member = intval($this->request->getArgument('status_member')); }
		if ($this->request->hasArgument('status_friend')) { $status_friend = intval($this->request->getArgument('status_friend')); }
		if ($this->request->hasArgument('status_none')) { $status_none = intval($this->request->getArgument('status_none')); }
		// Do not differentiate between adults and children anymore
		// if ($this->request->hasArgument('type_adult')) { $type_adult = intval($this->request->getArgument('type_adult')); }
		// if ($this->request->hasArgument('type_child')) { $type_child = intval($this->request->getArgument('type_child')); }
		if ($this->request->hasArgument('listtype')) { $listtype = intval($this->request->getArgument('listtype')); }
		if ($this->request->hasArgument('showall')) { $showall = intval($this->request->getArgument('showall')); }
		if ($this->request->hasArgument('sent')) { $sent = intval($this->request->getArgument('sent')); }
		
		$filter = array (
			'name' => $name, 
			'team' => $team, 
			'status_member' => $status_member,
			'status_friend' => $status_friend,
			'status_none' => $status_none,
			'type_adult' => $type_adult,
			'type_child' => $type_child,
			'listtype' => $listtype
		);
		$type = array ();
		$status = array ();
		if ($type_adult) { $type[] = 0; }
		if ($type_child) { $type[] = 1; }
		if ($status_none) { $status[] = 0; }
		if ($status_friend) { $status[] = 1; }
		if ($status_member) { $status[] = 2; }

		if ($type_adult == 0 and $type_child == 0) {
			// Either checkbox for adults or children (or both) must be selected
			$error = 1;
			$persons = array ();
		} elseif ($status_member == 0 and $status_friend == 0 and $status_none == 0) {
			// At least one of the three status must be selected
			$error = 2;
			$persons = array ();
		} elseif (! $name and ! $team and ! $showall) {
			$error = 3;
			$persons = array ();
		} else {
			$persons = $this->personRepository->findFiltered($name, $team, $type, $status);
		}
		$teams = $this->teamRepository->findAll();
		$allPeople = $this->personRepository->findAllWithName();
		$this->view->assignMultiple(array(
			'persons' => $persons,
			'teams' => $teams,
			'filter' => $filter,
			'sent' => $sent,
			'error' => $error,
			'allPeople' => $allPeople,
		));
	}

	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction() {
		if ($this->request->hasArgument('DBID')) { 
			if ($DBID = intval($this->request->getArgument('DBID'))) {
				$person = $this->personRepository->findByUid($DBID);
			}
		} else {
			if ($userId = $GLOBALS['TSFE']->fe_user->user['uid']) {
				$user = $this->userRepository->findByUid($userId);
				if ($DBID = $user->getTxFkupeopleFkudbid()) {
					$person = $this->personRepository->findByUid($DBID);
				}
			}
		}

		$this->view->assign('person', $person);
	}

	/**
	 * action team
	 *
	 * @return void
	 */
	public function teamAction() {
		$teamIDs = $this->settings['teams'];
		if ($teamIDs == '') {
			$this->addFlashMessage('Keine Team-ID festgelegt','',\TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		} else {
			$teams = explode(',',$teamIDs);
			$persons = $this->personRepository->findBySubteam($teams);
		}
		
		$subteams = $this->subteamRepository->findAll();
		$teams = $this->subteamRepository->findByUids($teams);

		$this->view->assignMultiple(array(
			'teamIDs' => $teamIDs,
			'teams' => $teams,
			'singleTeam' => $singleTeam,
			'subteams' => $subteams,
			'persons' => $persons,
			'display' => explode(',',$this->settings['display']),
		));
	}


	/**
	 * action birthday
	 *
	 * @return void
	 */
	public function birthdayAction() {
		
		if ($this->settings['variant'] == 1) {
			$this->redirect('seniorBirthday');
		}
		
		$numberOfDays = $this->settings['numberOfBirthdates'];
		
		if ($this->request->hasArgument('timestamp')) { 
			$timestamp = intval($this->request->getArgument('timestamp')); 
		}
		if ($timestamp === NULL or $timestamp == 0 or checkdate(date('n',$timestamp),date('j',$timestamp),date('Y',$timestamp)) == false) {
			$timestamp = strtotime('Today');
		}

		$today = strtotime('Today');
		$tomorrow = strtotime('Tomorrow');
		
		$dates = array();
		
		for ($i=0;$i<$numberOfDays;$i++) {
			$actualDay = strtotime('+'.$i.' days',$timestamp);
			$longDate = date('j.',$actualDay).' '.strftime('%B',$actualDay);
			if ($actualDay == $today) {
				$dates[$i] = array ('timestamp' => $actualDay, 'text' => 'Heute, '.$longDate);
			} elseif ($actualDay == $tomorrow) {
				$dates[$i] = array ('timestamp' => $actualDay, 'text' => 'Morgen, '.$longDate);
			} else {
				$dates[$i] = array ('timestamp' => $actualDay, 'text' => strftime('%A',$actualDay).', '.$longDate);
			}
			$dates[$i]['birthdays'] = $this->personRepository->findBirthday($actualDay, array(0,1), array(1,2));
		}

		$this->view->assignMultiple(array(
			'dates' => $dates,
		));
	}

	/**
	 * action seniorBirthday
	 *
	 * @return void
	 */
	public function seniorBirthdayAction() {
		
		$timestamp = strtotime('first day of next month');
		$numberOfDays = date('t', $timestamp);
		
		$dates = [];
		$counter = 0;
		
		for ($i=0;$i<$numberOfDays;$i++) {
			$actualDay = strtotime('+'.$i.' days',$timestamp);
			$birthdays = $this->personRepository->findBirthday($actualDay, [0], [2]);
			if (count($birthdays)>0) {
				$persons = [];
				foreach ($birthdays as $person) {
					$age = date('Y',$actualDay) - $person->getGeburtstag()->format('Y');
					if ($age == 70 or $age == 75 or $age > 79) {
						$persons[] = $person;
						$counter++;
					}
				}
				if (count($persons) > 0) {
					$longDate = date('j.',$actualDay).' '.strftime('%B',$actualDay);
					$dates[$i] = array ('timestamp' => $actualDay, 'text' => $longDate, 'birthdays' => $persons);
				}
			}
		}

		$this->view->assignMultiple(array(
			'dates' => $dates,
			'counter' => $counter,
			'month' => $timestamp,
		));
	}

	/**
	 * action notificationInfo
	 *
	 * @return void
	 */
	public function notificationInfoAction() {
		if ($userId = $GLOBALS['TSFE']->fe_user->user['uid']) {
			$user = $this->userRepository->findByUid($userId);
			if ($DBID = $user->getTxFkupeopleFkudbid()) {
				$person = $this->personRepository->findByUid($DBID);
			}			
		}
		$this->view->assignMultiple(array(
			'user' => $user,
			'person' => $person,
		));
	}

	/**
	 * action notification
	 *
	 * @return void
	 */
	public function notificationAction() {
		if ($userId = $GLOBALS['TSFE']->fe_user->user['uid']) {
			$user = $this->userRepository->findByUid($userId);
			if ($DBID = $user->getTxFkupeopleFkudbid()) {
				$person = $this->personRepository->findByUid($DBID);
			}			
			$notifications = $this->notificationRepository->findAllOfUser($user);
		}
		
		// identify the user groups of current FE user to limit the available notification rules accordingly
		$userGroups = $GLOBALS['TSFE']->fe_user->groupData['uid'];
		$notificationRules = $this->notificationruleRepository->findFilteredByUsergroup($userGroups);
		
		$categories = [];
		foreach ($notificationRules as $rule) {
			foreach ($rule->getCategory() as $category) {
				$categories[] = $category;
			}
		}
		$categories = array_unique($categories);
		sort($categories);
		
		$times = [];
		for ($i=0;$i<24;$i++) {
			$times[$i] = sprintf("%'.02d:00", $i);
		}
	
		$this->view->assignMultiple(array(
			'user' => $user,
			'person' => $person,
			'notifications' => $notifications,
			'notificationRules' => $notificationRules,
			'times' => $times,
			'userGroups' => $userGroups,
			'categories' => $categories,
		));
	}

	/**
	 * action addNotification
	 *
     * @return void
	 */
	public function addNotificationAction() {
		$rule = intval($this->request->getArgument('rule'));
		if ($rule) {
			$notificationrule = $this->notificationruleRepository->findByUid($rule);
			if ($notificationrule) {
				$userId = $GLOBALS['TSFE']->fe_user->user['uid'];
				$user = $this->userRepository->findByUid($userId);
				$notification = new Notification;
				$notification->setRule($notificationrule);
				$notification->setUser($user);
				$notification->setTiming(1);
				$notification->setDays(1);
				$this->notificationRepository->add($notification);
			}
		}
        $this->redirect('notification');
	}

	/**
	 * action updateNotification
	 *
     * @return void
	 */
	public function updateNotificationAction() {

		$userId = $GLOBALS['TSFE']->fe_user->user['uid'];
		$user = $this->userRepository->findByUid($userId);

		// update settings (sending hour and weekday)
		if ($this->request->hasArgument('user')) {
			$args_user = $this->request->getArgument('user');
			$user->setTxFkupeopleNotificationHour(intval($args_user['txFkupeopleNotificationHour']));
			$user->setTxFkupeopleNotificationWeekday(intval($args_user['txFkupeopleNotificationWeekday']));
			$user->setTxFkupeopleNotificationWeekdayhour(intval($args_user['txFkupeopleNotificationWeekdayhour']));
			$this->userRepository->update($user);
		}
		
		// update days per notification --> Now done with AJAX
		/*
		if ($this->request->hasArgument('notification')) {
			$args_notific = $this->request->getArgument('notification');
			foreach ($args_notific as $id => $value) {
				$notification = $this->notificationRepository->findByUid($id);
				$notification->setDays($value);
				$this->notificationRepository->update($notification);
			}
		}
		*/
		
		// update the timing per rule
		if ($this->request->hasArgument('rule')) {
			$id = $this->request->getArgument('rule');
			$notification = $this->notificationRepository->findByUid($id);
			$field = $this->request->getArgument('field');
			if ($notification and $field == 'timing') {
				$value = $this->request->getArgument('value');
				$notification->setTiming($value);
			}
			$this->notificationRepository->update($notification);
		}		
		
        $this->redirect('notification');
	}

	/**
	 * action removeNotification
	 *
     * @return void
	 */
	public function removeNotificationAction() {
		$notific = intval($this->request->getArgument('rule'));
		if ($notific) {
			$notification = $this->notificationRepository->findByUid($notific);
			$userId = $GLOBALS['TSFE']->fe_user->user['uid'];
			if ($userId == $notification->getUser()->getUid()) {
				$this->notificationRepository->remove($notification);
			}
		}
        $this->redirect('notification');
	}

	/**
	 * action generatePassword
	 *
     * @return void
	 */
	public function generatePasswordAction() {
		$arguments = $this->request->getArguments();

		// initialization
		$charactersBase = trim($this->settings['passwordCharacters']);
		if ($charactersBase == '') {
			$charactersBase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890,.;:-_+%&/()?!$';
		}
		if (! $amount = $arguments['generatePassword']['amount']) {
			$amount = 3;
		}
		if (! $length = $arguments['generatePassword']['length']) {
			$length = 8;
		}
		if (! $characters) {
			$characters = $charactersBase;
		}
		
		if ($arguments) {
			// generate passwords
			$characters = trim($arguments['generatePassword']['characters']);
			if ($characters == '') {
				$characters = $charactersBase;
			}
			$chars = strlen($characters)-1;
			$passwords = [];
			for ($i=0;$i<$amount;$i++) {
				$password = '';
				for ($j=0;$j<$length;$j++) {
					$digit = random_int(0,$chars);
					$password .= $characters[$digit];
				}
				$passwords[] = $password;
			}
		}
		
		$this->view->assignMultiple(array(
			'amount' => $amount,
			'length' => $length,
			'characters' => $characters,
			'passwords' => $passwords,
		));
	}

}