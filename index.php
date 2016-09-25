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

if(isset($_POST['giveCard']))
{
    $dealer->giveCard('player');
}

if(isset($_POST['keepCard']))
{
    // dealers beurt daarna win check
}

if(isset($_POST['startGame']))
{
    $game->startGame();
}

if(isset($_POST['resetGame']))
{
    $game->resetGame();
}


echo "<pre>";
var_dump($storage->get('player'));
var_dump($storage->get('dealer'));
echo $game->calcCards($storage->get('player'));
echo "<br>";
echo $game->calcCards($storage->get('dealer'));

?>
<form action="index.php" method="post">
    <input type="submit" name="giveCard" value="Hit">
    <input type="submit" name="keepCard" value="Stand">
    <input type="submit" name="startGame" value="start game">
    <input type="submit" name="resetGame" value="reset game">
</form>
