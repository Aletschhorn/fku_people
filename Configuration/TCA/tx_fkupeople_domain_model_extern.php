<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_extern',
		'label' => 'lastname',
		'dividers2tabs' => TRUE,
		'versioningWS' => FALSE,
		'default_sortby' => 'ORDER BY lastname',
		
		'searchFields' => 'firstname,lastname,phone,mobile,email',
		'iconfile' => 'EXT:fku_people/Resources/Public/Icons/tx_fkupeople_domain_model_extern.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'firstname, lastname, phone, mobile, email',
	),
	'types' => array(
		'1' => array('showitem' => 'firstname, lastname, phone, mobile, email'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_extern.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_extern.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'phone' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.phone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'mobile' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.mobile',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);
