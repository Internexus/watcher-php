<?php

namespace Internexus\Watcher;

class Config
{
    /**
     * API url.
     *
     * @var string
     */
    private $url;

    /**
     * API token.
     *
     * @var string
     */
    private $token;

    /**
     * Constructor.
     *
     * @param  string  $url
     * @param  string  $token
     */
    public function __construct($url, $token)
    {
        $this->setUrl($url);
        $this->token = $token;
    }

    /**
     * Set url.
     *
     * @param  string  $url
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setUrl($url)
    {
        $value = trim($url);

        if (empty($value)) {
            throw new \InvalidArgumentException('Invalid URL');
        }

        $this->url = $url;

        return $this;
    }

    /**
     * Set token.
     *
     * @param  string  $token
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setToken($token)
    {
        $value = trim($token);

        if (empty($value)) {
            throw new \InvalidArgumentException('Token cannot be empty');
        }

        $this->token = $token;

        return $this;
    }

    /**
     * Get URL.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get Token.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
