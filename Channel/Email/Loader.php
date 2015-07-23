<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Loader
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 *
 * @author  Andreas Glaser
 */
class Loader extends ContainerAware implements LoaderInterface
{
    protected $parameters = [];

    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    public function load($emailAlias, array $dataBody = [], array $dataSubject = [])
    {
        throw new \RuntimeException('This methods needs to be extended.');
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}