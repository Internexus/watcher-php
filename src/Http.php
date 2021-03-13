<?php

namespace Internexus\Watcher;

use GuzzleHttp\Client;
use Internexus\Watcher\Entities\Entity;

class Http
{
    /**
     * GuzzleHttp Client.
     *
     * @var GuzzleHttp\Client
     */
    private $http;

    /**
     * Add an entry to queue.
     *
     * @var array
     */
    private $entities;

    /**
     * Constructor.
     *
     * @param  \Internexus\Watcher\Config  $config
     * @return void
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->http = new Client([
            'base_uri' => $this->config->getUrl(),
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);
    }

    /**
     * Add entity.
     *
     * @param  \Internexus\Watcher\Entities\Entity
     * @return void
     */
    public function addEntity(Entity $entity)
    {
        $this->entities[] = $entity;
    }

    /**
     * Send POST request.
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send()
    {
        $url = 'ingest/' . $this->config->getToken();

        $res = $this->http->request('POST', $url, [
            'json' => [
                'ingest' => $this->entities
            ]
        ]);

        return $res;
    }
}
