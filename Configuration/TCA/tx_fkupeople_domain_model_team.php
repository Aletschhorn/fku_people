<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_team',
		'label' => 'title',
		'dividers2tabs' => TRUE,
		'versioningWS' => FALSE,

		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'searchFields' => 'title,',
		'dynamicConfigFile' => 'EXT:fku_people/Configuration/TCA/Team.php',
		'iconfile' => 'EXT:fku_people/Resources/Public/Icons/tx_fkupeople_domain_model_team.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, title',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_team.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);
