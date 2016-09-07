<?php
require_once 'DealerInterface.php';
require_once 'Dealer.php';
require_once 'Game.php';
require_once 'CardDeck.php';

$deck = new CardDeck();
$dealer = new Dealer($deck);
$game = new Game('Blackjack',$dealer);

echo '<pre>';
var_dump($dealer->giveCard());
var_dump($dealer->cards);
var_dump($dealer->giveCard());
var_dump($dealer->giveCard());
var_dump($dealer->giveCard());
var_dump($dealer->giveCard());
var_dump($dealer->giveCard());
var_dump($dealer->giveCard());
var_dump($dealer->cards);