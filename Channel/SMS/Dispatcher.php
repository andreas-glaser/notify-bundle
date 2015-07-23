<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

use AndreasGlaser\NotifyBundle\Channel\SMS\DispatcherInterface;
use AndreasGlaser\NotifyBundle\Channel\SMS\ShortMessageInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

/**
 * Class Dummy
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS\Dispatcher
 *
 * @author  Andreas Glaser
 */
class Dispatcher extends ContainerAware implements DispatcherInterface
{
    /**
     * @var \Symfony\Component\HttpKernel\Log\LoggerInterface
     *
     * @author Andreas Glaser
     */
    protected $logger;

    /**
     * @var ShortMessageInterface
     *
     * @author Andreas Glaser
     */
    protected $shortMessage;

    public function __construct(ContainerInterface $container, LoggerInterface $logger)
    {
        $this->setContainer($container);
        $this->logger = $logger;
    }

    /**
     * @param ShortMessageInterface $shortMessage
     *
     * @author Andreas Glaser
     */
    public function setShortMessage(ShortMessageInterface $shortMessage)
    {
        $this->shortMessage = $shortMessage;
    }

    /**
     * @throws \RuntimeException
     *
     * @author Andreas Glaser
     */
    public function dispatch()
    {
        throw new \RuntimeException('This call is indented to be overwritten');
    }
}