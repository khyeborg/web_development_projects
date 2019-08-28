<!DOCTYPE html>
<html>
  <head>
    <title>Your NYC</title>
    <style>
      body {
        font-family: sans-serif;
      }
      #map_container {
        position: relative;
        width: 557px;
        height: 800px;
        background-image: url('images/subway_map.jpg');
        float: left;
      }
      #caption {
        float: left;
        padding: 10px;
      }
      #form_container {
        position: absolute;
        z-index: 10;
        width: 300px;
        display: none; 
      }
      .pin {
        position: absolute;
        z-index: 5;
      }
    </style>
  </head>
  <body>

    <h1>Your NYC</h1>

    <p>Click on the map to drop a pin and tell us about your favorite spots in the city!</p>

    <div id="map_container">

      <div id="form_container">
        <img src="images/pin.png">
        <input type="text" id="message">
        <button id="save">Save</button>
        <button id="cancel">Cancel</button>
      </div>

    </div>
    <div id="caption">Caption goes here</div>

    <!-- import jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- custom application code -->
    <script>

      $(document).ready(function() {

        // get references to our containers
        var map = document.getElementById('map_container');
        var form = document.getElementById('form_container');
        var save = document.getElementById('save');
        var cancel = document.getElementById('cancel');
        var message = document.getElementById('message');
        var caption = document.getElementById('caption');

        function getPreviousPins() {
          $.ajax({
            url: 'data/pins.txt',
            success: function(data, status) {
              console.log(data);
              var lines = data.split("\n");
              for (var i = 0; i < lines.length; i++) {
                var items = lines[i].split("|");
                createPin(items[0], items[1], items[2], items[3]);
              }

              setTimeout(getPreviousPins, 3000);
            }
          });
        }

        getPreviousPins();

        save.onclick = function(event) {
          // send the message the user typed 
          // coordinates  (top + left)

          $.ajax({ 
            url: 'save.php',
            type: 'POST',
            data: {
              message: message.value,
              top: form.style.top,
              left: form.style.left
            },
            success: function(data, status) {
              console.log("successful!");
              console.log(data);
              createPin(data, form.style.top, form.style.left, message.value);
              form.style.display = "none";
              message.value = "";
            }
          });
        }

        function createPin(id, top, left, message) {

          if (!document.getElementById(id)) {
            var p = document.createElement('img');
            p.id = id;
            p.src = "images/pin.png";
            p.style.left = left;
            p.style.top = top;
            p.classList.add('pin');
            p.dataset.message = message;
            p.onmouseover = pinOver;
            p.onmouseout = pinOut;
            map.appendChild(p);
          }
        }

        function pinOver(event) {
          caption.innerHTML = event.currentTarget.dataset.message;
        }

        function pinOut(event) {
          caption.innerHTML = "";
        }

        map.onclick = function(event) {
          if (event.target === map) {
            form.style.display = "block";
            console.log(event.offsetX, event.offsetY);
            form.style.left = (event.offsetX - 10) + 'px';
            form.style.top = (event.offsetY - 50) + 'px';
          }
        }

        cancel.onclick = function(event) {
          form.style.display = "none";
        }


      }); // end document ready

    </script>


  </body>
</html>
