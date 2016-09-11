<?php
require_once 'DealerInterface.php';
require_once 'Dealer.php';
require_once 'Game.php';
require_once 'CardDeck.php';

$deck = new CardDeck();
$dealer = new Dealer($deck);
$game = new Game('Blackjack',$dealer);

$game->giveCard($game->playerCards);
$game->giveCard($game->playerCards);
$game->giveCard($game->dealerCards);
$game->giveCard($game->dealerCards);

echo "<pre>";
var_dump($game->playerCards);
var_dump($game->dealerCards);
echo $game->calcCards($game->playerCards);
echo "<br>";
echo $game->calcCards($game->dealerCards);