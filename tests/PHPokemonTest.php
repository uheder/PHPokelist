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
}