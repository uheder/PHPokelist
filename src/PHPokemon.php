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

    public function getAbilitiesNames(): array
    {
        $abilityArr = $this->getPokeData()->abilities;
        $abilities = [];
        foreach ($abilityArr as $ability) {
            $abilities[] = $ability->ability->name;
        }
        return $abilities;
    }

    public function getDescriptionByAbilityName(string $ability): string
    {
        $data = curl_init("https://pokeapi.co/api/v2/ability/" . $ability);
        if (curl_errno($data)){
            return false;
        } else {
            curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($data, CURLOPT_SSL_VERIFYPEER, false);

            //gets the array for the effect entries
            $response = json_decode(curl_exec($data));
        }
        $desc = '';
        // gets the effects array in english
        foreach ($response->effect_entries as $effect) {
            if ($effect->language->name == "en") {
                $desc = $effect->short_effect;
            }
        }
        return $desc;
    }

    public function getAbilities(): array
    {
        $abilityNames = $this->getAbilitiesNames();
        $abilities = [];
        foreach ($abilityNames as $ability) {
            $abilities[$ability] = $this->getDescriptionByAbilityName($ability);
        }
        return $abilities;
    }
}