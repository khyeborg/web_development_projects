<!DOCTYPE html>
<html>
  <head>
    <title>Web Development</title>
  </head>
  <body>

    <h1>Hello, API</h1>

    <div id="result"></div>
    <pre id="all_hits"></pre>

    <!-- import jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- custom application code -->
    <script>

      $(document).ready(function() {

        // "API" stands for "application programming interface"
        // APIs are well-defined libraries that can be used to access services that exist outside of your applications
        // In web programming, we often use what's called a REST API (Representational State Transfer)
        // In short, a REST API has the following characteristics:
        // 1. They expose an 'endpoint' (a URL) that can be used to communicate with the service
        // 2. They accept data via an HTTP request (GET or POST)
        // 3. They return data via an HTTP request
        // I've written a super simple API for dealing with page hit counts - see the 'hit_counter.php' file for a full description
        // this API can be used to store visits to your site, get the total # of visitors to your site, and get the actual visit data for your site
        // the API requires two pieces of information to run
        //   - the command (record_hit, get_hit_count, get_all_hits)
        //   - the ID of the site (an integer)
        // the API has a single end point that can be accessed at 'hit_counter.php'
        // all commands are sent via a GET request (attached to the URL)

        // Example #1: make a request to the API to store a hit for this site (id #1)
        $.ajax({
          url: 'hit_counter.php?command=record_hit&id=1',
          success: function(data, status) {
            console.log(status, data);
          }
        });

        // Example #1.1: make a request to the API to store a hit for another site (id #2)
        // note that we can send GET variables through the URL or through a 'data' object
        //  -- the two techniques are equivalant
        $.ajax({
          url: 'hit_counter.php',
          type: 'GET',
          data: {
            command: 'record_hit',
            id: 2
          },
          success: function(data, status) {
            console.log(status, data);
          }
        })

        // Example #2: request the total # of hits to this page
        $.ajax({
          url: 'hit_counter.php?command=get_hit_count&id=1',
          success: function(data, status) {
            document.getElementById('result').innerHTML = 'Total hits to this page: ' + data;
          }
        });

        // Example #3: request all the hits for this page
        $.ajax({
          url: 'hit_counter.php?command=get_all_hits&id=1',
          success: function(data, status) {
            document.getElementById('all_hits').innerHTML = "All hits for this page:\n" + data;
          }
        });

      }); // end jQuery document ready function




    </script>


  </body>
</html>
