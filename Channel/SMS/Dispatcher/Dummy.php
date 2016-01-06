<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;
use AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException;

/**
 * Class Dummy
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher
 * @author  Andreas Glaser
 */
class Dummy extends Dispatcher
{

    /**
     * @inheritdoc
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