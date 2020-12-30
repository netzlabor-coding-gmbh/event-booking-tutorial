<?php
namespace CO\CoEventbooking\Domain\Model;


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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * date
     * 
     * @var \DateTime
     */
    protected $date = null;

    /**
     * ticketAmount
     * 
     * @var int
     */
    protected $ticketAmount = 0;

    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * slug
     * 
     * @var string
     */
    protected $slug = '';

    /**
     * place
     * 
     * @var \CO\CoEventbooking\Domain\Model\Place
     */
    protected $place = null;

    /**
     * speaker
     * 
     * @var \CO\CoEventbooking\Domain\Model\Speaker
     */
    protected $speaker = null;

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the date
     * 
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     * 
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the ticketAmount
     * 
     * @return int $ticketAmount
     */
    public function getTicketAmount()
    {
        return $this->ticketAmount;
    }

    /**
     * Sets the ticketAmount
     * 
     * @param int $ticketAmount
     * @return void
     */
    public function setTicketAmount($ticketAmount)
    {
        $this->ticketAmount = $ticketAmount;
    }

    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the place
     * 
     * @return \CO\CoEventbooking\Domain\Model\Place $place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Sets the place
     * 
     * @param \CO\CoEventbooking\Domain\Model\Place $place
     * @return void
     */
    public function setPlace(\CO\CoEventbooking\Domain\Model\Place $place)
    {
        $this->place = $place;
    }

    /**
     * Returns the speaker
     * 
     * @return \CO\CoEventbooking\Domain\Model\Speaker $speaker
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * Sets the speaker
     * 
     * @param \CO\CoEventbooking\Domain\Model\Speaker $speaker
     * @return void
     */
    public function setSpeaker(\CO\CoEventbooking\Domain\Model\Speaker $speaker)
    {
        $this->speaker = $speaker;
    }

    /**
     * Returns the slug
     * 
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     * 
     * @param string $slug
     * @return void
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}
