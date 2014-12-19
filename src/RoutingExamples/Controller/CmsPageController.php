<?php

namespace RoutingExamples\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class CmsPageController extends AbstractActionController
{
    public function indexAction()
    {
        die(var_dump($this->params('page')));
    }
}
