<!DOCTYPE html>
<html>
  <head>
    <title>Web Development</title>
  </head>
  <body>

    <h1>Hello, YouTube Search</h1>

    <div id="results"></div>

    <!-- documentation for YouTube Search API
         https://developers.google.com/youtube/v3/getting-started -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script>

      $(document).ready(function() {

        // DOM reference
        var results = document.getElementById('results');

        // API key (put yours here)
        // get your credentials:
        // 1. visit https://console.developers.google.com
        // 2. click on  'credentials'
        // 3. click the 'create credentials' drop down and select 'API key'
        var apiKey = 'AIzaSyDHV733Sclmb297uyMfc5nyAaL_bKWtCkI';

        // initiate a search for a video
        $.ajax({
          url: 'https://www.googleapis.com/youtube/v3/search',
          type: 'GET',
          data: {
            part: 'snippet',
            q: 'pikachu',
            key: apiKey
          },
          success: function(data, status) {
            console.log(data);
            // if some items came back from the search
            if (data.items) {
              // loop over the items and display their thumbnails
              for (var i =  0; i < data.items.length; i++) {
                console.log(data.items[i].snippet.thumbnails.default);
                var img = document.createElement('img');
                img.src = data.items[i].snippet.thumbnails.default.url;
                img.width = data.items[i].snippet.thumbnails.default.width;
                img.height = data.items[i].snippet.thumbnails.default.height;
                results.appendChild(img);
              }
            }
          },
          error: function(request, data, status) {
            console.log(data);
          }
        });

      });



    </script>


  </body>
</html>
