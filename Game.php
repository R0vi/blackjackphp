<?php

class Game
{
    private $name;
    private $dealer;

    /**
     * Game constructor.
     * @param $name
     * @param Dealer $dealer
     */
    public function __construct($name, DealerInterface $dealer)
    {
        $this->name = $name;
        $this->dealer = $dealer;
    }

    public function createDeck()
    {
      return $this->dealer->shuffleCards(
          $this->dealer->getCards()
      );
    }

    public function getRandomCard($deck)
    {
        $card = array_rand($deck);
        return $card;
    }

    public function giveCards($deck, $player)
    {
        $card = $this->getRandomCard($deck);
        //check of de kaart al gebruikt is.

    }

}