<?php

class Game
{
    private $name;
    private $dealer;
    private $storage;

    /**
     * Game constructor.
     * @param $name
     * @param Dealer $dealer
     */
    function __construct($name, DealerInterface $dealer, StorageInterface $storage)
    {
        $this->name = $name;
        $this->dealer = $dealer;
        $this->storage = $storage;
    }

    function givePlayerCard()
    {
        $playerCards = $this->storage->get('playerCards', []);
        array_push($playerCards, $this->dealer->giveCard());
        $this->storage->set('playerCards', $playerCards);
    }

    function giveDealerCard()
    {
        $dealerCards = $this->storage->get('dealerCards', []);
        array_push($dealerCards, $this->dealer->giveCard());
        $this->storage->set('dealerCards', $dealerCards);
    }

    function resetGame()
    {
        $this->storage->set('playerCards', []);
        $this->storage->set('dealerCards', []);
    }

    function calcCards($player)
    {
        $buffer = 0;
        for($i=0;$i<count($player);$i++)
        {
            $buffer = $buffer + $player[$i][1];
        }
        return $buffer;
    }

}