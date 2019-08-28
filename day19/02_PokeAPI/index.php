<!DOCTYPE html>
<html>
  <head>
    <title>Web Development</title>
  </head>
  <body>

    <h1>Hello, Pokemon API</h1>

    <div id="result"></div>
    <pre id="all_hits"></pre>

    <!-- import jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- custom application code -->
    <script>

      $(document).ready(function() { //JSON: a string made into an object 

        // the PokeAPI is an API that lets you programmatically get data about Pokemon!
        // it's available here:  https://pokeapi.co/
        // it has many, many functions - let's play around with a few

        // task #1: query the API to learn about Pikachu
        // endpoint:  https://pokeapi.co/api/v2/pokemon/{POKEMON_NAME}

        // Example: make a request to the API to store a hit for this site (id #1)
        $.ajax({
          url: 'https://pokeapi.co/api/v2/pokemon/eevee',
          success: function(data, status) {

            // this will be a huge object of data about this pokemon
            console.log(data);

            // there's a sprites property in here that has image references!  let's add some images
            if (data.sprites) {
              // visit every property in this object
              for (var s in data.sprites) {
                // if it's not null
                if (data.sprites[s]) {
                  var t =  document.createElement('img');
                  t.src = data.sprites[s];
                  document.querySelector('body').appendChild(t);
                }
              }
            }
          },
          error: function(request, data, status)  {
            console.log(data);
          }
        });



      }); // end jQuery document ready function




    </script>


  </body>
</html>
