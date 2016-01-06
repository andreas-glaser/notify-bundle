<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Dispatcher
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 * @author  Andreas Glaser
 */
class Dispatcher extends ContainerAware implements DispatcherInterface
{
    /**
     * @var EmailInterface
     */
    protected $email;

    /**
     * Dispatcher constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     *
     * @author Andreas Glaser
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @inheritdoc
     */
    public function setEmail(EmailInterface $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function dispatch(EmailInterface $email = null)
    {
        throw new DispatcherException('This method has to be overwritten as this is only a base class.');
    }
}