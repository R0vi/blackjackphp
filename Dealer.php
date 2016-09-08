<?php

class Dealer implements DealerInterface
{
    private $deck;
    public $cards;

    function __construct(CardDeck $deck)
    {
        $this->deck = $deck;
    }
    
    function shuffleDeck()
    {
        $this->cards = $this->deck->getCards();
        shuffle($this->cards);
    }

    function giveCard()
    {
        if(!isset($this->cards))
        {
            $this->shuffleDeck();
        }
        $cardKey = array_keys($this->cards)[0];
        $chosenCard = $this->cards[$cardKey];
        unset($this->cards[$cardKey]);
        return $chosenCard;
    }
}