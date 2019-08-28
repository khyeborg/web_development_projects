// get a reference to our button
var button = document.getElementById('button1');

// assign an event listener for mouse clicks on this element
// note how we are asking this function to expect one argument
// when the function is called
button.onclick = function( event ) {

  // the variable 'event' is an object that the browser generates
  // every time this event listener is invoked.  it contains
  // detailed information about the event that just occurred, including
  // when the event happened, the exact X & Y position of the click
  // as well as a DOM reference to the element that triggered the event
  console.log( event );

  // this DOM reference is going to be the main focus of our lecture today,
  // as it allows us to write a single "generic" function to handle events on
  // multiple elements.  you can access the DOM reference to the element
  // on which the event was triggered by using the 'event.currentTarget' property
  console.log( event.currentTarget );

  // we can use this as we would any DOM reference.  for example, let's
  // make the button switch to a different background color every time
  // it is clicked
  event.currentTarget.style['background-color'] = 'yellow';
}

// we can do this on multiple elements as well.
// first, set up a function
function makeYellow(event) {
  event.currentTarget.style['background-color'] = 'yellow';
}

// next, set each element to listen for events and trigger this function
document.getElementById('button2').onclick = makeYellow;
document.getElementById('button3').onclick = makeYellow;
document.getElementById('button4').onclick = makeYellow;

// we can also do this by using a multiple element DOM Query
var lotsOfButtons = document.querySelectorAll('#lotsofbuttons button');
for (var i = 0; i < lotsOfButtons.length; i++) {
  lotsOfButtons[i].onclick = makeYellow;
}
