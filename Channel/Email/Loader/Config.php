<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email\Loader;

use AndreasGlaser\NotifyBundle\Channel\Email\Email;
use AndreasGlaser\NotifyBundle\Channel\Email\Loader;
use AndreasGlaser\NotifyBundle\Channel\Email\LoaderException;

/**
 * Class Config
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email\Loader
 * @author  Andreas Glaser
 */
class Config extends Loader
{
    /**
     * @param       $emailAlias
     * @param array $dataBody
     * @param array $dataSubject
     *
     * @return Email|void
     * @throws \AndreasGlaser\NotifyBundle\Channel\Email\LoaderException
     *
     * @author Andreas Glaser
     */
    public function load($emailAlias, array $dataBody = [], array $dataSubject = [])
    {
        $configParameters = $this->container->getParameter('andreas_glaser_notify');

        if (!isset($configParameters['channels']['email']['emails'][$emailAlias])) {
            throw new LoaderException('Email alias not found (' . $emailAlias . '). Please confirm it\'s defined in your config files.');
        }

        $emailConfig = $configParameters['channels']['email']['emails'][$emailAlias];

        if (!$emailConfig['enabled']) {
            throw new LoaderException('Email definition is not enabled.');
        }

        $templateContent = $emailConfig['template_content'] ? $emailConfig['template_content'] : $configParameters['channels']['email']['template_content'];
        $templateLayout = $emailConfig['template_layout'] ? $emailConfig['template_layout'] : $configParameters['channels']['email']['template_layout'];

        $fromName = $emailConfig['from_name'] ? $emailConfig['from_name'] : $configParameters['channels']['email']['from_name'];
        $fromEmail = $emailConfig['from_email'] ? $emailConfig['from_email'] : $configParameters['channels']['email']['from_email'];

        // process subject
        $subject = strtr($emailConfig['subject'], $dataSubject);

        $dataBodyAdded = [
            '_template_layout' => $templateLayout,
            '_subject'         => $subject,
            '_from_name'       => $fromName,
            '_from_email'      => $fromEmail,
        ];

        $email = new Email();
        $email->setSubject($subject);
        $email->setBody(
            $this->container
                ->get('templating')->render(
                    $templateContent,
                    $dataBody + $dataBodyAdded
                )
        );

        if ($fromEmail) {
            $email->setFrom($fromEmail, $fromName);
        }

        foreach ($emailConfig['tos'] AS $to) {
            if ($to['email']) {
                $email->addTo($to['email'], $to['name']);
            }
        }

        foreach ($emailConfig['ccs'] AS $cc) {
            if ($cc['email']) {
                $email->addCc($cc['email'], $cc['name']);
            }
        }

        foreach ($emailConfig['bccs'] AS $bcc) {
            if ($bcc['email']) {
                $email->addBcc($bcc['email'], $bcc['name']);
            }
        }

        foreach ($emailConfig['attachments'] AS $attachment) {
            if ($attachment['path']) {
                $email->addAttachment($attachment['path'], $attachment['contentType']);
            }
        }

        return $email;
    }
}