<!DOCTYPE html>
<html>
  <head>
    <title>Web Development</title>
    <style>
      #result {
        display: none;
      }

      #error {
        display: none;
      }

    </style>
  </head>
  <body>

    <h1>Pokemon Search</h1>

    <div id="form">
      Search for a Pokemon: <input type="text" id="query"><button id="search">Search</button>
    </div>

    <h3 id="error">This Pokemon doesn't exist</h3>

    <div id="result">
      <h3 id="pokemon_name"></h3>
      <img src="#" id="pokemon_image">

      <h4>Type(s)</h4>
      <ul id="pokemon_types">
      </ul>

      <h4>Abilities</h4>
      <ul id="pokemon_abilities">
      </ul>
    </div>

    <!-- import jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- custom application code -->
    <script>

      $(document).ready(function() {

        // some DOM references
        var query = document.getElementById('query');
        var search = document.getElementById('search');
        var error = document.getElementById('error');
        var result = document.getElementById('result');
        var pokemon_name = document.getElementById('pokemon_name');
        var pokemon_image = document.getElementById('pokemon_image');
        var pokemon_types = document.getElementById('pokemon_types');
        var pokemon_abilities = document.getElementById('pokemon_abilities');

        // listen for searches
        search.addEventListener('click', function(event) {

          // hide the error and result divs
          error.style.display = 'none';
          result.style.display = 'none';

          // query the PokeAPI for info about this pokemon
          $.ajax({
            url: 'https://pokeapi.co/api/v2/pokemon/'+query.value,
            success: function(data, status) {
              console.log(data);
              result.style.display = 'block';
              pokemon_name.innerHTML = data.name;
              pokemon_image.src = data.sprites.front_default;

              while (pokemon_types.children.length > 0) {
                pokemon_types.removeChild( pokemon_types.children[0]);
              }
              for (var i = 0; i < data.types.length; i++) {
                var t = document.createElement('li');
                t.innerHTML = data.types[i].type.name;
                pokemon_types.appendChild(t);
              }

              while (pokemon_abilities.children.length > 0) {
                pokemon_abilities.removeChild( pokemon_abilities.children[0]);
              }
              for (var i = 0; i < data.abilities.length; i++) {
                var t = document.createElement('li');
                t.innerHTML = data.abilities[i].ability.name;
                pokemon_abilities.appendChild(t);
              }

            },
            error: function(req, data, status) {
              console.log("error");
              error.style.display = 'block';
            }
          });

        });




      }); // end jQuery document ready function




    </script>


  </body>
</html>
