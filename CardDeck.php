<?php

class CardDeck
{
    protected  $allCards = [];
    protected $cardTypes = [
        'heart',
        'spade',
        'club',
        'diamond'
    ];

    protected $otherValues = [
        'ace',
        'jack',
        'queen',
        'king'
    ];

    protected $lowest = 2;

    public function getCards()
    {
        if (count($this->allCards) < 1 )
        {
            $this->allCards = $this->generateCards();
        }
        return $this->allCards;
    }

    protected function generateCards()
    {
        return array_reduce(array_map(function($type) {
            return array_map(function($value) use ($type) {
                if (is_string($value)) {
                    return [ $type . '_' . $value, 10 ];
                }
                return [ $type . '_' . $value, $value ];
            }, array_merge(range($this->lowest, 10), $this->otherValues));
        }, $this->cardTypes), function($type, $carry) {
            return array_merge($carry, $type);
        }, []);
    }
}
