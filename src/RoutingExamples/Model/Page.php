<?php

namespace RoutingExamples\Model;

class Page
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @param string $url
     * @param string $name
     * @param string $content
     */
    public function __construct($url, $name, $content)
    {
        $this->url     = (string) $url;
        $this->name    = (string) $name;
        $this->content = (string) $content;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    // ...
}
