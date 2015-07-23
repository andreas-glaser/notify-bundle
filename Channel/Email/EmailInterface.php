<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Interface EmailInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 *
 * @author  Andreas Glaser
 */
interface EmailInterface
{
    public function setSubject($subject);

    public function getSubject();

    public function setBody($body);

    public function getBody();

    public function setFrom($email, $name = null);

    public function getForm();

    public function addTo($email, $name = null);

    public function addTos(array $emails);

    public function removeTo($email);

    public function getTos();

    public function addCc($email, $name = null);

    public function addCcs(array $emails);

    public function removeCc($email);

    public function getCcs();

    public function addBcc($email, $name = null);

    public function addBccs(array $emails);

    public function removeBcc($email);

    public function getBccs();

    public function addAttachment($path, $contentType = null);

    public function addAttachments(array $attachments);

    public function removeAttachment($path);

    public function getAttachments();
}