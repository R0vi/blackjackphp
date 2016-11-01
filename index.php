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
    if($game->calcCards('player') > 21)
    {
        echo($game->choseWinner());
    }
}

if(isset($_POST['keepCard']))
{
    $game->dealerBelowMinimum();
    echo($game->choseWinner());
}

if(isset($_POST['startGame']))
{
    $game->startGame();
}

if(isset($_POST['resetGame']))
{
    $game->resetGame();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="logo" class="container">
    <h1><a href="#">Black<span>Jack</span></a></h1>
</div>
<div id="menu" class="container">
    <ul>
        <li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
    </ul>
</div>

<div id="banner" class="container">
    <div class="dealercards" style="">
        <div id="logo"><h1>Dealer cards <span> Total: <?php echo $game->calcCards('dealer') ?></span></h1></div>
        <?php
        foreach($storage->get('dealer') as &$key)
        {
            echo "<img src='svgcardimages/{$key[0]}.svg' alt='{$key[0]}' />";
        }
        ?>
    </div>
    <div class="playercards">
        <div id="logo"><h1>Player cards <span> Total: <?php echo $game->calcCards('player') ?></span></h1></div>
        <?php
        foreach($storage->get('player') as &$key)
        {
            echo "<img src='svgcardimages/{$key[0]}.svg' alt='{$key[0]}' />";
        }
        ?>
    </div>

    <form action="index.php" method="post">
        <input class="button" type="submit" name="giveCard" value="Hit">
        <input class="button" type="submit" name="keepCard" value="Stand">
        <input class="button" type="submit" name="startGame" value="start game">
        <input class="button" type="submit" name="resetGame" value="reset game">
    </form>
</div>
<div id="three-column" class="container">

</div>
</body>
</html>

