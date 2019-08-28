// set up every image on the page to respond to click events

// get a reference to all of the images using their class name
var allImages = document.querySelectorAll('.tile');

// visit each image
for (var i = 0; i < allImages.length; i++) {

  // set up an event listener on each image
  allImages[i].onclick = function(event) {
    // remove the blue background from any other image that might
    // currently be selected
    var currentBlueImages = document.querySelectorAll('.blue');
    for (var j = 0; j < currentBlueImages.length; j++) {
      currentBlueImages[j].classList.remove('blue');
    }

    // give this image a blue background
    event.currentTarget.classList.add('blue');
  }
}
