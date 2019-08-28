<!DOCTYPE html>
<html>
  <head>
    <title>Web Development</title>
  </head>
  <body>

    <h1>Hello, YouTube</h1>

    <div>
      <a href="#" data-video="dQw4w9WgXcQ">Rick Roll</a> -
      <a href="#" data-video="QH2-TGUlwu4">Nyan Cat</a> -
      <a href="#" data-video="8lXdyD2Yzls">Dramatic Gopher</a>
    </div>

    <!-- documentation for YouTube iframe API:
         https://developers.google.com/youtube/iframe_api_reference -->

    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
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
          videoId: 'dQw4w9WgXcQ',
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

      var aTags = document.querySelectorAll('a');
      for (var i = 0; i < aTags.length; i++) {
        aTags[i].onclick = function(event) {
          event.preventDefault();
          console.log(event.currentTarget.dataset.video);
          player.loadVideoById( event.currentTarget.dataset.video );
          player.playVideo();
        }
      }

    </script>


  </body>
</html>
