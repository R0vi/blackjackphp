<?php


class Storage implements StorageInterface
{
    public function __construct()
    {
        session_start();
    }

    public function get($key, $default = null)
    {
        if(!array_key_exists($key, $_SESSION))
        {
            return $default;
        }
        return $_SESSION[$key];
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}