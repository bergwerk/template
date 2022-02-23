<?php
defined('TYPO3_MODE') || die();

/**
 * Temporary variables
 */
$extensionKey = 'template';


// BackendLayouts
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    $extensionKey,
    'Configuration/TsConfig/Page/Mod/WebLayout/BackendLayouts.tsconfig',
    'Template: Backend Layouts'
);

// TCEMAIN
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    $extensionKey,
    'Configuration/TsConfig/Page/TCEMAIN.tsconfig',
    'Template: TCEMAIN'
);

// TCEFORM
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    $extensionKey,
    'Configuration/TsConfig/Page/TCEFORM.tsconfig',
    'Template: TCEFORM'
);

// Content Elements
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    $extensionKey,
    'Configuration/TsConfig/Page/ContentElement/All.tsconfig',
    'Template: All Content Elements'
);
