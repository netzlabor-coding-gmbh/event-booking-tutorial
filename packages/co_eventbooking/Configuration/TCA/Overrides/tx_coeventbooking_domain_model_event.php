<?php
defined('TYPO3_MODE') || die();

call_user_func(function() {
    $GLOBALS['TCA']['tx_coeventbooking_domain_model_event']['columns']['place']['config']['default'] = '';
    $GLOBALS['TCA']['tx_coeventbooking_domain_model_event']['columns']['speaker']['config']['default'] = '';
    $GLOBALS['TCA']['tx_coeventbooking_domain_model_event']['columns']['slug'] = [
        'exclude' => true,
        'label' => 'URL Segment',
        'config' => [
            'type' => 'slug',
            'prependSlash' => false,
            'generatorOptions' => [
                'fields' => ['title'],
                'prefixParentPageSlug' => true,
            ],
            'fallbackCharacter' => '-',
            'eval' => 'uniqueInSite',
        ],
    ];

});
