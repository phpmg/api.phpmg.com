<?php

namespace App\Controller;

use Symfony\Component\DependencyInjection\Container;

/**
 * Class BaseController
 *
 * @package App\Controller
 */
class BaseController
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * BaseController constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {

        $this->container = $container;
    }
}
