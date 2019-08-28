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

      <h4>Videos</h4>
      <div id="videos"></div>
      <div id="player"></div>
    </div>


    <!-- import jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- custom application code -->
    <script>

      // YouTube iframe API
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '600',
          width: '800',
          videoId: 'dQw4w9WgXcQ',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      function onPlayerReady(event) {
      }

      function onPlayerStateChange(event) {
      }




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
        var videos = document.getElementById('videos');

        // YouTube API key (put yours here)
        // get your credentials:
        // 1. visit https://console.developers.google.com
        // 2. click on  'credentials'
        // 3. click the 'create credentials' drop down and select 'API key'
        var apiKey = 'AIzaSyDHV733Sclmb297uyMfc5nyAaL_bKWtCkI';

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

              // also query the YouTube search API to find youtube videos about this pokemon
              while (videos.children.length > 0) {
                videos.removeChild( videos.children[0]);
              }

              // initiate a search for a video
              $.ajax({
                url: 'https://www.googleapis.com/youtube/v3/search',
                type: 'GET',
                data: {
                  part: 'snippet',
                  q: query.value,
                  key: apiKey
                },
                success: function(data, status) {
                  console.log(data);
                  document.getElementById('player').style.display = 'none';
                  // if some items came back from the search
                  if (data.items) {
                    // loop over the items and display their thumbnails
                    for (var i =  0; i < data.items.length; i++) {
                      console.log(data.items[i].snippet.thumbnails.default);
                      var img = document.createElement('img');
                      img.src = data.items[i].snippet.thumbnails.default.url;
                      img.width = data.items[i].snippet.thumbnails.default.width;
                      img.height = data.items[i].snippet.thumbnails.default.height;
                      img.dataset.videoId = data.items[i].id.videoId;
                      img.onclick = function(event) {
                        document.getElementById('player').style.display = 'block';
                        player.loadVideoById(event.currentTarget.dataset.videoId);
                        player.playVideo();
                      }
                      videos.appendChild(img);
                    }
                  }
                },
                error: function(request, data, status) {
                  console.log(data);
                }
              });




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
