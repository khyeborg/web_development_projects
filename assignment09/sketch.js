function setup() {
  createCanvas(700, 450);
  frameRate(40);
}

var y = 0;

function draw() {
  if (success == true) {
  y += 2;

  if (y % 20 == 0) {
    y *= -1;
  }
  
  background(255);
  
  // no outline
  noStroke();
  
  if (y > 0) {
    // wingglytuff
    fill(250, 220, 228);
    rect(20, 125 + y, 200, 200, 20);

    // wingglytuff's mouth
    fill(249, 244, 248);
    rect(45, 225 + y, 150, 100);
    fill(139, 63, 62);
    rect(90, 235 + y, 60, 25);
    fill(234, 140, 154);
    rect(100, 245 + y, 40, 15);

    // wingglytuff's eyes
    fill(255);
    rect(35, 170 + y, 50, 60);
    rect(155, 170 + y, 50, 60)
    fill(28, 122, 147);
    rect(50, 180 + y, 35, 40);
    rect(155, 180 + y, 35, 40);
    fill(255);
    rect(65, 185 + y, 15, 15);
    rect(160, 185 + y, 15, 15);
    fill(122, 165, 182);
    rect(60, 212 + y, 20, 8);
    rect(160, 212 + y, 20, 8);

    // wingglytuff's forehead
    fill(230, 197, 204);
    rect(75, 145 + y, 85, 10, 20);
    fill(250, 220, 228);
    rect(85, 139 + y, 65, 10, 10);
    fill(230, 197, 204);
    rect(75, 125 + y, 10, 23);
    rect(150, 125 + y, 10, 23);

    // charmander
    fill(247, 186, 133);
    rect(250, 125 - y, 200, 200, 20);

    // charmander's eyes
    fill(29, 45, 49); 
    rect(275, 150 - y, 35, 65);
    rect(390, 150 - y, 35, 65);
    fill(60, 109, 126);
    rect(275, 195 - y, 35, 20)
    rect(390, 195 - y, 35, 20)
    fill(26, 33, 41);
    rect(285, 165 - y, 15, 40);
    rect(400, 165 - y, 15, 40);
    fill(255);
    rect(295, 155 - y, 10, 20);
    rect(395, 155 - y, 10, 20);

    // charmander's mouth
    fill(160, 111, 141);
    rect(275, 245 - y, 150, 55);
    fill(201, 153, 191);
    rect(290, 270 - y, 120, 30);
    fill(255);
    rect(300, 285 - y, 15, 15);
    rect(385, 285 - y, 15, 15);
    rect(285, 245 - y, 18, 18);
    rect(397, 245 - y, 18, 18);

    // charmander's nose 
    fill(206, 152, 116);
    rect(340, 225 - y, 5, 12)
    rect(355, 225 - y, 5, 12)

    // poliwag
    fill(102, 148, 207);
    rect(480, 125 + y, 200, 200, 20);

    // poliwag's tummy
    fill(250, 250, 250);
    rect(500, 215 + y, 160, 110, 10);
    fill(54, 40, 40);
    rect(520, 230 + y, 15, 95);
    rect(525, 230 + y, 100, 15);
    rect(625, 230 + y, 15, 95);
    rect(550, 310 + y, 80, 15); 
    rect(550, 265 + y, 15, 60);
    rect(550, 260 + y, 60, 15);
    rect(595, 265 + y, 15, 35);
    rect(580, 285 + y, 30, 15);

    // poliwag's eyes
    fill(255);
    rect(500, 145 + y, 50, 50);
    rect(610, 145 + y, 50, 50);
    fill(0);
    rect(510, 145 + y, 40, 40);
    rect(610, 145 + y, 40, 40);
    fill(255);
    rect(528, 153 + y, 15, 15);
    rect(617, 153 + y, 15, 15);

    // poliwag's mouth
    fill(241, 200, 217);
    rect(560, 195 + y, 40, 30);
    fill(78, 46, 67);
    rect(570, 205 + y, 20, 10);
  }
  
  else {
    // wingglytuff
    fill(250, 220, 228);
    rect(20, 125 - y, 200, 200, 20);

    // wingglytuff's mouth
    fill(249, 244, 248);
    rect(45, 225 - y, 150, 100);
    fill(139, 63, 62);
    rect(90, 235 - y, 60, 25);
    fill(234, 140, 154);
    rect(100, 245 - y, 40, 15);

    // wingglytuff's eyes
    fill(255);
    rect(35, 170 - y, 50, 60);
    rect(155, 170 - y, 50, 60)
    fill(28, 122, 147);
    rect(50, 180 - y, 35, 40);
    rect(155, 180 - y, 35, 40);
    fill(255);
    rect(65, 185 - y, 15, 15);
    rect(160, 185 - y, 15, 15);
    fill(122, 165, 182);
    rect(60, 212 - y, 20, 8);
    rect(160, 212 - y, 20, 8);

    // wingglytuff's forehead
    fill(230, 197, 204);
    rect(75, 145 - y, 85, 10, 20);
    fill(250, 220, 228);
    rect(85, 139 - y, 65, 10, 10);
    fill(230, 197, 204);
    rect(75, 125 - y, 10, 23);
    rect(150, 125 - y, 10, 23);

    // charmander
    fill(247, 186, 133);
    rect(250, 125 + y, 200, 200, 20);

    // charmander's eyes
    fill(29, 45, 49); 
    rect(275, 150 + y, 35, 65);
    rect(390, 150 + y, 35, 65);
    fill(60, 109, 126);
    rect(275, 195 + y, 35, 20)
    rect(390, 195 + y, 35, 20)
    fill(26, 33, 41);
    rect(285, 165 + y, 15, 40);
    rect(400, 165 + y, 15, 40);
    fill(255);
    rect(295, 155 + y, 10, 20);
    rect(395, 155 + y, 10, 20);

    // charmander's mouth
    fill(160, 111, 141);
    rect(275, 245 + y, 150, 55);
    fill(201, 153, 191);
    rect(290, 270 + y, 120, 30);
    fill(255);
    rect(300, 285 + y, 15, 15);
    rect(385, 285 + y, 15, 15);
    rect(285, 245 + y, 18, 18);
    rect(397, 245 + y, 18, 18);

    // charmander's nose 
    fill(206, 152, 116);
    rect(340, 225 + y, 5, 12)
    rect(355, 225 + y, 5, 12)

    // poliwag
    fill(102, 148, 207);
    rect(480, 125 - y, 200, 200, 20);

    // poliwag's tummy
    fill(250, 250, 250);
    rect(500, 215 - y, 160, 110, 10);
    fill(54, 40, 40);
    rect(520, 230 - y, 15, 95);
    rect(525, 230 - y, 100, 15);
    rect(625, 230 - y, 15, 95);
    rect(550, 310 - y, 80, 15); 
    rect(550, 265 - y, 15, 60);
    rect(550, 260 - y, 60, 15);
    rect(595, 265 - y, 15, 35);
    rect(580, 285 - y, 30, 15);

    // poliwag's eyes
    fill(255);
    rect(500, 145 - y, 50, 50);
    rect(610, 145 - y, 50, 50);
    fill(0);
    rect(510, 145 - y, 40, 40);
    rect(610, 145 - y, 40, 40);
    fill(255);
    rect(528, 153 - y, 15, 15);
    rect(617, 153 - y, 15, 15);

    // poliwag's mouth
    fill(241, 200, 217);
    rect(560, 195 - y, 40, 30);
    fill(78, 46, 67);
    rect(570, 205 - y, 20, 10);
  }
}
}