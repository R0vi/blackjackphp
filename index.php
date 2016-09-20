<?php
require_once 'DealerInterface.php';
require_once 'Dealer.php';
require_once 'Game.php';
require_once 'CardDeck.php';
require_once 'StorageInterface.php';
require_once 'Storage.php';

$storage = new Storage();
$deck = new CardDeck();
$dealer = new Dealer($deck, $storage);
$game = new Game('Blackjack',$dealer, $storage);


$dealer->giveCard("player");
$dealer->giveCard("player");
$dealer->giveCard("dealer");
$dealer->giveCard("dealer");

echo "<pre>";
var_dump($storage->get('player'));
var_dump($storage->get('dealer'));
echo $game->calcCards($storage->get('playerCards'));
echo "<br>";
echo $game->calcCards($storage->get('dealerCards'));