<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Trait JsonCorsTrait
 *
 * @package App\Controller
 */
trait JsonCorsTrait
{
    protected $response = [
        'status' => true,
        'response' => [],
    ];

    protected $headers = [
        'Access-Control-Allow-Origin' => '*',
    ];

    /**
     * @param array|null $data
     * @param int|null $code
     *
     * @return JsonResponse
     */
    public function json(?array $data = [], ?int $code = 200): JsonResponse
    {
        return new JsonResponse($data, $code, $this->headers);
    }

    /**
     * @param array|null $data
     *
     * @return JsonResponse
     */
    public function success(?array $data = []): JsonResponse
    {
        $this->response['response'] = $data;

        return $this->json($this->response);
    }

    /**
     * @param null|string $message
     *
     * @return JsonResponse
     */
    public function error(?string $message = ''): JsonResponse
    {
        $this->response['status'] = false;
        $this->response['response'] = $message;

        return $this->json($this->response);
    }
}
