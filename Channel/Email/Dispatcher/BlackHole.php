<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;
use AndreasGlaser\NotifyBundle\Channel\Email\EmailInterface;

/**
 * Class BlackHole
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher
 * @author  Andreas Glaser
 */
class BlackHole extends Dispatcher
{
    /**
     * @inheritdoc
     */
    public function dispatch(EmailInterface $email = null)
    {
        // not much to do here ;)
    }
}