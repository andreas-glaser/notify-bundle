<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Dispatcher
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 * @author  Andreas Glaser
 */
abstract class Dispatcher implements DispatcherInterface
{
    use ContainerAwareTrait;

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
        if ($email) {
            $this->setEmail($email);
        }

        return $this->doDispatch();
    }

    /**
     * Dispatches email.
     *
     * @return mixed
     * @author Andreas Glaser
     */
    abstract protected function doDispatch();
}