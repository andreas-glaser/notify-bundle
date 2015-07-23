<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

/**
 * Interface ShortMessageInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
 *
 * @author  Andreas Glaser
 */
interface ShortMessageInterface
{
    public function setText($text);

    public function getText();

    public function setRecipientNumber($phoneNumber);

    public function getRecipientNumber();

    public function setSenderNumber($phoneNumber);

    public function getSenderNumber();
}