<?php

class Dealer implements DealerInterface
{
    private $deck;
    public $cards;
    private $storage;

    public function __construct(CardDeck $deck, StorageInterface $storage)
    {
        $this->deck = $deck;
        $this->storage = $storage;
    }

    public function shuffleDeck()
    {
        $this->cards = $this->deck->getCards();
        shuffle($this->cards);
    }

    public function giveCard($key)
    {
        if(!$this->cards = null)
        {
            $this->shuffleDeck();
        }
        $cardKey = array_keys($this->cards)[0];
        $chosenCard = $this->cards[$cardKey];
        unset($this->cards[$cardKey]);

        $gameCards = $this->storage->get($key, []);
        array_push($gameCards, $chosenCard);
        $this->storage->set($key, $gameCards);
    }
}