<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

/**
 * Interface DispatcherInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
 * @author  Andreas Glaser
 */
interface DispatcherInterface
{
    /**
     * @param \AndreasGlaser\NotifyBundle\Channel\SMS\ShortMessageInterface $shortMessage
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function setShortMessage(ShortMessageInterface $shortMessage);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function dispatch();
}