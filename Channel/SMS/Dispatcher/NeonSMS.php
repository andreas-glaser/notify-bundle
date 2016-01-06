<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher;
use AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException;

/**
 * Class NeonSMS
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher
 *
 * @author  Andreas Glaser
 */
class NeonSMS extends Dispatcher
{
    /**
     * @throws \AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherException
     *
     * @author Andreas Glaser
     */
    public function dispatch()
    {
        // get parameters
        $parameters = $this->container->getParameter('andreas_glaser_notify');

        if (!empty($parameters['channels']['sms']['catch_all_phone_number'])) {
            $recipientPhoneNumber = $parameters['channels']['sms']['catch_all_phone_number'];
        } else {
            $recipientPhoneNumber = $this->shortMessage->getRecipientNumber();
        }

        if (empty($recipientPhoneNumber)) {
            throw DispatcherException::missingPhoneNumber();
        }

        if (!is_string($recipientPhoneNumber)) {
            throw DispatcherException::missingPhoneNumberInvalid();
        }

        $senderPhoneNumber = $this->shortMessage->getSenderNumber();

        if (!empty($parameters['channels']['sms']['sender']['phone_number'])) {
            if (empty($senderPhoneNumber) || $parameters['channels']['sms']['sender']['force_overwrite'] === true) {
                $senderPhoneNumber = $parameters['channels']['sms']['sender']['phone_number'];
            }
        }

        // get http client
        $buzzBrowser = $this->container->get('buzz');

        $url = 'https://api.neonsolutions.ie/sms.php';
        $postData = [
            'user'   => $parameters['channels']['sms']['dispatchers']['neon_sms']['user'],
            'clipwd' => $parameters['channels']['sms']['dispatchers']['neon_sms']['clipwd'],
            'text'   => $this->shortMessage->getText(),
            'to'     => $recipientPhoneNumber,
            'from'   => $senderPhoneNumber,
        ];

        // send HTTP request
        $response = $buzzBrowser->post($url, [], http_build_query($postData));
        $this->logger->info('Neon SMS - Response Body: ' . $response->getContent());

        if (!substr($response->getContent(), 0, mb_strlen('OK:')) === 'OK:') {
            $this->logger->error('Neon SMS: ' . $response->getContent());
            throw new DispatcherException($response->getContent());
        }
    }
}