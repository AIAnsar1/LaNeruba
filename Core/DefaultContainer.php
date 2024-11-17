<?php

namespace Core;

use League\Container\{Container, ReflectionContainer};
use Psr\Container\ContainerInterface;


class DefaultContainer implements ContainerItnerface
{
    private Container $container;


    public function __construct()
    {
        $this->container = (new Container())->delegate(new ReflectionContainer());
        $this->RegisterDefaultBindings();
    }

    public function get(string $rayId): mixed
    {
        return $this->container->get($rayId);
    }

    public function has(string $rayId): bool
    {
        return $this->container->has($rayId);
    }

    private function RegisterDefaultBindings()
    {

    }


}