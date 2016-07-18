<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;

use AndreasGlaser\NotifyBundle\Channel\Email\Dispatcher;

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
    protected function doDispatch()
    {
        // not much to do here ;)
    }
}