<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

/**
 * Class ShortMessage
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
 *
 * @author  Andreas Glaser
 */
class ShortMessage implements ShortMessageInterface
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $recipientPhoneNumber;

    /**
     * @var string
     */
    protected $senderPhoneNumber;

    public function __construct($phoneNumber = null, $text = null)
    {
        $this->setRecipientNumber($phoneNumber);
        $this->setText($text);
    }

    /**
     * Simple object factory.
     *
     * @param null $phoneNumber
     * @param null $text
     * @return ShortMessage
     *
     * @author Andreas Glaser
     */
    public static function factory($phoneNumber = null, $text = null)
    {
        return new ShortMessage($phoneNumber, $text);
    }

    /**
     * Sets SMS text
     *
     * @param $text
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Returns SMS text.
     *
     * @return string
     *
     * @author Andreas Glaser
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets recipient phone number.
     *
     * @param $phoneNumber
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setRecipientNumber($phoneNumber)
    {
        $this->recipientPhoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Gets recipient phone number.
     *
     * @return string
     *
     * @author Andreas Glaser
     */
    public function getRecipientNumber()
    {
        return $this->recipientPhoneNumber;
    }

    /**
     * Sets sender phone number.
     *
     * @param $phoneNumber
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setSenderNumber($phoneNumber)
    {
        $this->senderPhoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Gets sender phone number.
     *
     * @return string
     *
     * @author Andreas Glaser
     */
    public function getSenderNumber()
    {
        return $this->senderPhoneNumber;
    }
}