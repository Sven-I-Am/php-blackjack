<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck){
        $this->cards = [];
        for ($i = 0; $i < 2; $i++)
        {
            array_push($this->cards, $deck->drawCard());
        }
    }

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