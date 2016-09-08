<?php
require_once 'DealerInterface.php';
require_once 'Dealer.php';
require_once 'Game.php';
require_once 'CardDeck.php';

$deck = new CardDeck();
$dealer = new Dealer($deck);
$game = new Game('Blackjack',$dealer);

$dealer->giveCard($game->playerCards);

/*echo '<pre>';
$playerCard1 = $dealer->giveCard();
var_dump($playerCard1[0]);
var_dump($playerCard1[1]);
*/