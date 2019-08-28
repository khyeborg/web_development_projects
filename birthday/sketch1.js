var crick, bunny, panda, martin;
var crickObject, bunnyObject, pandaObject, martinObject;
var objects = [];
var rotateTime = 15; rotateAngle = 4.5;
var one, two, three, four, chatbox1, chatbox2, chatbox3, chatbox4;
var font, fontBold;
var crickMessage1 = "Meow meow, daddy daddy,"; crickMessage2 = "HAPPY BIRTHDAY!"; crickMessage3 = "Thank you for making me"; crickMessage4 = "your FAVORITE SON!";
var bunnyMessage1 = "Yes yes, daddy!"; bunnyMessage2 = "Thanks for letting me be myself always"; bunnyMessage3 = "and loving me for the way I"; bunnyMessage4 = "SLEEEEP!";
var pandaMessage1 = "Me too,"; pandaMessage2 = "ME TOO!!!"; pandaMessage3 = ""; pandaMessage4 = "";
var martinMessage1 = "DON'T THANK ME,"; martinMessage2 = "CATS!"; martinMessage3 = ""; martinMessage4 = "";
var initialColorBackground = 255, initialWhiteBackground = 0, backgroundRate = 6;
var textboxBlinkTime = 40; textboxBlinkTime2 = 20;
var initialTimer = 0, timerLimit = 46;
var globalClick = false;
var redness = 255, rednessDirection = -1, rednessRate = 2.5, rednessLimitLower = 200, rednessLimitUpper = 255;
var hoodieBlinkTime = 30; hoodieBlinkTime2 = 15;

class Family {
	constructor(array) {
		this.pic = array[0];
		this.xPos = array[1];
		this.yPos = array[2];
		this.mouseXLower = array[3];
		this.mouseXUpper = array[4];
		this.mouseYLower = array[5];
		this.mouseYUpper = array[6];
		this.picWidth = array[7];
		this.picHeight = array[8];
		this.clicked = false;
		this.clickTimer = 0;
		this.textboxBoolean = true;
		this.textboxTimer = -1;

		this.numPic = array[9];
		this.numX = array[10];
		this.numY = array[11];
		this.numWidth = array[12];
		this.numHeight = array[13];
		this.chatbox = array[14];
		this.chatboxX = array[15];
		this.chatboxY = array[16];
		this.chatboxWidth = array[17];
		this.chatboxHeight = array[18];
		this.message1 = array[19];
		this.message1X = array[20];
		this.message1Y = array[21];
		this.message2 = array[22];
		this.message2X = array[23];
		this.message2Y = array[24];
		this.message3 = array[25];
		this.message3X = array[26];
		this.message3Y = array[27];
		this.message4 = array[28];
		this.message4X = array[29];
		this.message4Y = array[30];
		this.size1 = array[31];
		this.size2 = array[32];
		this.size3 = array[33];
		this.size4 = array[34];

		this.hoodieTimer = -1;
		this.hoodieBoolean = true;
	}
}

function preload() {
	crickPic = loadImage("images/crick1.png");  
	bunnyPic = loadImage("images/bunny1.png");  
	pandaPic = loadImage("images/panda1.png");  
	martinPic = loadImage("images/martin7.png"); 
	one = loadImage("images/one.png"); 
	two = loadImage("images/two.png"); 
	three = loadImage("images/three.png"); 
	four = loadImage("images/four.png"); 
	font = loadFont('fonts/typewriter.ttf');
	fontBold = loadFont('fonts/bold.ttf');
	chatbox1 = loadImage("images/chatbox1.png"); 
	chatbox2 = loadImage("images/chatbox2.png"); 
	chatbox3 = loadImage("images/chatbox3.png"); 
	chatbox4 = loadImage("images/chatbox4.png"); 
}

