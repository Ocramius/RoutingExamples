<?php

namespace RoutingExamples;

use RoutingExamples\Controller\CmsPageController;
use RoutingExamples\Factory\Route\CmsPagesRouteFactory;
use RoutingExamples\Repository\CmsPagesRepository;
use RoutingExamples\Route\CmsPagesRoute;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return [
            'service_manager' => [
                'invokables' => [
                    CmsPagesRepository::class => CmsPagesRepository::class,
                ],
            ],
            'route_manager' => [
                'factories' => [
                    CmsPagesRoute::class => CmsPagesRouteFactory::class,
                ],
            ],
            'controllers' => [
                'invokables' => [
                    CmsPageController::class => CmsPageController::class,
                ],
            ],
            'router' => [
                'routes' => [
                    'cms' => [
                        'type' => CmsPagesRoute::class,
                    ],
                ],
            ],
        ];
    }
}