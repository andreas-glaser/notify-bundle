<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

/**
 * Class DispatcherException
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
 * @author  Andreas Glaser
 */
class DispatcherException extends \RuntimeException
{

    /**
     * @return \AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException
     * @author Andreas Glaser
     */
    public static function missingPhoneNumber()
    {
        return new self('Phone number missing');
    }

    /**
     * @return \AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException
     * @author Andreas Glaser
     */
    public static function missingPhoneNumberInvalid()
    {
        return new self('Phone number invalid');
    }

    /**
     * @return \AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException
     * @author Andreas Glaser
     */
    public static function notDispatched()
    {
        return new self('Dispatch failed.');
    }
}