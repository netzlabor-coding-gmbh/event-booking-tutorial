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
 * BookingController
 */
class BookingController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * bookingRepository
     *
     * @var \CO\CoEventbooking\Domain\Repository\BookingRepository
     */
    protected $bookingRepository = null;

    /**
     * eventRepository
     *
     * @var \CO\CoEventbooking\Domain\Repository\EventRepository
     */
    protected $eventRepository = null;

    /**
     * @param \CO\CoEventbooking\Domain\Repository\BookingRepository $bookingRepository
     */
    public function injectBookingRepository(\CO\CoEventbooking\Domain\Repository\BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * @param \CO\CoEventbooking\Domain\Repository\EventRepository $eventRepository
     */
    public function injectEventRepository(\CO\CoEventbooking\Domain\Repository\EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * action new
     *
     * @param \CO\CoEventbooking\Domain\Model\Event $event
     * @TYPO3\CMS\Extbase\Annotation\Validate(param="event", validator="CO\CoEventbooking\Domain\Validator\BookingEventValidator")
     * @return void
     */
    public function newAction(\CO\CoEventbooking\Domain\Model\Event $event)
    {
        $this->view->assign('event', $event);
    }

    /**
     * action create
     *
     * @param \CO\CoEventbooking\Domain\Model\Booking $newBooking
     * @return void
     */
    public function createAction(\CO\CoEventbooking\Domain\Model\Booking $newBooking)
    {
        $newBooking->setNumber($this->bookingRepository->generateNumber());
        $this->bookingRepository->add($newBooking);

        $event = $newBooking->getEvent();
        $event->setTicketAmount($event->getTicketAmount() - 1);
        $this->eventRepository->update($event);

        $this->sendEmail(
            $this->settings['email']['admin'],
            $this->settings['email']['sender'],
            $this->settings['email']['subject'] . ' #' . $newBooking->getNumber(),
            'Admin',
            ['booking' => $newBooking]
        );

        $this->addFlashMessage(
            \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('booking_create.success', $this->request->getControllerExtensionName()),
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::OK
        );

        $this->redirect('success');
    }

    /**
     * @param string $recipient
     * @param string $sender
     * @param string $subject
     * @param string $template
     * @param array $params
     */
    protected function sendEmail(string $recipient, string $sender, string $subject, string $template, array $params)
    {
        $configurationManager = $this->objectManager->get(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::class);
        $extbaseFrameworkConfiguration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);

        $templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPaths'][0]);
        $templatePathAndFilename = $templateRootPath . 'Email/' . $template . '.html';

        $emailView = $this->objectManager->get(\TYPO3\CMS\Fluid\View\StandaloneView::class);
        $emailView->getRequest()->setControllerExtensionName(
            $this->request->getControllerExtensionName()
        );
        $emailView->setTemplatePathAndFilename($templatePathAndFilename);
        $emailView->assignMultiple($params);
        $emailBody = $emailView->render();

        $message = $this->objectManager->get(\TYPO3\CMS\Core\Mail\MailMessage::class);
        $message->setTo($recipient)->setFrom($sender)->setSubject($subject);
        $message->setBody($emailBody, 'text/html');
        $message->send();

        return $message->isSent();
    }

    /**
     * A template method for displaying custom error flash messages, or to
     * display no flash message at all on errors.
     *
     * @return string The flash message or FALSE if no flash message should be set
     */
    protected function getErrorFlashMessage()
    {
        return false;
    }

    /**
     * action success
     *
     * @return void
     */
    public function successAction()
    {
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $bookings = $this->bookingRepository->findAll();
        $this->view->assign('bookings', $bookings);
    }

    /**
     * action edit
     *
     * @param \CO\CoEventbooking\Domain\Model\Booking $booking
     * @ignorevalidation $booking
     * @return void
     */
    public function editAction(\CO\CoEventbooking\Domain\Model\Booking $booking)
    {
        $this->view->assign('booking', $booking);
    }

    /**
     * action update
     *
     * @param \CO\CoEventbooking\Domain\Model\Booking $booking
     * @return void
     */
    public function updateAction(\CO\CoEventbooking\Domain\Model\Booking $booking)
    {
        $this->addFlashMessage('The object was updated.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->bookingRepository->update($booking);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \CO\CoEventbooking\Domain\Model\Booking $booking
     * @return void
     */
    public function deleteAction(\CO\CoEventbooking\Domain\Model\Booking $booking)
    {
        $this->addFlashMessage('The object was deleted.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->bookingRepository->remove($booking);
        $this->redirect('list');
    }
}
