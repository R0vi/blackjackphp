<?php

interface StorageInterface
{
    public function get($key, $default);

    public function set($key, $value);
}