<?php
defined('TYPO3_MODE') || die();

/***************
 * Define TypoScript as content rendering template
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'template/Configuration/TypoScript/';
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'template/Configuration/TypoScript/ContentElement/';

/***************
 * Overwrite default RTE configuration for bootstrap package
 */
if (isset($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bootstrap'])) {
    unset($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bootstrap']);
}

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bootstrap'] = 'EXT:template/Configuration/RTE/Default.yaml';

// CONTENT ELEMENTS
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TsConfig/Page/ContentElement/All.tsconfig">');

// TCEFORM
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TsConfig/Page/TCEFORM.tsconfig">');

// TCEMAIN
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TsConfig/Page/TCEMAIN.tsconfig">');

// RTE
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TsConfig/Page/RTE.tsconfig">');

// Add BackendLayouts for the BackendLayout DataProvider
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:template/Configuration/TsConfig/Page/Mod/WebLayout/BackendLayouts.tsconfig">');
