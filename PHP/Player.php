<?php
declare(strict_types=1);

class Player
{
    public const BJ = 21;
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        $this->cards = [];
        for ($i = 0; $i < 2; $i++)
        {
            $this->hit($deck);
        }
    }

    public function hit(Deck $deck)
    {
        array_push($this->cards, $deck->drawCard());
        if ($this->getScore()>self::BJ){
            $this->lost = true;
        }
    }

    public function surrender()
    {
        $this->lost = true;
    }

    public function getScore(): int
    {
        $playerScore = 0;
        foreach ($this->cards as $card){
            $playerScore += $card->getValue();
        }
        return $playerScore;
    }

    public function hasLost(): bool
    {
        return $this->lost;
    }

    public function stand()
    {
        //should call hit() on $dealer -> leave for now
    }
}