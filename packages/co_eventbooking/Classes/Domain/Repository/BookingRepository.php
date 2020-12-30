<?php
namespace CO\CoEventbooking\Domain\Repository;


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
 * The repository for Bookings
 */
class BookingRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function generateNumber()
    {
        $count = 0;
        do {
            $number = substr(date('Ymd-Hi'), 3) . ($count ? '-' . $count : '');
            $ok = $this->findOneByNumber($number);
        } while ($ok && ++$count);
        return $number;
    }
}
