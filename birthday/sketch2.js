// variables
var beforePlay = true; 
var beforePlayInter = false;
var zero = false;
var typeSound, clickSound, playButton, celine;
var playButtonTint = 0, playButtonTintRate = 16, globalPlayButtonTint = 0, playButtonX = 730, playButtonY = 375, playButtonRadius = 60;
var backgroundTint = 0, backgroundTintRate = 2;

// typing variables
var wordIndex = 0;
var word = "Now let's go on an emotional journey,\nand look back on our time together...         ";
var splitWord = [];
var toDisplay = "";
var first = false, playSound1 = true, start1 = false, again1 = false; counter1 = 55;

var wordIndex2 = 0;
var word2 = "These 7 months marked\nthe beginning and the growing of our relationship.          "
var splitWord2 = [];
var toDisplay2 = "";
var secondB = false, playSound2 = false, start2 = false, again2 = false, counter2 = 27;

var wordIndex3 = 0;
var word3 = "Here is a slideshow of you and me.           ";
var splitWord3 = [];
var toDisplay3 = "";
var third = false, playSound3 = false, start3 = false, again3 = false, counter3 = 59;

var wordIndex4 = 0;
var word4 = "Martin being the cutest hamster \nthe world has ever seen.                                                                                                    "; // emoji
var splitWord4 = [];
var toDisplay4 = "";
var fourth = false, again4 = false, counter4 = 30;

var wordIndex5 = 0;
var word5 = "THE END.           ";
var splitWord5 = [];
var toDisplay5 = "";
var fifth = true, playSound5 = true, start5 = true, again5 = false;

var wordIndex6 = 0;
var word6 = "By: Khye Borg            ";
var splitWord6 = [];
var toDisplay6 = "";
var sixth = false, playSound6 = true, start6 = false, again6 = false, counter6 = 6;

var wordIndex7 = 0;
var word7 = "Yes, we should have taken more pictures together.          ";
var splitWord7 = [];
var toDisplay7 = "";
var seventh = false, playSound7 = true, start7 = false, again7 = false, counter7 = 42;

var wordIndex8 = 0;
var word8 = "I know babe, we do have more than one picture together.          ";
var splitWord8 = [];
var toDisplay8 = "";
var eighth = false, playSound8 = true, start8 = false, again8 = false, counter8 = 63;

var wordIndex9 = 0;
var word9 = "I'm just being silly here, hehe.          ";
var splitWord9 = [];
var toDisplay9 = "";
var ninth = false, playSound9 = true, start9 = false, again9 = false, counter9 = 63;

var wordIndex10 = 0;
var word10 = "Please proceed to the next page.          ";
var splitWord10 = [];
var toDisplay10 = "";
var tenth = false, playSound10 = true, start10 = false, again10 = false, counter10 = 65;

// word = ""; word2 = ""; word3 = "";
// counter1 = 5; counter2 = 5; counter3 = 5;

var initialBlackBackground = 0;
// var backgroundRate = 0.25;
var backgroundRate = 2;
var pic1;
var pic1X = 175, pic1Y = 230, pic1WidthRate = 0.4, pic1HeightRate = pic1WidthRate * 2.03, pic1Width = 100, pic1Height = pic1Width * 2.03, pic1Limit = 165, pic1Tint = 0;
var pic1Counter = 20;
var tintRate = 1.2;
var hamster, hamsterCounter = 59;
var love, loveCounter = 55;
var stopCounter = 405;
var celineStarted = false; finishCeline = false;

var theEndCounter = 30;

function preload() {
	typeSound = loadSound("sounds/typewriter.mp3");
	clickSound = loadSound("sounds/clickSound.mp3");
	celine = loadSound("sounds/celine.mp3");
	playButton = loadImage("images/play_button1.png");
	pic1 = loadImage("images/together1.png");
	hamster = loadImage("images/hamster.png");
	love = loadImage("images/love2.png");
}

function setup() {
	// create our canvas
  	createCanvas(850, 480);
  	noStroke();
  	frameRate(18);
  	imageMode(CENTER);

	splitWord = split(word, "");
	splitWord2 = split(word2, "");
	splitWord3 = split(word3, "");
	splitWord4 = split(word4, "");
	splitWord5 = split(word5, "");
	splitWord6 = split(word6, "");
	splitWord7 = split(word7, "");
	splitWord8 = split(word8, "");
	splitWord9 = split(word9, "");
	splitWord10 = split(word10, "");
}

