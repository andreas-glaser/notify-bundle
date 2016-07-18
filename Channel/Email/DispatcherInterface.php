<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Interface DispatcherInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 * @author  Andreas Glaser
 */
interface DispatcherInterface
{
    /**
     * @param \AndreasGlaser\NotifyBundle\Channel\Email\EmailInterface $email
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function setEmail(EmailInterface $email);

    /**
     * @param \AndreasGlaser\NotifyBundle\Channel\Email\EmailInterface|null $email
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function dispatch(EmailInterface $email = null);
}