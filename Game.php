<?php

class Game
{
    private $name;
    private $dealer;
    public $playerCards;
    public $dealerCards;

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
    
    function calcCards($playerCards)
    {
        $buffer = 0;
        for($i=0;$i<count($playerCards);$i++)
        {
            $buffer;
        }
    }

}