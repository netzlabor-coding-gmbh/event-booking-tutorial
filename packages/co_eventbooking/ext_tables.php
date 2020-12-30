<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'CO.CoEventbooking',
            'Event',
            'Events'
        );

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'CO.CoEventbooking',
                'web', // Make module a submodule of 'web'
                'bookings', // Submodule key
                '', // Position
                [
                    'Booking' => 'list, edit, update, delete',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:co_eventbooking/Resources/Public/Icons/user_mod_bookings.svg',
                    'labels' => 'LLL:EXT:co_eventbooking/Resources/Private/Language/locallang_bookings.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('co_eventbooking', 'Configuration/TypoScript', 'Event Booking');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_coeventbooking_domain_model_event', 'EXT:co_eventbooking/Resources/Private/Language/locallang_csh_tx_coeventbooking_domain_model_event.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_coeventbooking_domain_model_event');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_coeventbooking_domain_model_place', 'EXT:co_eventbooking/Resources/Private/Language/locallang_csh_tx_coeventbooking_domain_model_place.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_coeventbooking_domain_model_place');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_coeventbooking_domain_model_speaker', 'EXT:co_eventbooking/Resources/Private/Language/locallang_csh_tx_coeventbooking_domain_model_speaker.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_coeventbooking_domain_model_speaker');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_coeventbooking_domain_model_booking', 'EXT:co_eventbooking/Resources/Private/Language/locallang_csh_tx_coeventbooking_domain_model_booking.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_coeventbooking_domain_model_booking');

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
