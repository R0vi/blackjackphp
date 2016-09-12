<?php

class Game
{
    private $name;
    private $dealer;
    public $playerCards = [];
    public $dealerCards = [];

    /**
     * Game constructor.
     * @param $name
     * @param Dealer $dealer
     */
    function __construct($name, DealerInterface $dealer)
    {
        $this->name = $name;
        $this->dealer = $dealer;
    }

    function givePlayerCard()
    {
        array_push($playerCards, $this->dealer->giveCard());
    }

    function giveDealerCard()
    {
        array_push($dealerCards, $this->dealer->giveCard());
    }

    function resetGame()
    {
        $this->playerCards = null;
        $this->dealerCards = null;
    }

    function calcCards($player)
    {
        $buffer = 0;
        for($i=0;$i<count($player);$i++)
        {
            $buffer = $buffer + $player[$i];
        }
        return $buffer;
    }

}