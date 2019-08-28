window.onload = function() {
	// variables
	var flipPicTimeFirst = 600;
	var flipPicTimeSecond = 400;
	var thatsMeTime = 800;
	var randomColorTime = 80;
	var firstFlipBoolean = true, secondFlipBoolean = false, secondTextBoxBoolean = false; secondThatsmeBoolean = false;
	var alpha = 255;
	var identity = false;
	var sixthControl = false;
	var firstAnimationMoveAmount = 1.2, firstAnimationMoveAmount2 = 3; 
	var hatTop = -315, cakeTop = 610, balloonsTop = -368, bannerLeft = 1200;
	var hatBoolean = false, hatMoving = false;
	var cakeBoolean = false, cakeMoving = false;
	var balloonsBoolean = false, balloonMoving = false;
	var bannerBoolean = false, bannerMoving = false;
	var firstClickMeBoolean = true, firstClickMeTime = 600;
	var clickMeShowTime = 1000, clickMeGoneTime = 300;

	// get references
	var body = document.querySelector("body");
	var first = document.getElementById("first");
	var secondA = document.getElementById("second");
	var firstMartin = document.getElementById("first_martin");
	var firstClickMe = document.getElementById("first_clickme");
	var firstHat = document.getElementById("first_hat");
	var firstCake = document.getElementById("first_cake");
	var firstBalloons = document.getElementById("first_balloons");
	var firstBanner = document.getElementById("first_banner");
	var firstMessage = document.getElementById("first_message");
	var firstClick = document.getElementById("first_click");
	var firstLove = document.getElementById("first_love");
	var secondSubmitButtons = document.querySelectorAll(".second_submit");
	var secondLater = document.querySelectorAll(".second_later");
	var secondMartin = document.getElementById("second_martin");
	var secondClick = document.getElementById("second_click");
	var secondTextbox = document.getElementById("second_textbox");
	var secondThatsme = document.getElementById("second_thatsme");
	var secondCongrats = document.getElementById("second_congrats");
	var secondLove = document.getElementById("second_love");
	var third, thirdClick, thirdLove;
	var fourth, fourthClick;
	var fifth = document.getElementById("fifth");
	var fifthSub = document.getElementById("fifth_sub");
	var fifthTemp = document.getElementById("fifth_temp");
	var fifthClick = document.getElementById("fifth_click");
	var fifthLove = document.getElementById("fifth_love");
	var sixth = document.getElementById("sixth");
	var sixthPassword = document.getElementById("sixth_password");
	var sixthAnswer = document.getElementById("sixth_answer");
	var sixthPresentDiv = document.getElementById("sixth_present_div");
	var sixthPresent = document.getElementById("sixth_present");
	var sixthStatement = document.getElementById("sixth_statement");
	var sixthStatementExtra = document.getElementById("sixth_statement_extra");
	var audio1, audio2, audio3, audio4, audio5, audio6, audio7, globalAudio6;

	var firstAnimateArray = document.querySelectorAll(".first_animate");

	// if (window.localStorage.getItem('times') === null) {
	// 	window.localStorage.setItem('times', "1");
	// }
	// else {
	//     var time = parseInt(window.localStorage.getItem('times')) + 1;
	// 	window.localStorage.setItem('times', time);
	// }

	playBirthdaySound1("sounds/birthdaySound1.mp3");
	clickMeShow();

	function playBirthdaySound1(url) {
	  audio1 = document.createElement('audio');
	  audio1.style.display = "none";
	  audio1.src = url;
	  audio1.loop = true;
	  audio1.autoplay = true;
	  body.appendChild(audio1);
	}

	function playBirthdaySound2(url) {
	  audio2 = document.createElement('audio');
	  audio2.style.display = "none";
	  audio2.src = url;
	  audio2.autoplay = true;
	  body.appendChild(audio2);
	}

	function playClickSound(url) {
	  audio3 = document.createElement('audio');
	  audio3.style.display = "none";
	  audio3.src = url;
	  audio3.autoplay = true;
	  body.appendChild(audio3);
	}

	function playCorrectSound(url) {
	  audio4 = document.createElement('audio');
	  audio4.style.display = "none";
	  audio4.src = url;
	  audio4.autoplay = true;
	  body.appendChild(audio4);
	}

	function playWrongSound(url) {
	  audio5 = document.createElement('audio');
	  audio5.style.display = "none";
	  audio5.src = url;
	  audio5.autoplay = true;
	  body.appendChild(audio5);
	}

	function playCheerSound(url) {
	  audio6 = document.createElement('audio');
	  audio6.style.display = "none";
	  audio6.src = url;
	  audio6.autoplay = true;
	  body.appendChild(audio6);
	}

	function playDrumSound(url) {
	  audio7 = document.createElement('audio');
	  audio7.style.display = "none";
	  audio7.src = url;
	  audio7.autoplay = true;
	  body.appendChild(audio7);
	}

	function playLastSong() {
		playBirthdaySound1("sounds/birthdaySound1.mp3");
	}

	// define functions
	function clickMeShow() {
		firstClickMe.src = "images/clickMe.png"; firstClickMeBoolean = false;
		setTimeout(clickMeGone, clickMeShowTime);
	}

	function clickMeGone() {
		firstClickMe.src = ""; firstClickMeBoolean = true;
		setTimeout(clickMeShow, clickMeGoneTime);
	}

	function flipPicFirst() {
		if (firstFlipBoolean === false) {
			firstMartin.src = "images/martin2.png"; firstFlipBoolean = true;
		}
		else {
			firstMartin.src = "images/martin1.png"; firstFlipBoolean = false;
		}
		setTimeout(flipPicFirst, flipPicTimeFirst);
	}

	function flipPicSecond() {
		if (secondFlipBoolean === false) {
			secondMartin.src = "images/martin5.png"; secondFlipBoolean = true;
		}
		else {
			secondMartin.src = "images/martin4.png"; secondFlipBoolean = false;
		}
		setTimeout(flipPicSecond, flipPicTimeSecond);
	}

	function thatsMe() {
		if (secondThatsmeBoolean === false) {
			secondThatsme.src = ""; secondThatsmeBoolean = true;
		}
		else {
			secondThatsme.src = "images/thats_me.png"; secondThatsmeBoolean = false;
		}
		if (secondTextBoxBoolean === false) {
			secondTextbox.src = ""; secondTextBoxBoolean = true;
		}
		else {
			secondTextbox.src = "images/textbox.png"; secondTextBoxBoolean = false;
		}
		setTimeout(thatsMe, thatsMeTime);
	}

	function randomColor() {
		var r = parseInt(Math.random() * 256);
		var g = parseInt(Math.random() * 256);
		var b = parseInt(Math.random() * 256);
		secondCongrats.style.color = "rgb(" + r + "," + g + "," + b + ")";
		setTimeout(randomColor, randomColorTime);
	}

	// set up mouse events for first_animate class
	for (var i = 0; i < firstAnimateArray.length; i++) {
		firstAnimateArray[i].onmouseout = function(event) {
			for (var j = 0; j < firstAnimateArray.length; j++) {
				firstAnimateArray[j].style.opacity = "1";
			}
		}
	}

	firstMartin.onmouseover = function() {
		if (cakeMoving === false && cakeBoolean === false) {
			firstMartin.style.opacity = "0.85";
			firstHat.style.opacity = "0.6";
			firstCake.style.opacity = "0.6";
			firstBalloons.style.opacity = "0.6";
		}
	}

	firstMartin.addEventListener('click', function(event) {
		if (cakeBoolean === false) {
			playBirthdaySound2("sounds/birthdaySound2.mp3");
			cakeBoolean = true; cakeMoving = true;
			firstClickMe.classList.add("hidden");
			firstCake.classList.remove("hidden"); firstHat.classList.remove("hidden"); firstBalloons.classList.remove("hidden"); firstBanner.classList.remove("hidden");
			firstMartin.style.opacity = "1";
			firstHat.style.opacity = "1";
			firstCake.style.opacity = "1";
			firstBalloons.style.opacity = "1";
			moveCake(); moveHat(); moveBalloons(); moveBanner();
		}	
	});

	function moveHat() {
		firstHat.style.top = hatTop + "px";
		hatTop += firstAnimationMoveAmount;

		if (hatTop < 15) {setTimeout(moveHat, 5);}
		else {hatMoving = false;}
	}

	function moveCake() {
		firstCake.style.top = cakeTop + "px";
		cakeTop -= firstAnimationMoveAmount;

		if (cakeTop > 280) {setTimeout(moveCake, 5);}
		else {cakeMoving = false; setTimeout(flipPicFirst, 0); firstClick.classList.remove("hidden");}
	}

	function moveBalloons() {
		firstBalloons.style.top = balloonsTop + "px";
		balloonsTop += firstAnimationMoveAmount;

		if (balloonsTop < -40) {setTimeout(moveBalloons, 5);}
		else {balloonsMoving = false;}
	}

	function moveBanner() {
		firstBanner.style.left = bannerLeft + "px";
		bannerLeft -= firstAnimationMoveAmount2;

		if (bannerLeft > 380) {setTimeout(moveBanner, 5);}
		else {bannerMoving = false;}
	}

	// first page stuff
	firstClick.onclick = function() {body.removeChild(audio1); body.removeChild(audio2); playClickSound("sounds/clickSound.mp3"); first.classList.add("hidden"); secondA.classList.remove("hidden");}

	firstClick.onmouseover = function() {
		firstClick.style["background-color"] = "rgba(252, 147, 130, 0.6)";
		firstClick.style["color"] = "rgba(255, 255, 255, 0.6)";
		firstLove.style.opacity = "0.6";
	}

	firstClick.onmouseout = function() {
		firstClick.style["background-color"] = "rgba(252, 147, 130, 0.85)";
		firstClick.style["color"] = "white";
		firstLove.style.opacity = "1";
	}

	// second page stuff
	// first.classList.add("hidden");
	// secondA.classList.remove("hidden");

	for (var i = 0; i < secondSubmitButtons.length; i++) {
		secondSubmitButtons[i].onclick = function(event) {
			event.preventDefault();

			if (identity === false) {
				var correctAnswer = this.dataset.correct;
				var answer = this.previousElementSibling.value;
				if (answer == correctAnswer) {
					playCorrectSound("sounds/correctSound.mp3");
					this.nextElementSibling.classList.remove("hidden");
					this.nextElementSibling.nextElementSibling.classList.add("hidden");
				}
				else {
					playWrongSound("sounds/wrongSound.mp3");
					this.nextElementSibling.classList.add("hidden");
					this.nextElementSibling.nextElementSibling.classList.remove("hidden");
				}

				var checkmarkList = document.querySelectorAll(".checkmark");
				var correctCount = 0;
				for (var j = 0; j < checkmarkList.length; j++) {
					if (checkmarkList[j].classList.contains("hidden")) {break;}
					else {correctCount++;}
				}
				// correctCount = 5;
				if (correctCount == 5) {
					playCheerSound("sounds/cheerSound.mp3");
					for (var k = 0; k < secondLater.length; k++) {
						identity = true;
						secondLater[k].classList.remove("hidden");
						setTimeout(flipPicSecond, flipPicTimeSecond);
						setTimeout(thatsMe, thatsMeTime);
						setTimeout(randomColor, randomColorTime);
					}
				}
			}
		}
	}

	function playCheer1() {
		playCheerSound("sounds/cheerSound.mp3");
	}

	function playCheer2() {
		playCheerSound("sounds/cheerSound.mp3");
	}

	secondClick.onmouseover = function() {
		secondClick.style["background-color"] = "rgba(252, 147, 130, 0.5)";
		secondClick.style["color"] = "rgba(255, 255, 255, 0.5)";
		secondLove.style.opacity = "0.5";
	}

	secondClick.onmouseout = function() {
		secondClick.style["background-color"] = "rgba(252, 147, 130, 0.8)";
		secondClick.style["color"] = "white";
		secondLove.style.opacity = "1";
	}

	secondClick.onclick = function() {
		body.removeChild(audio6);
		playClickSound("sounds/clickSound.mp3");
		secondA.classList.add("hidden"); 
		// refresh all forms
		document.getElementById("second_form").reset();

		createThirdClass();
	}

	// third page stuff
	function createThirdClass() {
		third = document.createElement("div");
		third.classList.add("third");
		third.innerHTML = '<iframe id="sketch1" src="sketch1.html"></iframe><button class="absolute" id="third_click">Click here to continue &nbsp;  <img id="third_love" src="images/love.png" width="20px"></button>';
		body.appendChild(third);
		thirdClick = document.getElementById("third_click");
		thirdLove = document.getElementById("third_love");

		thirdClick.onmouseover = function() {
			thirdClick.style["background-color"] = "rgba(252, 147, 130, 0.6)";
			thirdClick.style["color"] = "rgba(255, 255, 255, 0.6)";
			thirdLove.style.opacity = "0.6";
		}

		thirdClick.onmouseout = function() {
			thirdClick.style["background-color"] = "rgba(252, 147, 130, 0.85)";
			thirdClick.style["color"] = "white";
			thirdLove.style.opacity = "1";
		}

		thirdClick.addEventListener('click', function(event) {
			playClickSound("sounds/clickSound.mp3");
			third.classList.add("hidden");
			createFourthClass();
		});
	}

	// first.classList.add("hidden");
	// secondA.classList.add("hidden");
	// createThirdClass();
	// third.classList.remove("hidden");


	// fourth page stuff
	function createFourthClass() {
		body.style["background-image"] = 'url("images/stars1.gif")';
		fourth = document.createElement("div");
		fourth.classList.add("fourth");
		fourth.innerHTML = '<iframe id="sketch2" src="sketch2.html"></iframe><button class="absolute" id="fourth_click">Click here to continue &nbsp;</button>';
		body.appendChild(fourth);
		fourthClick = document.getElementById("fourth_click");

		fourthClick.onmouseover = function() {
			fourthClick.style["background-color"] = "rgba(0, 0, 0, 0.6)";
			fourthClick.style["color"] = "rgba(255, 255, 255, 0.6)";
		}

		fourthClick.onmouseout = function() {
			fourthClick.style["background-color"] = "rgba(0, 0, 0, 0.8)";
			fourthClick.style["color"] = "rgba(255, 255, 255, 0.8)";
		}

		fourthClick.addEventListener('click', function(event) {
			playClickSound("sounds/clickSound.mp3");
			body.removeChild(fourth);
			fourth.classList.add("hidden");
			body.style["background-image"] = 'none';
			body.style["background-color"] = "white";
			fifth.classList.remove("hidden");
			createFifthClick();
			setTimeout(createFifthClass1, 200);
			setTimeout(createFifthClass2, 2000);
			setTimeout(createFifthClass3, 7500);

			setTimeout(createFifthClassTemp, 3000);
			setTimeout(wipeFifthClassTemp, 4000);
			setTimeout(createFifthClassTemp, 4500);
			setTimeout(wipeFifthClassTemp, 5500);
			setTimeout(createFifthClassTemp, 6000);
			setTimeout(wipeFifthClassTemp, 7000);
		});
	}

	// first.classList.add("hidden");
	// secondA.classList.add("hidden");
	// createThirdClass();
	// third.classList.add("hidden");
	// createFourthClass();

	// fifth page stuff
	function createFifthClass1() {
		// fifthTemp.classList.add("hidden");
		fifthSub.innerHTML += '<div id="header">My Birthday Message To You &nbsp;<img id="extra_emoji" src="images/emojis/kissy_emoji.png"></div>';
	}

	function createFifthClass2() {
		fifthSub.innerHTML += '<div id="message_pic_div"><img id="message_pic" src="images/together2.png" width="220px"></div>';
	}

	function createFifthClass3() {
		fifthSub.innerHTML += '<div id="message"><p>Hello babe,</p><p>Happy 40th birthday!!! <img class="emoji" src="images/emojis/birthday_cake_emoji.png"><img class="emoji" src="images/emojis/party_emoji.png"><img class="emoji" src="images/emojis/confetti_emoji.png"> Omg, can you believe you’re turning 40?! <img class="emoji" src="images/emojis/shock_emoji.png"> The good news is, based on how people still consistently card you for alcohol, you don\'t look a day over 30. Yay! <img class="emoji" src="images/emojis/smiley_emoji.png"> If someone told me a year ago that the love of my life would turn out to be a 40 year-old handsome white man, I honestly wouldn’t be too surprised! I always knew I was destined to end up with a handsomely adorable white guy who would love me with all his heart, hehe.</p> <p>Soooo, birthday messages are usually where people express how great and important the birthday boy is. But babeee, I already tell you how wonderful you are all the time! And your response would usually fall into the category of “Babeee”, “Babe!” *high pitch, *shy smiles, or “Don’t thank me babe!”.  Nonetheless, I figured I’d honor the birthday tradition and continue to pour my heart out for you here.</p><p>Martin Allan... (*I don’t think I told you this before but I used to have a close friend named Allan, but we don’t speak anymore. I hate him now... Okay this is irrelevant. Let’s restart.)</p> <p>Martin Allan, you are a blueprint for the perfect boyfriend. You are handsome, intelligent, loving, caring, tolerant and so much more. I fell in love with a man who sees me for who I am and loves me the way he would love himself. I’m glad we both got to experience how being in love really feels like and made each other realize the true meaning of love. We do love each other a lot, don’t we? Ahhh, it feels so good to be able to make this statement with such great confidence. THAT is how much we love each other <img class="emoji" src="images/emojis/love_emoji.png"></p> <p>Over the past 7 months, we have undoubtedly grew closer and closer to each other. And what I adore about our relationship is that even though we are dependent on each other, we each have our own voice and we function as two distinct individuals. In fact, us being dependent on each other actually helped better ourselves and our personalities.  To me, that’s what a healthy relationship is. I’d imagine that a professional couples counselor would take one look at us and say, "Oh my, that’s some professional lovey dovey you guys have got going on.” <img class="emoji" src="images/emojis/love_eyes_emoji.png"></p> <p>I am a teacher so you know I have a natural tendency to evaluate how people learn and grow. In terms of physical growth, I am sorry, there was none for either of us. We are of the same height as the day we met, if not shorter (due to old-age shrinking a.k.a negative growth - Let’s not forget who’s turning 40 here <img class="emoji" src="images/emojis/bleh_emoji.png">) In terms of personal growth however, oh wow, our results came back with flying colors. It always touches me when I notice your subtle progress in opening yourself up to me, little by little. You have gotten more and more cheeky lately, that’s for sure! At the restaurant after Selly’s fashion show, you literally made me smack your face in public for the cheeky thing you said. I forgot what it was exactly, but babe, it made me laugh so much and feel so grateful for us being together. When you texted me that the jazz choir was so bad and told me over the phone that you wrote down notes for my choir performance!!! HAHAHA, that was too funny! It warms my heart thinking that I might have played a part in cultivating that cheeky personality of yours. My personality probably acted as a catalyst for the development of "cheeky Martin", hehe <img class="emoji" src="images/emojis/kissy_emoji.png"> Babe, the more I get to know you, the more I’m like awww <img class="emoji" src="images/emojis/love_eyes_emoji.png"> he’s so cute and we’re SO extremely compatible - Introverts rule! Hehe <img class="emoji" src="images/emojis/geeky_emoji.png"></p><p>With you babe, there will ALWAYS be smiles and laughters. Can you even recall a day when we did not make each other smile? Not really. Ever since the day we started texting, not a single day went by without smiles. *Trust me, I remember. You know how my memory works. *This also brings me to the point that not a single day went by without a "good morning" text. Unless we were physically together of course, in which we would say "good morning" in person. Wait, what about days when you went to work early morning and I woke up late in the evening? Then yes, there were no “good morning” rituals on those days, But does that count? Would that invalidate my previous morning-text claim? How would the Constitution of American Texting go about counting these “good morning’s”? Who even wrote the Constitution? Tim Apple? Okay babe, you see how my mind digresses? Please stop digressing my little brain, back to the point please.</p><p>Oh yes, back to laughter. You find me funny! (I guess?) So, I assumed the role of natural comedian in our relationship. I hope you actually do find me funny, or else you’re just fake laughing at me all the time while thinking at the back of your mind, omg this dude is so ANNOYING with the non-stop talking, the unflattering jokes, and the constant requests for me to “not be jealous"… Come on! <img class="emoji" src="images/emojis/angry_emoji.png"> Tehee. But in all seriousness babe, I love that we would laugh together no matter what. So much quality time spent together, am I right? Hehe, I guess that’s why we enjoy each other’s company so so much <img class="emoji" src="images/emojis/geeky_emoji.png"></p><p>Hahaha, you\'re also so childish!!! Buying bananas with cat stickers, owning glasses with Snoopy prints, driving with panda Max, smiling like a baby hamster all the time <img class="emoji" src="images/hamster.png"> etc etc. I LOVE IT! Hehe. The moment I saw the kitty salt-shaker and Snoopy glasses in your kitchen, I instinctively knew that we would be perfect together <img class="emoji" src="images/emojis/kissy_emoji.png"> So yeah, to sum this up: similar levels of humor and childishness make the perfect couple <img class="emoji" src="images/emojis/love_emoji.png"></p><p>Oh my, there is just so So SO much more that I want to mention here (as if you don’t hear enough from me already…) I keep adding bullet points at the bottom of the page but I’ll HAVE to stop somewhere... This is turning into a Martin Allan thesis!!! And given how much I despise writing, I am as shocked as you are (while you’re reading this) that I’m still typing typing away. This is different from academic writing I guess. It’s more of a reflection on our relationship while trying to put together a memorable birthday gift for you. *A peek behind the scenes: I wrote this thesis on the bus ride to Boston, haha. I told you I would sleep in the bus so I could focus on writing this without any of your distracting texts <img class="emoji" src="images/emojis/laugh_emoji.png"> In some sense, I was “texting” you all along. It’s just that you won\'t notice it until you receive your birthday gift <img class="emoji" src="images/emojis/kissy_emoji.png"></p><p>Wow babe, I really did not expect for my birthday message to you to turn out so longggg. I hope you did not give up halfway through reading this, in which if you did give up, means you won\'t be reading this section of me hoping that you wouldn\'t give up anyway… <img class="emoji" src="images/emojis/sad_emoji.png"> On the other hand, if you did power through, congratulations! I love you, hehe and your secret word is “calico”. *Enter the secret word in the next page and see what happens!</p><p>Alright babe, that\'s all from me. I wanted to include a section to talk about the process of constructing this birthday e-card, but I figured it’s more fun if I told you all about it in person. As of now (March 29th 2019, 12:20PM), there are two more sections of your e-card that I planned to make but have not started coding yet. Omg, I have so much other school work going on too, which means I really need to grab every minute available to finish this present for you! <img class="emoji" src="images/emojis/shock_emoji.png"> *I’m also editing this right next to you after you passed out drunk btw, hehe. You\'re sleeping in my spot! HAHAHA!</p><p>PS babe, I do pride myself as a gift-giving wizard, so don\'t stress too much on my gift when my birthday comes, okay? Don’t let this intimidate you so you end up buying me a car or something... I can’t drive! <img class="emoji" src="images/emojis/laugh_emoji.png"> A thoughtful gift from you would suffice <img class="emoji" src="images/emojis/angel_emoji.png"> But NO gift is UNACCEPTABLE - given the amount of time I spent on your birthday program. And lastly, FORGETTING about my birthday would result in a DEATH SENTENCE issued by the Department of Khye Borg and Panda Conservation <img class="emoji" src="images/emojis/panda_emoji.png"></p><p>PS2: I purposely made this page look aesthetically simple to create some sort of sentimental vibe here. I hope it worked, hehe <img class="emoji" src="images/emojis/smiley_emoji.png"></p><p>Final PS: Long-lasting licks (varying in speed, intensity, suction, and duration) in response to this birthday present is HIGHLY encouraged <img class="emoji" src="images/emojis/yummy_emoji.png"><img class="emoji" src="images/emojis/drooling_emoji.png"></p><p>HAPPY BIRTHDAY AGAIN BABE!!! I LOVE YOU! <img class="emoji" src="images/emojis/love_emoji.png"><p id="float_paragraph">Your boyfriend, <br>Khye Borg <img class="emoji" src="images/emojis/geeky_emoji.png"></p></div>';		
		fifthClick.classList.remove("hidden");
	}

	function createFifthClassTemp() {
		fifthTemp.innerHTML = "Wait for it...";
	}

	function wipeFifthClassTemp() {
		fifthTemp.innerHTML = "";
	}

	function createFifthClick() {
		fifthClick.onmouseover = function() {
			fifthClick.style["background-color"] = "rgba(254, 202, 57, 0.6)";
			fifthClick.style["color"] = "rgba(255, 255, 255, 0.85)";
			fifthLove.style.opacity = "0.3";
		}

		fifthClick.onmouseout = function() {
			fifthClick.style["background-color"] = "rgba(0, 0, 0, 0.85)";
			fifthClick.style["color"] = "white";
			fifthLove.style.opacity = "1";
		}

		fifthClick.addEventListener('click', function(event) {
			playClickSound("sounds/clickSound.mp3");
			fifth.classList.add("hidden");
			sixth.classList.remove("hidden");
			body.style["background-color"] = 'white';
		});
	}

	// first.classList.add("hidden");
	// secondA.classList.add("hidden");
	// fifth.classList.remove("hidden");

	// sixth page stuff
	// first.classList.add("hidden");
	// secondA.classList.add("hidden");
	// third.classList.add("hidden");
	// fourth.classList.add("hidden");
	// fifth.classList.add("hidden");
	// sixth.classList.remove("hidden");
	// body.style["background-image"] = 'none';
	// body.style["background-color"] = 'white';

	sixthAnswer.addEventListener('click', function(event) {
		event.preventDefault();
		var answer2 = event.currentTarget.previousElementSibling.value;
		if (answer2 === "calico") {
			playCorrectSound("sounds/correctSound.mp3");
			sixthPassword.classList.add("hidden");
			body.style["background-image"] = 'url("images/confetti3.gif")';
			sixthPresentDiv.classList.remove("hidden");
			this.nextElementSibling.classList.remove("hidden");
			this.nextElementSibling.nextElementSibling.classList.add("hidden");
			document.getElementById("sixth_form").reset();
		}
		else {
			playWrongSound("sounds/wrongSound.mp3");
			this.nextElementSibling.classList.add("hidden");
			this.nextElementSibling.nextElementSibling.classList.remove("hidden");
		}
	});

	sixthPresent.onmouseover = function() {
		if (sixthControl === false) {
			sixthPresent.style.opacity = "0.7";
		}
	}

	sixthPresent.onmouseout = function() {
		sixthPresent.style.opacity = "1";
	}

	sixthPresent.addEventListener('click', function(event) {
		if (sixthControl === false) {
			sixthPresent.src = "";
			playDrumSound("sounds/drumSound.mp3");
			sixthStatement.style.width = "180px";
			sixthStatement.innerHTML = "What's inside??!!"
			setTimeout(openPresent, 4000);
			setTimeout(playCheer2, 4000);
			setTimeout(playLastSong, 12500);
		}
	});

	function openPresent() {
		sixthControl = true;
		sixthPresent.src = "images/frame.png";
		sixthPresent.style.top = "95px";
		sixthPresent.style.left = "0px";
		sixthPresent.style.margin = "auto";
		sixthPresent.style.border = "1px solid rgba(251, 68, 54, 0.85)";
		sixthStatement.style.width = "720px";
		sixthStatement.innerHTML = "It's a picture of you and me!!!";
		sixthStatement.style.left = "0px";
		sixthStatement.style.margin = "auto";
		sixthStatementExtra.classList.remove("hidden");
		sixthStatementExtra.style.margin = "auto";
		document.getElementById("sixth_spaces").classList.remove("hidden");
	}
}
























