<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;
use AndreasGlaser\NotifyBundle\Channel\Email\DispatcherException;
use AndreasGlaser\NotifyBundle\Channel\Email\EmailInterface;
use Swift_Message;

/**
 * Class Symfony
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher
 * @author  Andreas Glaser
 */
class Symfony extends Dispatcher
{
    /**
     * @inheritdoc
     */
    public function dispatch(EmailInterface $email = null)
    {
        if ($email) {
            $this->setEmail($email);
        }

        if (!$this->email instanceof EmailInterface) {
            throw new DispatcherException('Email not set');
        }

        $from = $this->email->getFrom();

        // build email
        $message = Swift_Message::newInstance()
            ->setSubject($this->email->getSubject())
            ->setFrom($from['email'], $from['name']);

        foreach ($this->email->getTos() AS $to) {
            $message->addTo($to['email'], $to['name']);
        }

        foreach ($this->email->getCcs() AS $cc) {
            $message->addCc($cc['email'], $cc['name']);
        }

        foreach ($this->email->getBccs() AS $bcc) {
            $message->addBcc($bcc['email'], $bcc['name']);
        }

        $message->setBody($this->email->getBody(), 'text/html', 'UTF-8');

        foreach ($this->email->getAttachments() AS $path => $contentType) {
            $message->attach(\Swift_Attachment::fromPath($path, $contentType));
        }

        // send email
        $this->container
            ->get('mailer')
            ->send($message);
    }
}