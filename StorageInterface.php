<?php

interface StorageInterface
{
    public function get($key, $default = null);

    public function set($key, $value);
}