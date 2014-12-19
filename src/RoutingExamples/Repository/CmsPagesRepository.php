<?php

namespace RoutingExamples\Repository;

use RoutingExamples\Model\Page;

class CmsPagesRepository
{
    /**
     * @var string[][]
     */
    private $pages = [
        'home' => [
            'url'     => 'home',
            'title'   => 'Home',
            'content' => 'This is the content!',
        ],
        'contacts' => [
            'url'     => 'contacts',
            'title'   => 'Contact us!',
            'content' => 'This is where you can find our contact form!',
        ],
        'team' => [
            'url'     => 'team',
            'title'   => 'The Team',
            'content' => 'We are awesome \o/',
        ],
    ];

    /**
     * @param string $url
     *
     * @return null|Page
     */
    public function findByUrl($url)
    {
        if (! isset($this->pages[$url])) {
            return null;
        }

        $page = $this->pages[$url];

        return new Page($page['url'], $page['title'], $page['content']);
    }
}
