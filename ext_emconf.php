<?php

/**
 * Extension Manager/Repository config file for ext "template".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Template',
    'description' => 'A TYPO3 CMS Extension for developing a Basic Foundation TYPO3 Template. In this extension shall all necessary files and dependencies for the TYPO3 Website be included.',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'rte_ckeditor' => '11.5.0-11.5.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Bergwerk\\Template\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'BERGWERK',
    'author_email' => 'technik@bergwerk.ag',
    'author_company' => 'BERGWERK',
    'version' => '1.0.0',
];
