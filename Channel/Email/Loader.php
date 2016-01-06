<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Loader
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 * @author  Andreas Glaser
 */
class Loader extends ContainerAware implements LoaderInterface
{

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * Loader constructor.
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
    public function load($emailAlias, array $dataBody = [], array $dataSubject = [])
    {
        throw new \RuntimeException('This methods needs to be extended.');
    }

    /**
     * @inheritdoc
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}