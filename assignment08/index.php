<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 08</title>
    <meta charset="utf-8"/>

    <style>
      .hidden {
        display: none;
      }
      .auth_button {
        float: right;
        margin-top: 10px;
        padding: 3px;
        font-size: 120%;
      }
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

    <button id="login_button" class="auth_button">Login</button>
    <button id="logout_button" class="hidden auth_button">Logout</button>

    <h1>Your NYC</h1>

    <p id="p1" class="hidden">Log in with a google account to see content.</p>
    <p id="welcome" class="hidden"></p>
    <p id="p2" class="hidden">Click on the map to drop a pin and tell us about your favorite spots in the city!</p>

    <div id="map_container" class="hidden">

      <div id="form_container" class="hidden">
        <img src="images/pin.png">
        <input type="text" id="message">
        <button id="save">Save</button>
        <button id="cancel">Cancel</button>
      </div>

    </div>
    <div id="caption" class="hidden"></div>
    <div id="results" class="hidden"></div>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/5.11.1/firebase.js"></script>

    <!-- jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#config-web-app -->

    <script>
      $(document).ready(function()  {

        // Your web app's Firebase configuration
        var firebaseConfig = {
          apiKey: "AIzaSyCCxj9nRAqxNCYQDK4WYjjM7iWq24edKo0",
          authDomain: "assignment-8-extra-credit.firebaseapp.com",
          databaseURL: "https://assignment-8-extra-credit.firebaseio.com",
          projectId: "assignment-8-extra-credit",
          storageBucket: "assignment-8-extra-credit.appspot.com",
          messagingSenderId: "257040204361",
          appId: "1:257040204361:web:f6f815989940555b"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Initialize a connection to our database
        var db = firebase.firestore();

        // some DOM elements
        var login_button = document.getElementById('login_button');
        var logout_button = document.getElementById('logout_button');
        var map = document.getElementById('map_container');
        var form = document.getElementById('form_container');
        var save = document.getElementById('save');
        var cancel = document.getElementById('cancel');
        var message = document.getElementById('message');
        var caption = document.getElementById('caption');
        var p1 = document.getElementById('p1');
        var p2 = document.getElementById('p2');
        var welcome = document.getElementById('welcome');
        var results = document.getElementById('results');
        var deleteId;

        var user_info = false;
        firebase.auth().onAuthStateChanged(function(user) { // run everytime google reports whether the user has logged in or out

          user_info = user;

          // FLIPPING 
          // do we have a user? if so, they have authenticated 
          if (user) {
            login_button.classList.add("hidden");
            logout_button.classList.remove("hidden"); 
            p1.classList.add("hidden"); 
            p2.classList.remove("hidden"); 
            caption.classList.remove("hidden"); 
            form.classList.remove("hidden"); 
            map.classList.remove("hidden");
            welcome.innerHTML = "Welcome " + user_info.displayName + "!";
            welcome.classList.remove("hidden"); 
            getPreviousPins();
          }

          // they are logged out
          else {
            login_button.classList.remove("hidden");
            logout_button.classList.add("hidden");
            p1.classList.remove("hidden"); 
            p2.classList.add("hidden"); 
            caption.classList.add("hidden"); 
            form.classList.add("hidden"); 
            map.classList.add("hidden"); 
            welcome.innerHTML = "";
            welcome.classList.add("hidden"); 
          }

          console.log(user);

        });

        logout_button.onclick = function(event) {
          firebase.auth().signOut();
        }

        function getPreviousPins() {

          db.collection("notebook").onSnapshot(function(snapshot) { // whenever something has changed in the notebook, db = database 
            // visit every note that was sent to us
            for (var i = 0; i < snapshot.docs.length; i++) {
              
              if (!document.getElementById(snapshot.docs[i].id)) {
                createPin(snapshot.docs[i].id, snapshot.docs[i].data().left, snapshot.docs[i].data().top, snapshot.docs[i].data().note_message, snapshot.docs[i].data().username, snapshot.docs[i].data().email);
              }
            }
          });
        }

        save.onclick = function() {

          if (user_info) {

            db.collection("notebook").add({ // add something to the notebook collection
              note_message: message.value, 
              email: user_info.email,
              username: user_info.displayName,
              left: form.style.left,
              top: form.style.top
            })
            .then(function(docRef) {
              message.value = '';
              form.style.display = "none";
            });
          }
        }

        function createPin(id, left, top, message, username, email) {
          var p = document.createElement('img');
          p.id = id;
          if (username == user_info.displayName) {
            p.src = "images/pin.png";
          }
          else {
            p.src = "images/red_pin.png";
          }
          p.email = email;
          p.style.left = left;
          p.style.top = top;
          p.classList.add('pin');
          p.dataset.message = message;
          p.dataset.user = username;
          p.onmouseover = pinOver;
          p.onmouseout = pinOut;
          p.onclick = pinClick;
          map.appendChild(p);

          p.d = document.createElement('button');

          p.d.onclick = function(event) {
            db.collection("notebook").doc(deleteId).delete();
            p.style.display = "none";
            event.currentTarget.classList.add("hidden");
          }

          p.d.innerHTML = "Delete";
          p.d.classList.add("hidden");
          p.d.classList.add("delete_array");
          p.d.id = id;
          results.appendChild(p.d);
        }

        function pinOver(event) {
          
          if (event.currentTarget.id != deleteId) {
            results.classList.add("hidden");
          }

          caption.innerHTML = event.currentTarget.dataset.message + " <br>Added by: " + event.currentTarget.dataset.user;

          var deleteButtonArray = document.getElementsByClassName("delete_array");

          for (var i = 0; i < deleteButtonArray.length; i++) {
            if (deleteButtonArray[i].id === event.currentTarget.id) {
              deleteButtonArray[i].classList.remove("hidden");
            }
            else {
              deleteButtonArray[i].classList.add("hidden");
            }
          } 
        }

        function pinOut(event) {
          caption.innerHTML = "";
        }

        function pinClick(event) {
          if (event.currentTarget.email === user_info.email) {
            deleteId = event.currentTarget.id;
            caption.innerHTML = "";
            results.classList.remove("hidden");
            var deleteButtonArray = document.getElementsByClassName("delete_array");

            for (var i = 0; i < deleteButtonArray.length; i++) {
              if (deleteButtonArray[i].id === event.currentTarget.id) {
                deleteButtonArray[i].classList.remove("hidden");
              }
              else {
                deleteButtonArray[i].classList.add("hidden");
              }
            } 
          }
        }

        map.onclick = function(event) {
          if (event.target === map) {
            results.classList.add("hidden");
            form.style.display = "block";
            form.style.left = (event.offsetX - 10) + 'px';
            form.style.top = (event.offsetY - 50) + 'px';
          }
        }

        cancel.onclick = function(event) {
          form.style.display = "none";
          message.value = '';
        }

        // when they click the login button, ask google to authenticate them 
        login_button.onclick = function(event) {
          var provider = new firebase.auth.GoogleAuthProvider();
          provider.setCustomParameters ({
            prompt: 'select_account' // select the correct google account
          });
          firebase.auth().signInWithPopup(provider);
        }

      });

    </script>
    
  </body>
</html>
