<?php

class Dealer implements DealerInterface
{
    private $deck;
    public $cards;
    private $storage;

    function __construct(CardDeck $deck, StorageInterface $storage)
    {
        $this->deck = $deck;
        $this->storage = $storage;
    }
    
    function shuffleDeck()
    {
        $this->cards = $this->deck->getCards();
        shuffle($this->cards);
    }

    function giveCard($key)
    {
        if(!$this->cards = null)
        {
            $this->shuffleDeck();
        }
        $cardKey = array_keys($this->cards)[0];
        $chosenCard = $this->cards[$cardKey];
        unset($this->cards[$cardKey]);

        $playerCards = $this->storage->get($key, []);
        array_push($playerCards, $chosenCard);
        $this->storage->set($key, $playerCards);
    }

    //method deal cards
}