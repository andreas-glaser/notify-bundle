<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Interface EmailInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 * @author  Andreas Glaser
 */
interface EmailInterface
{
    /**
     * @param $subject
     *
     * @return string
     * @author Andreas Glaser
     */
    public function setSubject($subject);

    /**
     * @return string
     * @author Andreas Glaser
     */
    public function getSubject();

    /**
     * @param $body
     *
     * @return $this
     * @author Andreas Glaser
     */
    public function setBody($body);

    /**
     * @return string
     * @author Andreas Glaser
     */
    public function getBody();

    /**
     * @param string $email
     * @param string $name
     *
     * @return $this
     * @author Andreas Glaser
     */
    public function setFrom($email, $name = null);

    /**
     * @return string
     * @author Andreas Glaser
     */
    public function getFrom();

    /**
     * @param string $email
     * @param string $name
     *
     * @return $this
     * @author Andreas Glaser
     */
    public function addTo($email, $name = null);

    /**
     * @param array $emails
     *
     * @return $this
     * @author Andreas Glaser
     */
    public function addTos(array $emails);

    /**
     * @param $email
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function removeTo($email);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getTos();

    /**
     * @param      $email
     * @param null $name
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function addCc($email, $name = null);

    /**
     * @param array $emails
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function addCcs(array $emails);

    /**
     * @param $email
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function removeCc($email);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getCcs();

    /**
     * @param      $email
     * @param null $name
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function addBcc($email, $name = null);

    /**
     * @param array $emails
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function addBccs(array $emails);

    /**
     * @param $email
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function removeBcc($email);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getBccs();

    /**
     * @param      $path
     * @param null $contentType
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function addAttachment($path, $contentType = null);

    /**
     * @param array $attachments
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function addAttachments(array $attachments);

    /**
     * @param $path
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function removeAttachment($path);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getAttachments();
}