<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_subteam',
		'label' => 'title',
		'dividers2tabs' => TRUE,
		'versioningWS' => FALSE,

		'searchFields' => 'title,team,',
		'dynamicConfigFile' => 'EXT:fku_people/Configuration/TCA/Subteam.php',
		'iconfile' => 'EXT:fku_people/Resources/Public/Icons/tx_fkupeople_domain_model_subteam.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'title, team',
	),
	'types' => array(
		'1' => array('showitem' => 'title, team'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_subteam.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'team' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_subteam.team',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_fkupeople_domain_model_team',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		
	),
);
