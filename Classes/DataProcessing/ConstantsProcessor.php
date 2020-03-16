<?php

/*
 * This file is part of the package bk2k/bootstrap-package.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace BERGWERK\Template\DataProcessing;

use TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Minimal TypoScript configuration
 * Assign all available typoscript constants for a key to template view, the
 * default key that is used is `page` and the default variable is `constants`.
 *
 * 10 = BERGWERK\Template\DataProcessing\ConstantsProcessor
 *
 *
 * Advanced TypoScript configuration
 *
 * 10 = BERGWERK\Template\DataProcessing\ConstantsProcessor
 * 10 {
 *   key = page
 *   as = constants
 * }
 */
class ConstantsProcessor implements DataProcessorInterface
{
    /**
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        // The key to process
        $key = $cObj->stdWrapValue('key', $processorConfiguration);
        if (empty($key)) {
            $key = 'page';
        }

        // Collect variables
        $flatConstants = $this->getFlatConstants($key);
        $typoScriptParser = GeneralUtility::makeInstance(TypoScriptParser::class);
        $typoScriptParser->parse($flatConstants);
        $typoScriptArray = $typoScriptParser->setup;
        $constants = $this->convertTypoScriptArrayToPlainArray($typoScriptArray);

        // Set the target variable
        $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration);
        if (!empty($targetVariableName)) {
            $processedData[$targetVariableName] = $constants;
        } else {
            $processedData['constants'] = $constants;
        }

        return $processedData;
    }

    /**
     * @param string $key
     * @return string
     */
    protected function getFlatConstants($key)
    {
        $flatvariables = '';
        $prefix = $key . '.';
        if ($GLOBALS['TSFE']->tmpl->flatSetup === null
            || !is_array($GLOBALS['TSFE']->tmpl->flatSetup)
            || count($GLOBALS['TSFE']->tmpl->flatSetup) === 0) {
            $GLOBALS['TSFE']->tmpl->generateConfig();
        }
        foreach ($GLOBALS['TSFE']->tmpl->flatSetup as $constant => $value) {
            if (strpos($constant, $prefix) === 0) {
                $flatvariables .= substr($constant, strlen($prefix)) . ' = ' . $value . PHP_EOL;
            }
        }
        return $flatvariables;
    }

    /**
     *
     * This method is copied from TYPO3\CMS\Core\TypoScript\TypoScriptService, since the method is marked as internal
     *
     * @param array $typoScriptArray
     *
     * @return array
     *
     */
    public function convertTypoScriptArrayToPlainArray(array $typoScriptArray): array
    {
        foreach ($typoScriptArray as $key => $value) {
            if (substr((string)$key, -1) === '.') {
                $keyWithoutDot = substr((string)$key, 0, -1);
                $typoScriptNodeValue = $typoScriptArray[$keyWithoutDot] ?? null;
                if (is_array($value)) {
                    $typoScriptArray[$keyWithoutDot] = $this->convertTypoScriptArrayToPlainArray($value);
                    if ($typoScriptNodeValue !== null) {
                        $typoScriptArray[$keyWithoutDot]['_typoScriptNodeValue'] = $typoScriptNodeValue;
                    }
                    unset($typoScriptArray[$key]);
                } else {
                    $typoScriptArray[$keyWithoutDot] = null;
                }
            }
        }
        return $typoScriptArray;
    }
}