function draw() {

	// fill(255);
	// text("mouseX: " + mouseX, 20, 20);
	// text("mouseY: " + mouseY, 20, 40);

	// beforePlay = false;
	// finishCeline = true;

	// before the play button is clicked
	if (beforePlay === true) {
		beforePlayStuff();
	}

	// after the play button is clicked
	else if (beforePlay === false && finishCeline === false) {
		duringPlayStuff();
	}

	else if (finishCeline === true) {
		afterPlayStuff();
	}
}

function mouseClicked() {
	if (playButtonTint >= 180) {
		if (dist(mouseX, mouseY, playButtonX, playButtonY) < playButtonRadius) {
			beforePlay = false;
			if(clickSound.isPlaying() === false) {clickSound.play()};
			if(celine.isPlaying() === false) {celine.play(); celineStarted = true;}
		}
	}
}

function tintDrawTogetherPicture(pic, picX, picY, picWidthRate, picHeightRate, picWidth, picHeight, picLimit, picTint) {
	
	tint(255, picTint);
	image(pic, pic1X, pic1Y, picWidth, picHeight);
	noTint();

	if (picWidth < picLimit) {
		picWidth += picWidthRate;
		picHeight += picHeightRate;
	}
}

function emergingBlack() {
	fill(0, 0, 0, initialBlackBackground);
	rect(0, 0, width, height);
	initialBlackBackground += backgroundRate;
}

function displayStart1() {
	fill(0); noStroke();
	rect(0, 0, 850, 150);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(20);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (first === true) {
		toDisplay = toDisplay + splitWord[wordIndex];
		text(toDisplay, 70, 100);
	}
	if (first === false) {
		text(toDisplay, 70, 100);
	}
	wordIndex += 1;
	if (wordIndex >= splitWord.length) {
		first = false;
		playSound1 = false;
		again1 = true;
	}
	fill(0); noStroke();
	rect(0, 150, 850, 330);}
function displayStart2() {
	fill(0); noStroke();
	rect(0, 150, 850, 330);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(20);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (secondB === true) {
		toDisplay2 = toDisplay2 + splitWord2[wordIndex2];
		text(toDisplay2, 70, 180);
	}
	if (secondB === false) {
		text(toDisplay2, 70, 180);
	}
	wordIndex2 += 1;
	if (wordIndex2 >= splitWord2.length) {
		secondB = false;
		playSound2 = false;
		again2 = true;
	}
	fill(0); noStroke();
	rect(0, 250, 850, 330);}
function displayStart3() {
	fill(0); noStroke();
	rect(0, 220, 850, 330);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(20);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (third === true) {
		toDisplay3 = toDisplay3 + splitWord3[wordIndex3];
		text(toDisplay3, 70, 302);
	}
	if (third === false) {
		text(toDisplay3, 70, 302);
	}
	wordIndex3 += 1;
	if (wordIndex3 >= splitWord3.length) {
		third = false;
		playSound3 = false;
		again3 = true;
	}
	fill(0); noStroke();
	rect(0, 350, 850, 330);}
function displayStart4() {
	fill(225); noStroke();
	background(0);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(18);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (fourth === true) {
		toDisplay4 = toDisplay4 + splitWord4[wordIndex4];
		text(toDisplay4, 310, 240);
	}
	if (fourth === false) {
		text(toDisplay4, 310, 240);
	}
	wordIndex4 += 1;
	if (wordIndex4 >= splitWord4.length) {
		fourth = false;
		again4 = true;
	}
}

function displayStart5() {
	fill(0); noStroke();
	rect(0, 0, 850, 480);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(28);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (fifth === true) {
		toDisplay5 = toDisplay5 + splitWord5[wordIndex5];
		text(toDisplay5, 350, height / 2 - 40);
	}
	if (fifth === false) {
		text(toDisplay5, 350, height / 2 - 40);
	}
	wordIndex5 += 1;
	if (wordIndex5 >= splitWord5.length) {
		fifth = false;
		playSound5 = false;
		again5 = true;
	}
}

function displayStart6() {
	fill(225); noStroke();
	fill(0); noStroke();
	rect(100, height / 2 + 40, 850, 30);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(20);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (sixth === true) {
		toDisplay6 = toDisplay6 + splitWord6[wordIndex6];
		text(toDisplay6, 100, height / 2 + 60);
	}
	if (sixth === false) {
		text(toDisplay6, 100, height / 2 + 60);
	}
	wordIndex6 += 1;
	if (wordIndex6 >= splitWord6.length) {
		sixth = false;
		playSound6 = false;
		again6 = true;
	}
}

