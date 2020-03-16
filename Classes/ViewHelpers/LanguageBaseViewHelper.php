<?php

namespace BERGWERK\Template\ViewHelpers;

use Closure;
use TYPO3\CMS\Core\Context\LanguageAspect;
use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
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
     * @param Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     * @throws SiteNotFoundException
     */
    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {

        /** @var SiteFinder $siteFinder */
        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);

        /** @var LanguageAspect $languageAspect */
        $languageAspect = GeneralUtility::makeInstance(LanguageAspect::class);

        $languageId = $arguments['languageId'];

        if (empty($languageId)) {
            $languageId = $languageAspect->getId();
        }

        /** @var Site $site */
        $site = $siteFinder->getSiteByPageId($arguments['pageId']);

        /** @var SiteFinder $siteFinder */
        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);

        /** @var Site $siteConfiguration */
        $siteConfiguration = $siteFinder->getSiteByIdentifier($site->getIdentifier());

        /** @var SiteLanguage $currentLanguage */
        $currentLanguage = $siteConfiguration->getLanguageById($languageId);

        return $currentLanguage->getBase();
    }
}

