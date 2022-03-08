<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'FKU.fku_people',
	'View',
	[
		'Person' => 'list, show, birthday, dashboard, authenticate, notification, updateNotificationSetup, updateNotification, addNotification, removeNotification, notificationInfo, generatePassword, team',
		'Team' => 'list',
	],
	// non-cacheable actions
	[
		'Person' => 'list, notification, updateNotification, generatePassword, updateNotificationSetup, updateNotification, addNotification, removeNotification',
		'Team' => '',
	]
);
