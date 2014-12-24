<?php

namespace RoutingExamples\Route;

use RoutingExamples\Controller\CmsPageController;
use RoutingExamples\Model\Page;
use RoutingExamples\Repository\CmsPagesRepository;
use Zend\Http\Request as HttpRequest;
use Zend\Mvc\Router\Http\RouteInterface;
use Zend\Mvc\Router\Http\RouteMatch;
use Zend\Stdlib\RequestInterface;

class CmsPagesRoute implements RouteInterface
{
    /**
     * @var CmsPagesRepository
     */
    private $cmsPages;

    /**
     * @var array
     */
    private $assembledParams = [];

    /**
     * @param CmsPagesRepository $cmsPages
     */
    public function __construct(CmsPagesRepository $cmsPages)
    {
        $this->cmsPages = $cmsPages;
    }

    /**
     * {@inheritDoc}
     */
    public function match(RequestInterface $request, $pathOffset = 0)
    {
        if (! $request instanceof HttpRequest) {
            return;
        }

        $pageUrl = substr($request->getUri()->getPath(), $pathOffset);

        if (! isset($pageUrl[0]) || $pageUrl[0] !== '/') {
            return;
        }

        if (! $page = $this->cmsPages->findByUrl(substr($pageUrl, 1))) {
            return;
        }

        $this->assembledParams = ['page' => $page];

        return new RouteMatch(
            [
                'page'       => $page,
                'controller' => CmsPageController::class,
                'action'     => 'index',
            ],
            strlen($pageUrl)
        );
    }

    /**
     * {@inheritDoc}
     */
    public function assemble(array $params = array(), array $options = array())
    {
        if (! isset($params['page'])) {
            throw new \InvalidArgumentException('"page" parameter required to assemble');
        }

        if (! $params['page'] instanceof Page) {
            throw new \InvalidArgumentException(sprintf(
                '"page" parameter must be an instance of ' . Page::class . ', %s given',
                is_object($params['page']) ? get_class($params['page']) : gettype($params['page'])
            ));
        }

        return '/' . $params['page']->getUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function getAssembledParams()
    {
        return $this->assembledParams;
    }

    /**
     * @private
     * @deprecated
     */
    public static function factory($options = array())
    {
        throw new \BadMethodCallException('Unsupported!');
    }
}
