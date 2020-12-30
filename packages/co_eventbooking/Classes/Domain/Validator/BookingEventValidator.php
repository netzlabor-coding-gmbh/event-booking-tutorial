<?php
namespace CO\CoEventbooking\Domain\Validator;

use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;

/***
 *
 * This file is part of the "Event Booking" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020
 *
 ***/

/**
 * The validator for Events on booking page
 */
class BookingEventValidator extends AbstractValidator
{
   protected function isValid($event)
   {
        if ($event->getTicketAmount() < 1) {
            $this->addError('No tickets left.', 1608288906);
            return;
        }

        if ($event->getDate()->format('U') < time()) {
            $this->addError('Event is over.', 1608288913);
            return;
        }
   }
}
