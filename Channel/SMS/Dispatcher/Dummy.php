<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\SMS\ShortMessageInterface;
use AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException;
use AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;

/**
 * Class Dummy
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher
 *
 * @author  Andreas Glaser
 */
class Dummy extends Dispatcher
{
    /**
     * @throws \AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException
     *
     * @author Andreas Glaser
     */
    public function dispatch()
    {
        $phoneNumber = $this->shortMessage->getRecipientNumber();

        if (empty($phoneNumber)) {
            throw DispatcherException::missingPhoneNumber();
        }

        if (!is_string($phoneNumber)) {
            throw DispatcherException::missingPhoneNumberInvalid();
        }

        $this->logger->info('SMS Dummy: ' . $this->shortMessage->getRecipientNumber() . ': ' . $this->shortMessage->getText());
    }
}