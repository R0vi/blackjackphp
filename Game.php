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
        $cards = $this->storage->get($player);
        $buffer = 0;
        $hasAce = false;
        $plusOne = false;
        for($i=0;$i<count($cards);$i++)
        {
            if(strpos($cards[$i][0], 'ace'))
            {
                $hasAce = true;
            }

            $buffer = $buffer + $cards[$i][1];

            if($hasAce == true && $buffer < 21 && strpos($cards[$i][0], 'ace'))
            {
                $buffer = $buffer + 1;
                $plusOne = true;
            }

            if($hasAce == true && $buffer > 21 && $plusOne == true)
            {
                $buffer = $buffer - 10;
            }
            elseif ($hasAce == true && $buffer > 21 && $plusOne == false)
            {
                $buffer = $buffer - 9;
            }
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
        while($this->calcCards('dealer') < 17)
        {
            $this->dealer->giveCard('dealer');
        }
    }

    public function choseWinner()
    {
        $playercards = $this->storage->get('player');
        $dealercards = $this->storage->get('dealer');
        $playerscore = $this->calcCards('player');
        $dealerscore = $this->calcCards('dealer');
        $playerace = false;
        $dealerace = false;
        $playerten = false;
        $dealerten = false;


        if($playerscore < 21 && $dealerscore < 21)
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
        elseif($playerscore == 21 || $dealerscore == 21)
        {
            for($i=0;$i<count($playercards);$i++)
            {
                if(strpos($playercards[$i][0], 'ace'))
                {
                    $playerace = true;
                }
            }
            for($i=0;$i<count($playercards);$i++)
            {
                if($playercards[$i][1] == 10)
                {
                    $playerten = true;
                }
            }
            if($playerace == true && $playerten == true)
            {
                return 'player blackjack';
            }
            for($i=0;$i<count($dealercards);$i++)
            {
                if(strpos($dealercards[$i][0], 'ace'))
                {
                    $dealerace = true;
                }
            }
            for($i=0;$i<count($dealercards);$i++)
            {
                if($dealercards[$i][1] == 10)
                {
                    $dealerten = true;
                }
            }
            if($dealerace == true && $dealerten == true)
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