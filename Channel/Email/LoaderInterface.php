<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Interface LoaderInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 *
 * @author  Andreas Glaser
 */
interface LoaderInterface
{
    public function load($emailAlias, array $dataBody = null, array $dataSubject = null);

    public function setParameters(array $parameters);

    public function getParameters();
}