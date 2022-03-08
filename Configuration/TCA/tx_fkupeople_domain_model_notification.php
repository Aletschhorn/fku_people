<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notification',
		'label' => 'user',
		'dividers2tabs' => TRUE,
		'versioningWS' => TRUE,
		'default_sortby' => 'ORDER BY user, rule',
		
		'searchFields' => 'rule, user',
		'iconfile' => 'EXT:fku_people/Resources/Public/Icons/tx_fkupeople_domain_model_notification.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'rule, days, user, timing',
	),
	'types' => array(
		'1' => array('showitem' => 'rule, days, user, timing'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'rule' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notification.rule',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_fkupeople_domain_model_notificationrule',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'days' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notification.days',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int'
			),
		),
		'user' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notification.user',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'timing' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notification.timing',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('Immediately', 0),
					array('Daily', 1),
					array('Weekly', 2),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		
	),
);
