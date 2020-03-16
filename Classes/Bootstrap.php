<?php

namespace BERGWERK\Template;

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
