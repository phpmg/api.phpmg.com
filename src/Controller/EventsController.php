<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EventsController
 *
 * @package App\Controller
 */
class EventsController
{
    use JsonCorsTrait;

    /**
     * @Route("/events", name="events.index", methods="GET")
     */
    public function indexAction()
    {
        try {
            $client = new Client([
                'base_uri' => 'https://api.meetup.com/php-mg/',
            ]);
            $response = $client->get('events', [
                'query' => [
                    'page' => 3,
                    'desc' => true,
                    'status' => 'upcoming,past',
                ],
            ]);

            return $this->success(\GuzzleHttp\json_decode($response->getBody()));
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
