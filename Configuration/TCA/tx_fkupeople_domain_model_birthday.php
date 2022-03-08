<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_birthday',
		'label' => 'nachname',
		'dividers2tabs' => TRUE,
		'sortby' => 'nachname',
		'versioningWS' => FALSE,
		'searchFields' => 'nachname,vorname,',
	),
	'interface' => array(
		'showRecordFieldList' => 'nachname, vorname, geburtsdatum, mitglied, jahrgang, pers_alter',
	),
	'types' => array(
		'1' => array('showitem' => '--palette--;;name, --palette--;;age'),
	),
	'palettes' => array(
		'name' => array('showitem' => 'nachname, vorname, mitglied'),
		'age' => array('showitem' => 'geburtsdatum, jahrgang, pers_alter'),
	),
	'columns' => array(
		'nachname' => array(
			'exclude' => 1,
			'label' => 'Lastname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'readOnly' => TRUE,
			),
		),
		'vorname' => array(
			'exclude' => 1,
			'label' => 'Firstname',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'readOnly' => TRUE,
			),
		),
		'geburtsdatum' => array(
			'exclude' => 1,
			'label' => 'Birthday',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'readOnly' => TRUE,
			),
		),
		'mitglied' => array(
			'exclude' => 1,
			'label' => 'Member',
			'config' => array(
				'type' => 'input',
				'size' => 2,
				'readOnly' => TRUE,
			),
		),
		'jahrgang' => array(
			'exclude' => 1,
			'label' => 'Year of birth',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'readOnly' => TRUE,
			),
		),
		'pers_alter' => array(
			'exclude' => 1,
			'label' => 'Age',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'readOnly' => TRUE,
			),
		),
	),
);

?>