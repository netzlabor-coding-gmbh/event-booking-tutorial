<?php
namespace CO\CoEventbooking\Controller;


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
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * eventRepository
     * 
     * @var \CO\CoEventbooking\Domain\Repository\EventRepository
     */
    protected $eventRepository = null;

    /**
     * @param \CO\CoEventbooking\Domain\Repository\EventRepository $eventRepository
     */
    public function injectEventRepository(\CO\CoEventbooking\Domain\Repository\EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $events = $this->eventRepository->findWhereDateGreaterThen(new \DateTime('NOW'));
        $this->view->assign('events', $events);
    }

    /**
     * action show
     * 
     * @param \CO\CoEventbooking\Domain\Model\Event $event
     * @return void
     */
    public function showAction(\CO\CoEventbooking\Domain\Model\Event $event)
    {
        $this->view->assign('event', $event);
    }
    protected function getErrorFlashMessage()
    {
        return false;
    }
}
