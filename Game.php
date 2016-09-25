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
        $this->storage->set('player', []);
        $this->storage->set('dealer', []);
        $this->storage->set('gamestarted', false);
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

    public function startGame()
    {
        if($this->isStarted())
        {
            return false;
        }
        $this->dealer->giveCard('player');
        $this->dealer->giveCard('player');
        $this->dealer->giveCard('dealer');
        $this->dealer->giveCard('dealer');

        $this->storage->set('gamestarted', true);
        return true;
    }

    protected function isStarted()
    {
        return $this->storage->get('gamestarted', false);
    }

    public function yeXD()
    {
        if($this->calcCards($this->storage->get('dealer')) < 17)
        {
            $this->dealer->giveCard('dealer');
        }
    }
}