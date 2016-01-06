<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;
use AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException;

/**
 * Class SMSToEmail
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher
 * @author  Andreas Glaser
 */
class SMSToEmail extends Dispatcher
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @param $email
     *
     * @return $this
     * @author Andreas Glaser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     * @author Andreas Glaser
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Echos short message data.
     *
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

        if (empty($this->email)) {
            throw new DispatcherException('Missing email');
        }

        $message = \Swift_Message::newInstance()
            ->setSubject($this->shortMessage->getRecipientNumber())
            ->setTo($this->email)
            ->setBody($this->shortMessage->getText());

        $this->container
            ->get('mailer')
            ->send($message);
    }
}