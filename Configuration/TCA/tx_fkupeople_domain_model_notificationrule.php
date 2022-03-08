<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'extension,nid,title,message,category',
		'iconfile' => 'EXT:fku_people/Resources/Public/Icons/tx_fkupeople_domain_model_notificationrule.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'extension, nid, title, message, timing_now, timing_day, timing_week, usergroup, category',
	),
	'types' => array(
		'1' => array('showitem' => '--palette--;LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:palette.extension;extension, title, message, --palette--;LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:palette.timing;timing, usergroup, category,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime'),
	),
	'palettes' => array(
		'extension' => array('showitem' => 'extension, nid'),
		'timing' => array('showitem' => 'timing_now, timing_day, timing_week'),
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
			'config' => array(
				'type' => 'input',
				 'renderType' => 'inputDateTime',
				'eval' => 'datetime,int',
				'default' => 0,
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
			'config' => array(
				'type' => 'input',
				 'renderType' => 'inputDateTime',
				'eval' => 'datetime,int',
				'default' => 0,
			),
		),
		'extension' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.extension',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'nospace,trim,required'
			),
		),
		'nid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.nid',
			'config' => array(
				'type' => 'input',
				'size' => 5,
				'eval' => 'int'
			),
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.title',
			'config' => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim,required'
			),
		),
		'message' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.message',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'timing_now' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.timing_now',
			'config' => array(
				'type' => 'check',
			),
		),
		'timing_day' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.timing_day',
			'config' => array(
				'type' => 'check',
			),
		),
		'timing_week' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.timing_week',
			'config' => array(
				'type' => 'check',
			),
		),
		'usergroup' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.usergroup',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'fe_groups',
				'minitems' => 0,
				'maxitems' => 10,
			),
		),
		'category' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:fku_people/Resources/Private/Language/locallang_db.xlf:tx_fkupeople_domain_model_notificationrule.category',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectTree',
				'foreign_table' => 'sys_category',
				'treeConfig' => array(
					'parentField' => 'parent'
				),
                'MM' => 'sys_category_record_mm',
                'MM_match_fields' => array(
                    'fieldname' => 'category',
                    'tablenames' => 'tx_fkupeople_domain_model_notificationrule',
                ),
                'MM_opposite_field' => 'items',
				'minitems' => 0,
				'maxitems' => 10,
			),
		),
		
	),
);
