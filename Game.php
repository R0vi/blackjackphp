<?php

class Game
{
    private $name;
    private $dealer;
    private $storage;
    
    public function __construct($name, DealerInterface $dealer, StorageInterface $storage)
    {
        $this->name = $name;
        $this->dealer = $dealer;
        $this->storage = $storage;
    }

    
    public function resetGame()
    {
        $this->storage->set('playerCards', []);
        $this->storage->set('dealerCards', []);
    }

    public function calcCards($player)
    {
        $buffer = 0;
        for($i=0;$i<count($player);$i++)
        {
            $buffer = $buffer + $player[$i][1];
        }
        return $buffer;
    }

}