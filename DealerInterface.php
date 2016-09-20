<?php

interface DealerInterface
{
    public function shuffleDeck();

    public function giveCard($key);
}