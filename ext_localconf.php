<?php
defined('TYPO3_MODE') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['template'] = 'EXT:template/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TsConfig/Page/All.tsconfig">');

// Add eID for clearCache
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['clearCache'] = \BERGWERK\Template\Controller\ClearCacheController::class . '::clearCacheAction';

