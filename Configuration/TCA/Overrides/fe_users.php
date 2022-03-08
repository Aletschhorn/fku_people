<?php
defined('TYPO3_MODE') || die();

// Add some fields to FE Users table to show TCA fields definitions
// USAGE: TCA Reference > $TCA array reference > ['columns'][fieldname]['config'] / TYPE: "select"
$temporaryColumns = array (
        'tx_fkupeople_fkudbid' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_fkudbid',
			'config' => array (
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
        ),
        'tx_fkupeople_fkudbsync' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_fkudbsync',
			'config' => array (
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'eval' => 'datetime',
				'readOnly' => true
			)
        ),
        'tx_fkupeople_planningcal' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_planningcal',
			'config' => array (
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
			)
        ),
        'tx_fkupeople_planning_alarm' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_planning_alarm',
			'config' => array (
				'type' => 'input',
				'size' => 4,
				'eval' => 'int',
			)
        ),
        'tx_fkupeople_notification_hour' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_notification_hour',
			'config' => array (
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
        ),
        'tx_fkupeople_notification_weekday' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_notification_weekday',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('Sonntag', 0),
					array('Montag', 1),
					array('Dienstag', 2),
					array('Mittwoch', 3),
					array('Donnerstag', 4),
					array('Freitag', 5),
					array('Samstag', 6),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
        ),
        'tx_fkupeople_notification_weekdayhour' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_notification_weekdayhour',
			'config' => array (
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
        ),
        'tx_fkupeople_notification_cacheday' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_notification_cacheday',
			'config' => array (
				'type' => 'text',
				'cols' => 40,
				'rows' => 10,
			)
        ),
        'tx_fkupeople_notification_cacheweek' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tx_fkupeople_notification_cacheweek',
			'config' => array (
				'type' => 'text',
				'cols' => 40,
				'rows' => 10,
			)
        ),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'fe_users',
        $temporaryColumns
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'fe_users',
        '--div--;LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:fe_users.tabs.fkudb, tx_fkupeople_fkudbid, tx_fkupeople_fkudbsync, tx_fkupeople_planningcal, tx_fkupeople_planning_alarm, tx_fkupeople_notification_hour, tx_fkupeople_notification_weekday, tx_fkupeople_notification_weekdayhour, tx_fkupeople_notification_cacheday, tx_fkupeople_notification_cacheweek'
);

$GLOBALS['TCA']['fe_users']['columns']['tx_extbase_type']['config']['default'] = 'Tx_Extbase_Domain_Model_FrontendUser';
?>