<?php
defined('TYPO3_MODE') || die();

foreach (['person', 'team', 'subteam', 'birthday', 'extern', 'notification', 'notificationrule'] as $table) {
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fkupeople_domain_model_' . $table);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fkupeople_domain_model_' . $table, 
	'EXT:fkupeople/Resources/Private/Language/locallang_' . $table . '.xlf');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fku_people', 'Configuration/TypoScript', 'FKU people');

?>