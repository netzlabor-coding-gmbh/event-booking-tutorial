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
 * Booking
 */
class Booking extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * number
     * 
     * @var string
     */
    protected $number = '';

    /**
     * gender
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmptyValidator")
     */
    protected $gender = '';

    /**
     * firstName
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmptyValidator")
     * @TYPO3\CMS\Extbase\Annotation\Validate("StringLength", options={"minimum": 2, "maximum": 15})
     */
    protected $firstName = '';

    /**
     * lastName
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmptyValidator")
     * @TYPO3\CMS\Extbase\Annotation\Validate("StringLength", options={"minimum": 2, "maximum": 15})
     */
    protected $lastName = '';

    /**
     * email
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmptyValidator")
     */
    protected $email = '';

    /**
     * dsgvo
     * 
     * @var bool
     * @TYPO3\CMS\Extbase\Annotation\Validate("BooleanValidator", options={"is": true})
     */
    protected $dsgvo = false;

    /**
     * event
     * 
     * @var \CO\CoEventbooking\Domain\Model\Event
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmptyValidator")
     * @TYPO3\CMS\Extbase\Annotation\Validate("CO\CoEventbooking\Domain\Validator\BookingEventValidator")
     */
    protected $event = null;

    /**
     * Returns the number
     * 
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the number
     * 
     * @param string $number
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Returns the gender
     * 
     * @return string $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     * 
     * @param string $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Returns the firstName
     * 
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     * 
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastName
     * 
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     * 
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the dsgvo
     * 
     * @return bool $dsgvo
     */
    public function getDsgvo()
    {
        return $this->dsgvo;
    }

    /**
     * Sets the dsgvo
     * 
     * @param bool $dsgvo
     * @return void
     */
    public function setDsgvo($dsgvo)
    {
        $this->dsgvo = $dsgvo;
    }

    /**
     * Returns the boolean state of dsgvo
     * 
     * @return bool
     */
    public function isDsgvo()
    {
        return $this->dsgvo;
    }

    /**
     * Returns the event
     * 
     * @return \CO\CoEventbooking\Domain\Model\Event $event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets the event
     * 
     * @param \CO\CoEventbooking\Domain\Model\Event $event
     * @return void
     */
    public function setEvent(\CO\CoEventbooking\Domain\Model\Event $event)
    {
        $this->event = $event;
    }
}
