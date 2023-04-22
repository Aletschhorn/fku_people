<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'List',
	'People list and search form'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'CurrentUser',
	'People data of current user'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'Birthdays',
	'People\'s birthday list'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'Dashboard',
	'People dashboard'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'Team',
	'Peoples of a team'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'Notification',
	'People\'s notification setup'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'FkuPeople',
	'Password',
	'Password generator'
);


$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['fkupeople_dashboard'] = 'pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['fkupeople_password'] = 'pages,recursive';

// register flexforms
$pluginSignature = 'fkupeople_team';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:fku_people/Configuration/FlexForms/flexform_team.xml'); 

$pluginSignature = 'fkupeople_birthdays';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:fku_people/Configuration/FlexForms/flexform_birthdays.xml'); 

$pluginSignature = 'fkupeople_notification';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:fku_people/Configuration/FlexForms/flexform_notification.xml'); 

?>
