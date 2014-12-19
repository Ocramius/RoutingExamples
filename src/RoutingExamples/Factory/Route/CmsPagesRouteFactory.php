<?php

namespace RoutingExamples\Factory\Route;

use RoutingExamples\Repository\CmsPagesRepository;
use RoutingExamples\Route\CmsPagesRoute;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CmsPagesRouteFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return CmsPagesRoute
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $serviceLocator \Zend\ServiceManager\AbstractPluginManager */
        /* @var $cmsPagesRepository CmsPagesRepository */
        $cmsPagesRepository = $serviceLocator->getServiceLocator()->get(CmsPagesRepository::class);

        return new CmsPagesRoute($cmsPagesRepository);
    }
}
