<?php

namespace Documentary\Models;

/**
 * Class Api
 * @author Alain Cao Van Truong <cvt.alain@gmail.com>
 */
class Api
{
    private $path;
    private $data;

    public function __construct($url)
    {
        $this->$path = '../cache/' . md5($url); 
        self::getCache();
    }

    /**
     * @param number $delay
     */
    public function setCache($delay)
    {
        if (file_exists($this->path) && time() - filemtime($this->path) < $delay)
        {
            // Get from cache
            $data = file_get_contents($this->path);
        }
        else
        {
            // Get from API
            $data = json_decode(file_get_contents($url));
            file_put_contents($this->path, json_encode($data));
        }
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}