function displayStart7() {
	fill(225); noStroke();
	fill(0); noStroke();
	rect(100, height / 2 + 70, 850, 30);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(15);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (seventh === true) {
		toDisplay7 = toDisplay7 + splitWord7[wordIndex7];
		text(toDisplay7, 100, height / 2 + 90);
	}
	if (seventh === false) {
		text(toDisplay7, 100, height / 2 + 90);
	}
	wordIndex7 += 1;
	if (wordIndex7 >= splitWord7.length) {
		seventh = false;
		playSound7 = false;
		again7 = true;
	}
}

function displayStart8() {
	fill(225); noStroke();
	fill(0); noStroke();
	rect(100, height / 2 + 100, 850, 30);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(15);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (eighth === true) {
		toDisplay8 = toDisplay8 + splitWord8[wordIndex8];
		text(toDisplay8, 100, height / 2 + 120);
	}
	if (eighth === false) {
		text(toDisplay8, 100, height / 2 + 120);
	}
	wordIndex8 += 1;
	if (wordIndex8 >= splitWord8.length) {
		eighth = false;
		playSound8 = false;
		again8 = true;
	}
}

function displayStart9() {
	fill(225); noStroke();
	fill(0); noStroke();
	rect(100, height / 2 + 130, 850, 30);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(15);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (ninth === true) {
		toDisplay9 = toDisplay9 + splitWord9[wordIndex9];
		text(toDisplay9, 100, height / 2 + 150);
	}
	if (ninth === false) {
		text(toDisplay9, 100, height / 2 + 150);
	}
	wordIndex9 += 1;
	if (wordIndex9 >= splitWord9.length) {
		ninth = false;
		playSound9 = false;
		again9 = true;
	}
}

function displayStart10() {
	fill(225); noStroke();
	fill(0); noStroke();
	rect(100, height / 2 + 160, 850, 30);
	strokeWeight(1);
	stroke(255,255,255);
	textSize(15);
	colorMode(RGB, 255, 255, 255);
	textFont("Courier New");
	fill(255, 255, 255);
	if (tenth === true) {
		toDisplay10 = toDisplay10 + splitWord10[wordIndex10];
		text(toDisplay10, 100, height / 2 + 180);
	}
	if (tenth === false) {
		text(toDisplay10, 100, height / 2 + 180);
	}
	wordIndex10 += 1;
	if (wordIndex10 >= splitWord10.length) {
		tenth = false;
		playSound10 = false;
		again10 = true;
	}
}


function beforePlayStuff() {
	if (beforePlayInter === false) {
		if (zero === false) {
			background(0, backgroundTint);
			backgroundTint += backgroundTintRate;
		}
		else if (first === true) {displayStart1();}
		else if (secondB === true) {displayStart2();}
		else if (third === true) {displayStart3();}
	}

	// start counting down for next section to start
	if (zero === false) {
		counter1--;
		if (counter1 === 0) {
			first = true; start1 = true; zero = true;
		}
	}
	if (first === false && zero === true) {
		counter2--;
		if (counter2 === 0) {
			secondB = true; start2 = true;
		}
	}
	if (secondB === false && first === false && zero === true) {
		counter3--;
		if (counter3 === 0) {
			third = true; start3 = true;
		}
	}

	if (again3 === true) {
		beforePlayInter = true;
	}

	// play type sound 
	if (start1 === true) {
		typeSound.play(); start1 = false;
	}
	else if (start2 === true) {
		typeSound.play(); start2 = false;
	}
	else if (start3 === true) {
		typeSound.play(); start3 = false;
	}

	// stop type sound
	if (playSound1 === false && again1 === true) {
		typeSound.stop();
		again1 = false;
	}
	else if (playSound2 === false && again2 === true) {
		typeSound.stop();
		again2 = false;
	}
	else if (playSound3 === false && again3 === true) {
		typeSound.stop();
		again3 = false;
	}

	// display the play button
	if (beforePlayInter === true) {
		tint(255, playButtonTint);
		playButtonTint += playButtonTintRate;
		// only allow hover effect after play button finish appearing
		if (playButtonTint >= 180) {
			// make the tint function dynamic
			if (dist(mouseX, mouseY, playButtonX, playButtonY) < playButtonRadius) {
				if (globalPlayButtonTint < 255) {globalPlayButtonTint += 50;}
				image(playButton, playButtonX, playButtonY, playButtonRadius * 2, playButtonRadius * 2);
				tint(243, 247, 34, globalPlayButtonTint);
				image(playButton, playButtonX, playButtonY, playButtonRadius * 2, playButtonRadius * 2);
			}
			else {
				if (globalPlayButtonTint > 0) {globalPlayButtonTint -= 50;}
				image(playButton, playButtonX, playButtonY, playButtonRadius * 2, playButtonRadius * 2);
				tint(243, 247, 34, globalPlayButtonTint);
				image(playButton, playButtonX, playButtonY, playButtonRadius * 2, playButtonRadius * 2);
			}
		}

		// draw the play button on the screen
		image(playButton, playButtonX, playButtonY, playButtonRadius * 2, playButtonRadius * 2);
		noTint();
	}
}

