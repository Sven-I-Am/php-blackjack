<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;
    
    public function hit(){
        echo 'hit';
    }

    public function surrender(){
        echo 'surrender';
    }

    public function getScore(){
        echo 'getScore';
    }

    public function hasLost(){
        echo 'hasLost';
    }
}