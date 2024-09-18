<?php

use PHPUnit\Framework\TestCase;

require_once './src/PHPokemon.php';

class PHPokemonTest extends TestCase
{
    protected PHPokemon $pikachu;
    protected PHPokemon $bulbasaur;

    protected function setUp(): void
    {
        $this->pikachu = new PHPokemon('pikachu');
        $this->bulbasaur = new PHPokemon('bulbasaur');
    }

    public function testGetUrl(): void
    {
        $this->assertEquals('https://pokeapi.co/api/v2/pokemon/pikachu', $this->pikachu->getUrl());
        $this->assertEquals('https://pokeapi.co/api/v2/pokemon/bulbasaur', $this->bulbasaur->getUrl());
    }

    public function testGetPokeData(): void
    {
        $this->assertEquals('pikachu', $this->pikachu->getPokeData()->name);
        $this->assertEquals(25, $this->pikachu->getPokeData()->id);

        $this->assertEquals('bulbasaur', $this->bulbasaur->getPokeData()->name);
        $this->assertEquals(1, $this->bulbasaur->getPokeData()->id);
    }

    public function testGetSprite(): void
    {
        $this->assertEquals('https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png', $this->pikachu->getSprite());
    }

    public function testGetDescriptionByAbilityName(): void
    {
        $this->assertEquals('Has a 30% chance of paralyzing attacking Pokémon on contact.',
            $this->pikachu->getDescriptionByAbilityName('static'));

        $this->assertEquals('Strengthens grass moves to inflict 1.5× damage at 1/3 max HP or less.',
            $this->bulbasaur->getDescriptionByAbilityName('overgrow'));
    }

    public function testGetAbilities(): void
    {
        $this->assertEquals(
            [
                "static" => "Has a 30% chance of paralyzing attacking Pokémon on contact.",
                "lightning-rod" => "Redirects single-target electric moves to this Pokémon where possible.  Absorbs Electric moves, raising Special Attack one stage.",
            ], $this->pikachu->getAbilities());
    }
}