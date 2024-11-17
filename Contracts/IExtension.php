<?php


namespace Contracts;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

interface IExtension extends IConfigurable, EventSubscriberInterface
{

}