<?php
defined('TYPO3_MODE') || die();

//$GLOBALS['TBE_STYLES']['skins'][$_EXTKEY] = array();
//$GLOBALS['TBE_STYLES']['skins'][$_EXTKEY]['name'] = 'BERGWERK Template Styles';
//$GLOBALS['TBE_STYLES']['skins'][$_EXTKEY]['stylesheetDirectories'] = array(
//    'structure' => 'EXT:' . $_EXTKEY . '/Resources/Public/Css/Backend/'
//);

const SMALL_CONFIG = [
    'default' => [
        'title' => 'Default',
        'selectedRatio' => '3:2',
        'allowedAspectRatios' => [
            '3:2' => [
                'title' => '3:2',
                'value' => 3 / 2
            ]
        ]
    ],
];
const DEFAULT_CONFIG = [
    'default' => [
        'title' => 'Default',
        'selectedRatio' => '3:2',
        'allowedAspectRatios' => [
            '3:2' => [
                'title' => '3:2',
                'value' => 3 / 2
            ],
            '2:1' => [
                'title' => '2:1',
                'value' => 2 / 1
            ],
            '16:9' => [
                'title' => '16:9',
                'value' => 16 / 9
            ],
            '1:1' => [
                'title' => '1:1',
                'value' => 1
            ],
            'NaN' => [
                'title' => 'Free',
                'value' => 0.0
            ],
        ]
    ],
];

$GLOBALS['TCA']['pages']['columns']['media']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = [
    'desktop' => [
        'title' => 'Desktop',
        'selectedRatio' => '2:1',
        'allowedAspectRatios' => [
            '2:1' => [
                'title' => '2:1',
                'value' => 2 / 1
            ]
        ]
    ],
    'mobile' => [
        'title' => 'Mobile',
        'selectedRatio' => '1:2',
        'allowedAspectRatios' => [
            '1:2' => [
                'title' => '1:2',
                'value' => 1 / 2
            ]
        ]
    ],
    'homepage' => [
        'title' => 'Homepage',
        'selectedRatio' => '16:9',
        'allowedAspectRatios' => [
            '16:9' => [
                'title' => '16:9',
                'value' => 16 / 9
            ]
        ]
    ],
    'opengraph' => [
        'title' => 'Opengraph',
        'selectedRatio' => '1.91:1',
        'allowedAspectRatios' => [
            '1.91:1' => [
                'title' => '1.91:1',
                'value' => 1.91 / 1
            ]
        ]
    ],
];

unset($GLOBALS['TCA']['tt_content']['types']['media']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']);
$GLOBALS['TCA']['tt_content']['types']['media']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = DEFAULT_CONFIG;

unset($GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']);
$GLOBALS['TCA']['tt_content']['types']['textmedia']['columnsOverrides']['assets']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = DEFAULT_CONFIG;

unset($GLOBALS['TCA']['tt_content']['types']['image']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']);
$GLOBALS['TCA']['tt_content']['types']['image']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = DEFAULT_CONFIG;

unset($GLOBALS['TCA']['tt_content']['types']['textpic']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']);
$GLOBALS['TCA']['tt_content']['types']['textpic']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = DEFAULT_CONFIG;
