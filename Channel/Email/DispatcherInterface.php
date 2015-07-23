<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Interface DispatcherInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 *
 * @author  Andreas Glaser
 */
interface DispatcherInterface
{
    /**
     * @param EmailInterface $email
     * @return mixed
     *
     * @author Andreas Glaser
     */
    public function setEmail(EmailInterface $email);

    /**
     * @param EmailInterface $email
     * @return mixed
     *
     * @author Andreas Glaser
     */
    public function dispatch(EmailInterface $email = null);
}