<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

/**
 * Interface ShortMessageInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
 * @author  Andreas Glaser
 */
interface ShortMessageInterface
{

    /**
     * @param $text
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function setText($text);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getText();

    /**
     * @param $phoneNumber
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function setRecipientNumber($phoneNumber);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getRecipientNumber();

    /**
     * @param $phoneNumber
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function setSenderNumber($phoneNumber);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getSenderNumber();
}