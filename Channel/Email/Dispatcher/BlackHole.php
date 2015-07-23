<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\Email\EmailInterface;
use AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;
use AndreasGlaser\NotifyBundle\Channel\Email\DispatcherException;

/**
 * Class BlackHole
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher
 *
 * @author  Andreas Glaser
 */
class BlackHole extends Dispatcher
{
    /**
     * @param \AndreasGlaser\NotifyBundle\Channel\Email\EmailInterface $email
     *
     * @author Andreas Glaser
     *
     * @return mixed|void
     */
    public function dispatch(EmailInterface $email = null)
    {
        // not much to do here ;)
    }
}