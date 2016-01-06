<?php

namespace AndreasGlaser\NotifyBundle\Channel\Email;

/**
 * Interface LoaderInterface
 *
 * @package AndreasGlaser\NotifyBundle\Channel\Email
 * @author  Andreas Glaser
 */
interface LoaderInterface
{
    /**
     * @param            $emailAlias
     * @param array|null $dataBody
     * @param array|null $dataSubject
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function load($emailAlias, array $dataBody = null, array $dataSubject = null);

    /**
     * @param array $parameters
     *
     * @return mixed
     * @author Andreas Glaser
     */
    public function setParameters(array $parameters);

    /**
     * @return mixed
     * @author Andreas Glaser
     */
    public function getParameters();
}