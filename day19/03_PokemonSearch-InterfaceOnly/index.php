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






      }); // end jQuery document ready function




    </script>


  </body>
</html>
