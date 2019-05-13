<?php

namespace BERGWERK\Template\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A view helper for creating a svg sprite item
 *
 * = Example =
 * <code>
 * <bwrk:sprite symbol="example" class="example-icon"/>
 * </code>
 *
 * <output>
 * <svg class="sprite sprite--<symbol>">
 *      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="typo3conf/ext/bwrk_template/Resources/Public/Sprite/sprite.svg#example"></use>
 *  </svg>
 * </output>
 */
class SpriteViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;
    
    public function initializeArguments()
    {
        $this->registerArgument('symbol', 'string', 'Name of the Icon', true);
        $this->registerArgument('class', 'string', 'Option Class on SVG Sprite', false);
    }
    
    
    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return mixed|string
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext)
    {
        
        $html = '<svg class="sprite sprite--' . $arguments['symbol'] . ' ' . $arguments['class'] . '">
                   <use xlink:href="typo3conf/ext/template/Resources/Public/dist/assets/sprite/sprite-symbol.svg#' . $arguments['symbol'] . '"></use>
                </svg>';
    
        return $html;
    }
}

