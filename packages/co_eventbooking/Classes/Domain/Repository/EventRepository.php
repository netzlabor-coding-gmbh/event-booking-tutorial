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
 * The repository for Events
 */
class EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Returns events greater then specified date.
     * 
     * @param \DateTime $date
     * @return QueryResultInterface|array
     */
    public function findWhereDateGreaterThen(\DateTime $date)
    {
        $query = $this->createQuery();
        $query->matching($query->greaterThan('date', $date->format('Y-m-d H:i:s')));
        $query->setOrderings(['date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }
}
