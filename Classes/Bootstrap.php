<?php

namespace BERGWERK\BwrkTemplate;

use TYPO3\CMS\Core\Crypto\PasswordHashing\PasswordHashInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

class Bootstrap
{
    const CACHE_AUTH_HEADER = 'X-CACHE-AUTH';
    
    /**
     * @return string
     */
    public static function getInstallToolPassword()
    {
        return $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'];
    }
}
