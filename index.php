<?php
require_once 'DealerInterface.php';
require_once 'Dealer.php';
require_once 'Game.php';
require_once 'CardDeck.php';

$deck = new CardDeck();
$dealer = new Dealer($deck);
$game = new Game('Blackjack',$dealer);

$game->givePlayerCard();
$game->givePlayerCard();
$game->giveDealerCard();
$game->giveDealerCard();

echo "<pre>";
var_dump($dealer->giveCard());
var_dump($game->playerCards);
var_dump($game->dealerCards);
echo $game->calcCards($game->playerCards);
echo "<br>";
echo $game->calcCards($game->dealerCards);