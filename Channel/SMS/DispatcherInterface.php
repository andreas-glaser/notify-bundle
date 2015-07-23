<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

/**
 * Interface DispatcherInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
 *
 * @author  Andreas Glaser
 */
interface DispatcherInterface
{
    public function setShortMessage(ShortMessageInterface $shortMessage);

    public function dispatch();
}