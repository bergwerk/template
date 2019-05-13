<?php

namespace BERGWERK\Template\ViewHelpers;

use TYPO3\CMS\Core\Configuration\SiteConfiguration;
use TYPO3\CMS\Core\Context\LanguageAspect;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;


class LanguageBaseViewHelper extends AbstractViewHelper
{
    public function initializeArguments()
    {
        $this->registerArgument('pageId', 'integer', 'Page Id', true);
        $this->registerArgument('languageId', 'integer', 'Language Uid', false);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     * @throws \TYPO3\CMS\Core\Exception\SiteNotFoundException
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext)
    {

        /** @var SiteFinder $siteFinder */
        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);
        
        /** @var LanguageAspect $languageAspect */
        $languageAspect = GeneralUtility::makeInstance(LanguageAspect::class);

        $languageId = $arguments['languageId'];
        
        if(empty($languageId)) {
            $languageId = $languageAspect->getId();
        }
        
        /** @var Site $site */
        $site = $siteFinder->getSiteByPageId($arguments['pageId']);

        /** @var SiteConfiguration $siteConfigurationManager */
        $siteConfigurationManager = GeneralUtility::makeInstance(SiteConfiguration::class, Environment::getConfigPath() . '/sites');

        $siteConfiguration = $siteConfigurationManager->load($site->getIdentifier());

        $languageKey = array_search($languageId, array_column($siteConfiguration['languages'], 'languageId'));

        $currentLanguage = $siteConfiguration['languages'][$languageKey];

        return $currentLanguage['base'];
    }
}

