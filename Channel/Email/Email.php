<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Class Email
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 *
 * @author  Andreas Glaser
 */
class Email implements EmailInterface
{
    protected $subject;

    protected $body;

    protected $from = [];

    protected $tos = [];

    protected $ccs = [];

    protected $bccs = [];

    protected $attachments = [];

    /**
     * @param $subject
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return mixed
     *
     * @author Andreas Glaser
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param $body
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return mixed
     *
     * @author Andreas Glaser
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param      $email
     * @param null $name
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setFrom($email, $name = null)
    {
        $this->from['email'] = $email;
        $this->from['name'] = $name;

        return $this;
    }

    /**
     * @return array
     *
     * @author Andreas Glaser
     */
    public function getForm()
    {
        return $this->from;
    }

    /**
     * @param      $email
     * @param null $name
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addTo($email, $name = null)
    {
        $this->tos[$email] = [];
        $this->tos[$email]['email'] = $email;
        $this->tos[$email]['name'] = $name;

        return $this;
    }

    /**
     * @param array $emails
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addTos(array $emails)
    {
        foreach ($emails AS $email => $name) {
            $this->addTo($email, $name);
        }

        return $this;
    }

    /**
     * @param $email
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function removeTo($email)
    {
        unset($this->tos[$email]);

        return $this;
    }

    /**
     * @return array
     *
     * @author Andreas Glaser
     */
    public function getTos()
    {
        return $this->tos;
    }

    /**
     * @param      $email
     * @param null $name
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addCc($email, $name = null)
    {
        $this->ccs[$email] = [];
        $this->ccs[$email]['email'] = $email;
        $this->ccs[$email]['name'] = $name;

        return $this;
    }

    /**
     * @param array $emails
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addCcs(array $emails)
    {
        foreach ($emails AS $email => $name) {
            $this->addCc($email, $name);
        }

        return $this;
    }

    /**
     * @param $email
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function removeCc($email)
    {
        unset($this->ccs[$email]);

        return $this;
    }

    /**
     * @return array
     *
     * @author Andreas Glaser
     */
    public function getCcs()
    {
        return $this->ccs;
    }

    /**
     * @param      $email
     * @param null $name
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addBcc($email, $name = null)
    {
        $this->bccs[$email] = [];
        $this->bccs[$email]['email'] = $email;
        $this->bccs[$email]['name'] = $name;

        return $this;
    }

    /**
     * @param array $emails
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addBccs(array $emails)
    {
        foreach ($emails AS $email => $name) {
            $this->addBcc($email, $name);
        }

        return $this;
    }

    /**
     * @param $email
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function removeBcc($email)
    {
        unset($this->bccs[$email]);

        return $this;
    }

    /**
     * @return array
     *
     * @author Andreas Glaser
     */
    public function getBccs()
    {
        return $this->bccs;
    }

    /**
     * @param      $path
     * @param null $contentType
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addAttachment($path, $contentType = null)
    {
        $this->attachments[$path] = $contentType;

        return $this;
    }

    /**
     * @param array $attachments
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function addAttachments(array $attachments)
    {
        foreach ($attachments AS $path => $contentType) {
            $this->addAttachment($path, $contentType);
        }

        return $this;
    }

    /**
     * @param $path
     *
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function removeAttachment($path)
    {
        unset($this->attachments[$path]);

        return $this;
    }

    /**
     * @return array
     *
     * @author Andreas Glaser
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
}