<?php
declare(strict_types=1);

require 'PHP/Suit.php';
require 'PHP/Card.php';
require 'PHP/Deck.php';
require 'PHP/Blackjack.php';
require 'PHP/Player.php';
require 'PHP/Dealer.php';

session_start();
function checkSession(){
    if(!isset($_SESSION["Game"])){
        $_SESSION["Game"] = new Blackjack();
    }
    return $_SESSION["Game"];
}

$game = checkSession();
$deck = $game->getDeck();
$player= $game->getPlayer();
$dealer = $game->getDealer();

$endGame = false;
$winner = "";

if(isset($_POST["input"])){
    $playerMove = $_POST["input"];
    switch ($playerMove){
        case ("HIT"):
            $player->hit($deck);
            break;
        case ("STAND"):
            $dealer->dealerHit($deck);
            $endGame = true;
            break;
        case ("SURRENDER"):
            $player->surrender();
            $endGame = true;
            break;
        case ("NEW GAME"):
            //start new game
            unset($_SESSION["Game"]);
            $game = checkSession();
            $deck = $game->getDeck();
            $player= $game->getPlayer();
            $dealer = $game->getDealer();
            break;
    }
}
$playerScore = $player->getScore();
$dealerScore= $dealer->getScore();
$playerLost = $player->hasLost();
$dealerLost = $dealer->hasLost();
$playerHasBJ = $player->hasBlackjack();
$dealerHasBJ = $dealer->hasBlackjack();

if ($playerLost==true || $dealerLost==true || $playerHasBJ==true || $dealerHasBJ==true){
    $endGame = true;
}
if ($endGame==true){
    $test = $playerScore - $dealerScore; //to determine a score tie
    //check for dealer win conditions
    if (($playerLost == true || $dealerHasBJ==true || $test<=0) && $dealerLost!=true && $playerHasBJ!=true){
        $winner = "DEALER";
    } else {
        $winner = "PLAYER";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A blackjack game coded using PHP during my training at BeCode">
    <meta name="keywords" content="blackjack, PHP, coding, webdev, junior, BeCode">
    <meta name="author" content="Sven Vander Mierde">
    <title>Blackjack</title>
</head>
<body>
    <div class="row">
        <div class="col">
            <div class="row">
                PLAYER
            </div>
            <div class="row">
                <?php
                    foreach($player->getPlayerCards()as $card){
                        echo $card->getUnicodeCharacter(true);
                        echo ' ';
                    }
                ?>
            </div>
            <div class="row">
                SCORE: <?php echo $player->getScore(); ?>
            </div>
        </div>
        <div class="col">
            <div class="row">
                DEALER
            </div>
            <div class="row">
                <?php
                foreach($dealer->getPlayerCards()as $card){
                    echo $card->getUnicodeCharacter(true);
                    echo ' ';
                }
                ?>
            </div>
            <div class="row">
                SCORE: <?php echo $dealer->getScore();?>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if($endGame==true){ echo $winner . " WINS!";} ?>
    </div>
    <form method="post">
        <button type="submit" name="input" value="HIT" <?php if ($endGame==true){echo 'disabled';} ?>>HIT ME</button>
        <button type="submit" name="input" value="STAND" <?php if ($endGame==true){echo 'disabled';} ?>>STAND</button>
        <button type="submit" name="input" value="SURRENDER" <?php if ($endGame==true){echo 'disabled';} ?>>SURRENDER</button>
        <button type="submit" name="input" value="NEW GAME" <?php if ($endGame!=true){echo 'disabled';} ?>>NEW GAME</button>
    </form>
</body>
</html>
