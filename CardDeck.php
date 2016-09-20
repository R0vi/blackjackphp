<?php

class CardDeck
{
    private $allCards = [['Diamond_2', 2], ['Diamond_3', 3], ['Diamond_4', 4], ['Diamond_5', 5], ['Diamond_6', 6], ['Diamond_7', 7], ['Diamond_8', 8], ['Diamond_9', 9], ['Diamond_10', 10], ['Diamond_jack', 10], ['Diamond_queen', 10], ['Diamond_king', 10], ['Diamond_ace', 1],
        ['Heart_2', 2], ['Heart_3', 3], ['Heart_4', 4], ['Heart_5', 5], ['Heart_6', 6], ['Heart_7', 7], ['Heart_8', 8], ['Heart_9', 9], ['Heart_10', 10], ['Heart_jack', 10], ['Heart_queen', 10], ['Heart_king', 10], ['Heart_ace', 1],
        ['Spade_2', 2], ['Hearts_3', 3], ['Spade_4', 4], ['Spade_5', 5], ['Spade_6', 6], ['Spade_7', 7], ['Spade_8', 8], ['Spade_9', 9], ['Spade_10', 10], ['Spade_jack', 10], ['Spade_queen', 10], ['Spade_king', 10], ['Spade_ace', 1],
        ['club_2', 2], ['club_3', 3], ['club_4', 4], ['club_5', 5], ['club_6', 6], ['club_7', 7], ['club_8', 8], ['club_9', 9], ['club_10', 10], ['club_jack', 10], ['club_queen', 10], ['club_king', 10], ['club_ace', 1]];

    public function getCards()
    {
        return $this->allCards;
    }
}