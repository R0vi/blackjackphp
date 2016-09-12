<?php
require_once 'DealerInterface.php';
require_once 'Dealer.php';
require_once 'Game.php';
require_once 'CardDeck.php';
require_once 'StorageInterface.php';
require_once 'Storage.php';

$storage = new Storage();
$deck = new CardDeck();
$dealer = new Dealer($deck);
$game = new Game('Blackjack',$dealer, $storage);


$game->giveDealerCard();
$game->giveDealerCard();
$game->givePlayerCard();
$game->givePlayerCard();

echo "<pre>";
var_dump($storage->get('playerCards'));
var_dump($storage->get('dealerCards'));
echo $game->calcCards($storage->get('playerCards'));
echo "<br>";
echo $game->calcCards($storage->get('dealerCards'));