function setup() {
	// create our canvas
  	createCanvas(800, 480);
  	noStroke();
  	frameRate(25);
  	imageMode(CENTER);
  	textFont(font);

  	//				0 pic      1 xPos 2 yPos 3 mouseXLower 4 mouseXUpper 5 mouseYLower 6 mouseYUpper 7 picWidth 8 picHeight 9 num  10 numX 11 numY 12 numWidth 13 numHeight 14 chatbox 15 chatboxX 16 chatboxY 17 chatboxWidth 18 chatboxHeight 19 message1     20 message1X 21 message1Y 22 message2     23 message2X 24 message2Y 25 message3     26 message3X 27 message3Y 28 message4     29 message4X 30 message4Y 31 size1 32 size2 33 size3 34 size4 
  	crickObject  = [crickPic,  120,   200,   20,           220,          75,           305,          200,       229,        one,   195,    289,    40,         39,          chatbox1,  390,        120,        460,            350,             crickMessage1,  277,         58,          crickMessage2,  277,         88,          crickMessage3,  277,         116,         crickMessage4,  277,         147,         17,      23,         16,   20];
  	bunnyObject  = [bunnyPic,  665,   155,   560,          770,          25,           270,          210,       245,        two,   587,    61,     40,         40,          chatbox2,  385,        130,        490,            350,             bunnyMessage1,  261,         74,          bunnyMessage2,  261,         99,          bunnyMessage3,  261,         125,         bunnyMessage4,  261,         156,         18,      13.5,       16.5, 22];
  	pandaObject  = [pandaPic,  665,   370,   575,          755,          285,          438,          180,       152,        three, 732,    318,    37,         37,          chatbox3,  665,        210,        200,            200,             pandaMessage1,  603,         175,         pandaMessage2,  603,         213,         pandaMessage3,  262,         122,         pandaMessage4,  262,         154,         22,      24,         16.5, 22];
  	martinObject = [martinPic, 390,   350,   240,          540,          240,          445,          300,       207,        four,  266,    429,    40,         40,          chatbox4,  370,        140,        260,            200,             martinMessage1, 270,         117,         martinMessage2, 270,         147,         martinMessage3, 262,         122,         martinMessage4, 262,         154,         22,      22,         16.5, 22];

  	objects.push(new Family(crickObject));
  	objects.push(new Family(bunnyObject));
  	objects.push(new Family(pandaObject));
  	objects.push(new Family(martinObject));
}

function draw() {
	// slowly-emerging effect
	emergingWhite();
	// background(255);
	
	// textFont(font);
	// text("mouseX: " + mouseX, 20, 20);
	// text("mouseY: " + mouseY, 20, 40);

	for (var i = 0; i < objects.length; i++) {
		if (objects[i].clicked === true) {
			// noTint();
			tint(255, 220);
			if (objects[i].clickTimer < rotateTime) {
		  		push();
				translate(objects[i].xPos + 5, objects[i].yPos);
				rotate(radians(-rotateAngle));
				image(objects[i].pic, 0, 0, objects[i].picWidth, objects[i].picHeight);
				pop();
			}
			else {
				push();
				translate(objects[i].xPos + 5, objects[i].yPos);
				rotate(radians(rotateAngle));
				image(objects[i].pic, 0, 0, objects[i].picWidth, objects[i].picHeight);
				pop();
			}
			if (objects[i].clickTimer == rotateTime * 2 - 1) {
				objects[i].clickTimer = -1;
			}
			objects[i].clickTimer++;
		}
		else {
			if (mouseX > objects[i].mouseXLower + 5 && mouseX < objects[i].mouseXUpper + 5 && mouseY > objects[i].mouseYLower && mouseY < objects[i].mouseYUpper) {
				if (initialTimer > timerLimit) {tint(255, 150);}

				// only allow picture to get bigger on mouseover if the background has completely faded
				if (initialTimer > timerLimit) {
					image(objects[i].pic, objects[i].xPos + 5, objects[i].yPos, objects[i].picWidth + 0.1 * objects[i].picWidth, objects[i].picHeight + 0.1 * objects[i].picHeight);
					image(objects[i].numPic, objects[i].numX + 5, objects[i].numY, objects[i].numWidth + 0.3 * objects[i].numWidth, objects[i].numHeight + 0.3 * objects[i].numHeight);
				}
				else {
					image(objects[i].pic, objects[i].xPos + 5, objects[i].yPos, objects[i].picWidth, objects[i].picHeight);
					image(objects[i].numPic, objects[i].numX + 5, objects[i].numY, objects[i].numWidth, objects[i].numHeight);
				}
			}
			else {
				if (initialTimer > timerLimit) {noTint();}
				image(objects[i].pic, objects[i].xPos + 5, objects[i].yPos, objects[i].picWidth, objects[i].picHeight);
				image(objects[i].numPic, objects[i].numX + 5, objects[i].numY, objects[i].numWidth, objects[i].numHeight);
			}
		}
	}

	// messages
	for (var i = 0; i < objects.length; i++) {
		if (objects[i].clicked === true) {
			// textbox animation
			textboxAnimiation(i);

			if (objects[i].pic === martinPic) {
				hoodieAnimation(i);

				if (objects[i].hoodieBoolean === true) {
					textFont(font); textSize(14); fill(redness, 0, 0, 150);
					text("*Btw, look at what you're", 45, 340); 
					text("   wearing babe! It's your", 45, 360);
					text("   hoodie before I stole it!", 45, 380);
				}
				else {
					fill(255); rect(40, 335, 50, 80);
				}

			}

			if (objects[i].textboxBoolean === true) {
				noTint();
				image(objects[i].chatbox, objects[i].chatboxX + 5, objects[i].chatboxY, objects[i].chatboxWidth, objects[i].chatboxHeight);
				drawTexts(i);
			}
			else {
				drawTexts(i);
			}
		}
	}

	// borders
	drawBorders();
	fadingBlack();

	if (globalClick === false) {
		textFont(fontBold); textSize(21); fill(redness, 0, 0, 150);
		text("Wishes from your best friends!", 25, 41);
		textFont(font); textSize(14);
		text("Click on them sequentially to retrieve their birthday messages", 25, 63);
		redness += rednessDirection * rednessRate; 
		if (redness <= rednessLimitLower) {rednessDirection *= -1;}
		else if (redness >= rednessLimitUpper) {rednessDirection *= -1;}
	}
}

