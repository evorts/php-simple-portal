<?php
/**
 * author: steven
 * date: 4/25/17 9:43 AM
 */

namespace Portal\Common\Model;

class CookieModel
{
    /** @var  string */
    private $name;
    /** @var  string */
    private $value = '';
    /** @var  int */
    private $expired = 0;
    /** @var  string */
    private $domain = '';
    /** @var  string */
    private $path = '/';
    /** @var  bool */
    private $secure = false;
    /** @var  bool */
    private $httpOnly = false;

    /**
     * CookieModel constructor.
     *
     * @param array $params
     */
    public function __construct($params = [])
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $this->{$k} = $v;
            }
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @param int $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return bool
     */
    public function isSecure()
    {
        return $this->secure;
    }

    /**
     * @param bool $secure
     */
    public function setSecure($secure)
    {
        $this->secure = $secure;
    }

    /**
     * @return bool
     */
    public function isHttpOnly()
    {
        return $this->httpOnly;
    }

    /**
     * @param bool $httpOnly
     */
    public function setHttpOnly($httpOnly)
    {
        $this->httpOnly = $httpOnly;
    }

}