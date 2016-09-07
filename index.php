<?php
require_once 'DealerInterface.php';
require_once 'Phantomlord.php';
require_once 'Dealer.php';
require_once 'Game.php';

$dealer = new Dealer();
$game = new Game('Blackjack',$dealer);

echo '<pre>';
var_dump($game->createDeck());