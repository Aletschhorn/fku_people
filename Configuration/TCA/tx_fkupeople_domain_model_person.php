<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person',
		'label' => 'name',
		'dividers2tabs' => TRUE,
		'versioningWS' => FALSE,
		'default_sortby' => 'ORDER BY name',
		
		'searchFields' => 'name,firstname,lastname,address,housenumber,addressadd,zipcode,city,phone,mobile,email,dateofbirth,memberstatus,duty,',
		'iconfile' => 'EXT:fku_people/Resources/Public/Icons/tx_fkupeople_domain_model_person.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'name, firstname, lastname, address, housenumber, addressadd, zipcode, city, phone, mobile, email, dateofbirth, memberstatus, child, duty',
	),
	'types' => array(
		'1' => array('showitem' => 'name, firstname, lastname, address, housenumber, addressadd, zipcode, city, phone, mobile, email, dateofbirth, memberstatus, child, duty'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'firstname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'lastname' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'address' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.address',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'housenumber' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.housenumber',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'addressadd' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.addressadd',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'zipcode' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.zipcode',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'city' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.city',
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
		'dateofbirth' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.dateofbirth',
			'config' => array(
				'type' => 'none',
			),
		),
		'memberstatus' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.memberstatus',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('None', 0),
					array('Friendship', 1),
					array('Member', 2),
				)
			)
		),
		'child' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.child',
			'config' => array(
				'type' => 'check',
				'default' => '0',
			)
		),
		'duty' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_person.duty',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_fkupeople_domain_model_subteam',
				'MM' => 'tx_fkupeople_person_subteam_mm',
			),
		),
		
	),
);
