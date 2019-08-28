<!DOCTYPE html>
<html>
  <head>
    <title>Web Development</title>
  </head>
  <body>

    <h1>In Class</h1>

    <!-- import jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <div id="results">
      <h2 id="pokemon"></h2>
      <img id="image">
    </div>
    <div id="vc"></div>

    <input type="text" id="query"><button id="submit">Search</button>
    <br>
    <div id="player"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously
      //    this needs to happen because as soon as this script loads it will trigger
      //    an event indicating that it is ready to go, and we need to be ready to
      //    handle that event in our code
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '600',
          width: '800',
          videoId: 'KLHRjaUBb3o',
          playerVars: { 'autoplay':1, 'controls':0 },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    (inspect event.data to see the current state of the video)
      function onPlayerStateChange(event) {
      }

      $(document).ready(function() {

        document.getElementById('submit').onclick = function() {
          // get the thing they want to search for
          var thing = document.getElementById('query').value;

          var apiKey = 'AIzaSyDHV733Sclmb297uyMfc5nyAaL_bKWtCkI';

          $.ajax({
            url: 'https://pokeapi.co/api/v2/pokemon/' + thing,
            success: function(data, status) {
              console.log(data);

              // set the results panel to hold our custom info
              document.getElementById('pokemon').innerHTML = data.name;
              document.getElementById('image').src = data.sprites.front_default;

              // init an ajax request to google to get a list of related videos to this pokemon
              $.ajax({
                url: 'https://www.googleapis.com/youtube/v3/search',
                type: 'GET',
                data: {
                  part: 'snippet',
                  q: thing,
                  key: apiKey
                },
                success: function(data, status) {
                  console.log(data);

                  var vc = document.getElementById('vc');
                  while (vc.children.length > 0) {
                    vc.removeChild(vc.children[0]);
                  }

                  for (var i = 0; i < data.items.length; i++) {
                    console.log(data.items[i]);

                    var img = document.createElement('img');
                    img.dataset.vid = data.items[i].id.videoId;
                    img.src = data.items[i].snippet.thumbnails.default.url;

                    img.onclick = function(event) {
                      console.log(event.currentTarget.dataset.vid);
                      player.loadVideoById(event.currentTarget.dataset.vid);
                      player.playVideo();
                    }
                    document.getElementById("vc").appendChild(img);
                  }
                }
              });
            }
          });

        }

      }); // end jQuery document ready function

    </script>


  </body>
</html>
