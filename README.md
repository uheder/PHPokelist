
# Objective

This package is meant to be used for anyone that wants to get a ready to use access to the PokéAPI data.


## How to use this package
To set up a use, you create an object, like so:
```
$bulbasaur = new PHPokemon("bulbasaur");
```
By doing that you'll have now the data from the named pokémon directly from the [PokéAPI](https://pokeapi.co).
```
$bulbasaur ->getAbilities();
```
This line will return an array with the abilities names and their descriptions.
Please note, an ability on a pokémon differs from its moves.

### Disclaimer

This project is not yet completed, it'll be updated with time.
