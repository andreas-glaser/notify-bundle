<?php

namespace AndreasGlaser\NotifyBundle\Channel\SMS;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

/**
 * Class Dispatcher
 *
 * @package AndreasGlaser\NotifyBundle\Channel\SMS
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

    /**
     * Dispatcher constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \Symfony\Component\HttpKernel\Log\LoggerInterface         $logger
     *
     * @author Andreas Glaser
     */
    public function __construct(ContainerInterface $container, LoggerInterface $logger)
    {
        $this->setContainer($container);
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function setShortMessage(ShortMessageInterface $shortMessage)
    {
        $this->shortMessage = $shortMessage;
    }

    /**
     * @inheritdoc
     */
    public function dispatch()
    {
        throw new \RuntimeException('This call is indented to be overwritten');
    }
}