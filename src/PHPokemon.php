<?php

class PHPokemon
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getUrl(): string
    {
        return "https://pokeapi.co/api/v2/pokemon/" . $this->name;
    }

    public function getPokeData()
    {
        $data = curl_init($this->getUrl());
        if (curl_errno($data)){
            return false;
        } else {
            curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($data, CURLOPT_SSL_VERIFYPEER, false);
            return json_decode(curl_exec($data));
        }
    }

    public function getSprite()
    {
        $data = $this->getPokeData();
        return $data->sprites->front_default;
    }
}