function mouseClicked() {
	// only allow clicking after a certain time
	if (initialTimer > timerLimit) {
		for (var i = 0; i < objects.length; i++) {
		  	if (mouseX > objects[i].mouseXLower + 5 && mouseX < objects[i].mouseXUpper + 5 && mouseY > objects[i].mouseYLower && mouseY < objects[i].mouseYUpper) {
		  		objects[i].clicked = true;
		  		for (var j = 0; j < objects.length; j++) {
		  			if (j != i) {
		  				objects[j].clicked = false;
		  				objects[j].clickTimer = 0;
		  				objects[j].textboxBoolean = false;
		  				objects[j].textboxTimer = -1;
		  				objects[j].hoodieTimer = -1;
		  			}
		  		}
			}
			else {
				objects[i].clicked = false;
		  		objects[i].clickTimer = 0;
		  		objects[i].textboxBoolean = false;
		  		objects[i].textboxTimer = 0;
			}
		}
	}

	globalClick = false;
	for (var i = 0; i < objects.length; i++) {
		if (objects[i].clicked === true) {globalClick = true;;}
	}
}

function fadingBlack() {
	initialTimer++; 

	// slowly-emerging effect
	fill(redness, 68, 54, initialColorBackground);
	rect(0, 0, 800, 480);
	initialColorBackground -= backgroundRate;
	tint(251, 68, 54, initialColorBackground);
}

function emergingWhite() {
	fill(255, 255, 255, initialWhiteBackground);
	rect(0, 0, 800, 480);
	initialWhiteBackground += backgroundRate;
	tint(255, initialWhiteBackground);
}

function drawTexts(i) {
	if (objects[i].pic == pandaPic) {
		fill(255);
		rect(590 + 5, 135, 150, 106, 10);
		triangle(630 + 5, 229, 665 + 5, 280, 700 + 5, 229);
		fill(0);
	}
	fill(0);
	textSize(objects[i].size1); text(objects[i].message1, objects[i].message1X + 5, objects[i].message1Y);
	textSize(objects[i].size2); text(objects[i].message2, objects[i].message2X + 5, objects[i].message2Y);
	textSize(objects[i].size3); text(objects[i].message3, objects[i].message3X + 5, objects[i].message3Y);
	textSize(objects[i].size4); text(objects[i].message4, objects[i].message4X + 5, objects[i].message4Y);
}

function textboxAnimiation(i) {
	objects[i].textboxTimer++; 

	if (objects[i].textboxTimer < textboxBlinkTime) {
		objects[i].textboxBoolean = true;
	}
	else {
		objects[i].textboxBoolean = false;
		if (objects[i].textboxTimer === textboxBlinkTime + textboxBlinkTime2 - 1) {
			objects[i].textboxTimer = -1;
		}
	}
}

function hoodieAnimation(i) {
	objects[i].hoodieTimer++; 

	if (objects[i].hoodieTimer < hoodieBlinkTime) {
		objects[i].hoodieBoolean = true;
	}
	else {
		objects[i].hoodieBoolean = false;
		if (objects[i].hoodieTimer === hoodieBlinkTime + hoodieBlinkTime2 - 1) {
			objects[i].hoodieTimer = -1;
		}
	}
}

function drawBorders() {
	fill(redness, 0, 0, 150);
	rect(0, 0, 7, 480);
	rect(793, 0, 7, 480);
	rect(7, 0, 786, 7);
	rect(7, 473, 786, 7);
}






	
