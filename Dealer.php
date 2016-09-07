<?php

class Dealer implements DealerInterface
{
    private $deck;
    function __construct(CardDeck $deck)
    {
        $this->deck = $deck;
    }

    function getCards($amount)
    {
        $cards = [];

        for($i = 1;$i < $amount; $i++)
        {
            $cards[] = $this->deck->getRandomCard();
        }
        return $cards;
    }
}