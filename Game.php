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

    public function dealerBelowMinimum()
    {
        while($this->calcCards($this->storage->get('dealer')) < 17)
        {
            $this->dealer->giveCard('dealer');
        }
    }

    public function choseWinner()
    {
        $playercards = $this->storage->get('player');
        $dealercards = $this->storage->get('dealer');
        $playerscore = $this->calcCards($playercards);
        $dealerscore = $this->calcCards($dealercards);

        if($playerscore < 21)
        {
            if($playerscore > $dealerscore)
            {
                return 'player wins';
            }
            elseif($dealerscore > $playerscore)
            {
                return 'dealer wins';
            }
            elseif($playerscore == $dealerscore)
            {
                return 'draw';
            }
        }
        elseif($playerscore == 21)
        {
            if(in_array('ace', $playercards) && in_array(10, $playercards))
            {
                return 'player blackjack';
            }
            if(in_array('ace', $dealercards) && in_array(10, $dealercards))
            {
                return 'dealer blackjack';
            }
        }
        elseif($dealerscore > 21)
        {
            return 'player wins';
        }
        else
        {
            return 'dealer wins';
        }
    }
}