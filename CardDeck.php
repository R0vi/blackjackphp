<?php

class CardDeck
{
    private $allCards = ['Diamond_2', 'Diamond_3', 'Diamond_4', 'Diamond_ 5', 'Diamond_ 6', 'Diamond_ 7', 'Diamond_ 8', 'Diamond_ 9', 'Diamond_ 10', 'Diamond_ jack', 'Diamond_ queen', 'Diamond_ king', 'Diamond_ ace',
        'Heart_2', 'Heart_3', 'Heart_4', 'Heart_ 5', 'Heart_ 6', 'Heart_ 7', 'Heart_ 8', 'Heart_ 9', 'Heart_ 10', 'Heart_ jack', 'Heart_ queen', 'Heart_ king', 'Heart_ ace',
        'Spade_2', 'Hearts_3', 'Spade_4', 'Spade_ 5', 'Spade_ 6', 'Spade_ 7', 'Spade_ 8', 'Spade_ 9', 'Spade_ 10', 'Spade_ jack', 'Spade_ queen', 'Spade_ king', 'Spade_ ace',
        'club_2', 'club_3', 'club_4', 'club_ 5', 'club_ 6', 'club_ 7', 'club_ 8', 'club_ 9', 'club_ 10', 'club_ jack', 'club_ queen', 'club_ king', 'club_ ace'];

    function getRandomCard()
    {
        shuffle($this->allCards);
        $card = $this->allCards[0];
        unset($this->allCards[0]);
        return $card;
    }
}