<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CO.CoEventbooking',
            'Event',
            [
                'Event' => 'list, show',
                'Booking' => 'new, create, success'
            ],
            // non-cacheable actions
            [
                'Event' => '',
                'Booking' => ''
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        event {
                            iconIdentifier = co_eventbooking-plugin-event
                            title = LLL:EXT:co_eventbooking/Resources/Private/Language/locallang_db.xlf:tx_co_eventbooking_event.name
                            description = LLL:EXT:co_eventbooking/Resources/Private/Language/locallang_db.xlf:tx_co_eventbooking_event.description
                            tt_content_defValues {
                                CType = list
                                list_type = coeventbooking_event
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

			$iconRegistry->registerIcon(
				'co_eventbooking-plugin-event',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:co_eventbooking/Resources/Public/Icons/user_plugin_event.svg']
			);

    }
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
