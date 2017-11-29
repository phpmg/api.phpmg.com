<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Zend\Feed\Reader\Reader;

/**
 * Class ArticlesController
 *
 * @package App\Controller
 */
class ArticlesController
{
    use JsonCorsTrait;

    /**
     * @Route("/articles", name="articles.index", methods="GET")
     */
    public function indexAction()
    {
        try {
            $rss = Reader::import('https://medium.com/feed/phpmg-codeshare');
            $response = [];

            foreach ($rss as $item) {
                /** @var \Zend\Feed\Reader\Entry\Rss $item */
                $response[] = [
                    'title' => $item->getTitle(),
                    'author' => $item->getAuthor()['name'],
                    'description' => $item->getDescription(),
                    'link' => $item->getLink(),
                    'pubDate' => $item->getDateCreated(),
                    'categories' => (array) $item->getCategories(),
                ];
            }

            return $this->success($response);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
