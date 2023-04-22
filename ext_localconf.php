<?php
defined('TYPO3_MODE') || die();

(static function() {
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'List',
		[\FKU\FkuPeople\Controller\PersonController::class => 'list'],
		[\FKU\FkuPeople\Controller\PersonController::class => 'list']
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'CurrentUser',
		[\FKU\FkuPeople\Controller\PersonController::class => 'show'],
		[\FKU\FkuPeople\Controller\PersonController::class => '']
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'Birthdays',
		[\FKU\FkuPeople\Controller\PersonController::class => 'birthday, seniorBirthday'],
		[\FKU\FkuPeople\Controller\PersonController::class => '']
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'Dashboard',
		[\FKU\FkuPeople\Controller\PersonController::class => 'dashboard'],
		[\FKU\FkuPeople\Controller\PersonController::class => '']
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'Team',
		[\FKU\FkuPeople\Controller\PersonController::class => 'team'],
		[\FKU\FkuPeople\Controller\PersonController::class => '']
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'Notification',
		[\FKU\FkuPeople\Controller\PersonController::class => 'notification, updateNotificationSetup, updateNotification, addNotification, removeNotification'],
		[\FKU\FkuPeople\Controller\PersonController::class => 'notification, updateNotificationSetup, updateNotification, addNotification, removeNotification']
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'FkuPeople',
		'Password',
		[\FKU\FkuPeople\Controller\PersonController::class => 'generatePassword'],
		[\FKU\FkuPeople\Controller\PersonController::class => 'generatePassword']
	);

})();
