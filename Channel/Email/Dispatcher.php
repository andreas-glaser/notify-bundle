<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Dispatcher
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 *
 * @author  Andreas Glaser
 */
class Dispatcher extends ContainerAware implements DispatcherInterface
{
    /**
     * @var EmailInterface
     *
     * @author Andreas Glaser
     */
    protected $email;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * @param EmailInterface $email
     * @return $this
     *
     * @author Andreas Glaser
     */
    public function setEmail(EmailInterface $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param EmailInterface $email
     * @throws DispatcherException
     *
     * @author Andreas Glaser
     */
    public function dispatch(EmailInterface $email = null)
    {
        throw new DispatcherException('This method has to be overwritten as this is only a base class.');
    }
}