function duringPlayStuff() {
	stopCounter--;	
		
	// background
	background(255, 255, 255);
	emergingBlack();

	fill(255);
	// text("mouseX: " + mouseX, 20, 20);
	// text("mouseY: " + mouseY, 20, 40);

	// only start when background is completely dark
	if (initialBlackBackground >= 255) {
		pic1Counter--;

		if (pic1Tint >= 80) {
			if (again4 === false) {fourth = true;}
			if (fourth === true) {
				loveCounter--;
				hamsterCounter--; 
				displayStart4();
			}
		}	
		
		// start drawing pic1
		if (pic1Counter <= 0) {
			tintDrawTogetherPicture(pic1, pic1X, pic1Y, pic1WidthRate, pic1HeightRate, pic1Width, pic1Height, pic1Limit, pic1Tint);
		
			// pic 1			
			if (pic1Width < pic1Limit) {
				pic1Width += pic1WidthRate;
				pic1Height += pic1HeightRate;
			}
			if (pic1Tint < 220) {
				pic1Tint += tintRate;
			}	
		}

		// draw hamster and love
		if (loveCounter <= 0) {
			tint(255, 200);
			image(love, 335, 315, 55, 55);
			noTint();
		}

		if (hamsterCounter <= 0) {
			tint(255, 200);
			image(hamster, 405, 318, 55, 55);
			noTint();
		}

		// if (stopCounter <= 0) {
		// 	background(0);
		// 	finishCeline = true;
		// }

		if (celine.isPlaying() === false) {
			background(0);
			finishCeline = true;
		}
	}
}

function afterPlayStuff() {
	theEndCounter--;

	if (theEndCounter > 0) {background(0);}

	if (fifth === true && theEndCounter <= 0) {displayStart5();}
	if (sixth === true) {displayStart6();}
	if (seventh === true) {displayStart7();}
	if (eighth === true) {displayStart8();}
	if (ninth === true) {displayStart9();}
	if (tenth === true) {displayStart10();}

	if (fifth === false) {
		counter6--;
		if (counter6 === 0) {
			sixth = true; start6 = true;
		}
	}
	if (fifth === false && sixth === false) {
		counter7--;
		if (counter7 === 0) {
			seventh = true; start7 = true;
		}
	}
	if (fifth === false && sixth === false && seventh === false) {
		counter8--;
		if (counter8 === 0) {
			eighth = true; start8 = true;
		}
	}
	if (fifth === false && sixth === false && seventh === false && eighth === false) {
		counter9--;
		if (counter9 === 0) {
			ninth = true; start9 = true;
		}
	}
	if (fifth === false && sixth === false && seventh === false && eighth === false && ninth === false) {
		counter10--;
		if (counter10 === 0) {
			tenth = true; start10 = true;
		}
	}

	// stop type sound
	if (playSound5 === false && again5 === true) {
		// typeSound.stop();
		again5 = false;
	}
	else if (playSound6 === false && again6 === true) {
		typeSound.stop();
		again6 = false;
	}
	else if (playSound7 === false && again7 === true) {
		typeSound.stop();
		again7 = false;
	}
	else if (playSound8 === false && again8 === true) {
		// typeSound.stop();
		again8 = false;
	}
	else if (playSound9 === false && again9 === true) {
		// typeSound.stop();
		again9 = false;
	}
	else if (playSound10 === false && again10 === true) {
		typeSound.stop();
		again9 = false;
	}

	// play type sound 
	if (start5 === true && theEndCounter <= 0) {
		typeSound.play(); start5 = false;
	}
	else if (start6 === true) {
		// typeSound.play(); 
		start6 = false;
	}
	else if (start7 === true) {
		typeSound.play(); start7 = false;
	}
	else if (start8 === true) {
		typeSound.play(); start8 = false;
	}
	else if (start9 === true) {
		// typeSound.play(); 
		start9 = false;
	}
	else if (start10 === true) {
		// typeSound.play(); 
		start10 = false;
	}
}













