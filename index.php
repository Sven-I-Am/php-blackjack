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
function checkRound(){
    if(!isset($_SESSION["chips"])){
        $_SESSION["chips"] = 100;
    }
    return $_SESSION["chips"];
}

$game = checkSession();
$deck = $game->getDeck();
$player= $game->getPlayer();
$dealer = $game->getDealer();


$endGame = false;
$endRound = false;
$winner = "";

if(isset($_POST["input"])){
    $playerMove = $_POST["input"];
    switch ($playerMove){
        case("BET"):
            $_SESSION["chips"]-=5;
            $player->bet();
            break;
        case ("HIT"):
            $player->hit($deck);
            break;
        case ("STAND"):
            $dealer->dealerHit($deck);
            $endRound = true;
            break;
        case ("SURRENDER"):
            $player->surrender();
            $endRound = true;
            break;
        case ("NEW ROUND"):
            //start next round
            unset($_SESSION["Game"]);
            $game = checkSession();
            $chips= checkRound();
            $deck = $game->getDeck();
            $player= $game->getPlayer();
            $dealer = $game->getDealer();
            break;
        case ("NEW GAME"):
            unset($_SESSION["Game"]);
            unset($_SESSION["chips"]);
            $game = checkSession();
            $chips = checkRound();
            $deck = $game->getDeck();
            $player= $game->getPlayer();
            $dealer = $game->getDealer();
            break;
    }
}

$canBet = $player->getBet();
$playerScore = $player->getScore();
$dealerScore= $dealer->getScore();
$playerLost = $player->hasLost();
$dealerLost = $dealer->hasLost();
$playerHasBJ = $player->hasBlackjack();
$dealerHasBJ = $dealer->hasBlackjack();

if ($playerLost==true || $dealerLost==true || $playerHasBJ==true || $dealerHasBJ==true){
    $endRound = true;
}
if ($endRound==true){
    $test = $playerScore - $dealerScore; //to determine a score tie
    //check for dealer win conditions
    if (($playerLost == true || $dealerHasBJ==true || $test<=0) && $dealerLost!=true && $playerHasBJ!=true){
        $winner = "DEALER";
        $haveWinner=true;
    } elseif($dealerHasBJ==true && $playerHasBJ==true) {
        $haveWinner = false;
    } else {
        $winner = "PLAYER";
        $haveWinner = true;
        $_SESSION["chips"] += 10;
    }
}

$chips = checkRound();
if ($_SESSION["chips"] == 0){
    $endGame = true;
    $endRound = false;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blackjack</title>
</head>
<body>
    <div class="row text-center">
        <div class="col">
            <div class="row">
                <H2>PLAYER</H2>
            </div>
            <div class="row">
                <?php
                    foreach($player->getPlayerCards()as $card){
                        echo $card->getUnicodeCharacter(true);
                    }
                ?>
            </div>
            <div class="row">
                <p>SCORE: <?php echo $player->getScore(); ?></p>
            </div>
            <div class="row">
                <p>CHIPS: <?php echo $chips; ?></p>

            </div>
        </div>
        <div class="col">
            <div class="row">
                <H2>DEALER</H2>
            </div>
            <div class="row">
                <?php
                foreach($dealer->getPlayerCards()as $card){
                    echo $card->getUnicodeCharacter(true);
                }
                ?>
            </div>
            <div class="row">
                <p>SCORE: <?php echo $dealer->getScore();?></p>
            </div>
        </div>

        <form method="post">
            <button type="submit" name="input" value="BET" <?php if ($canBet!=true){echo 'disabled';} ?>>BET 5</button>
            <button type="submit" name="input" value="HIT" <?php if ($endRound==true || $canBet==true){echo 'disabled';} ?>>HIT ME</button>
            <button type="submit" name="input" value="STAND" <?php if ($endRound==true || $canBet==true){echo 'disabled';} ?>>STAND</button>
            <button type="submit" name="input" value="SURRENDER" <?php if ($endRound==true){echo 'disabled';} ?>>SURRENDER</button>
            <button type="submit" name="input" value="NEW ROUND" <?php if ($endRound!=true){echo 'disabled';} ?>>NEXT ROUND</button>
            <button type="submit" name="input" value="NEW GAME">NEW GAME</button>
        </form>

        <div class="row">

            <h2 class="alert<?php if($winner=="PLAYER"){ echo ' alert-success';}elseif($winner=="DEALER"){echo ' alert-danger';}?>"><?php if($endRound==true && $haveWinner==true){ echo $winner . " WINS!";} elseif($endRound==true && $haveWinner==false){echo "IT'S A TIE";} ?></h2>
        </div>
    </div>
</body>
</html>
