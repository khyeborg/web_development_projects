<!-- Hey there

<a href="foo.php?name=pikachu">Pika</a>
<br>
<a href="foo.php?name=squirtle">Squirtle</a>
<br>
<a href="foo.php?name=charmander">Charmander</a>
<br> -->

<?php

	// comment
	# just like python
	/* multi line like js or java */

	// error_reporting(E_ALL);
	// ini_set("display_errors", 1); // runtime errors would be reported to the user in a verbose way

	$answer = $_GET['n1'] + $_GET['n2'];

	print "The answer is $answer";

	/*
	if ($_GET['name'] == 'pikachu') {
		print "pika pika";
	}
	else if ($_GET['name'] == 'squirtle') {
		print "squirtle";
	}
	else {
		print "???";
	} 

	// php packages up everything after the ? into a dictionary
	print "You sent: " . $_GET['name']; //http://localhost:8888/webdev/day15/foo.php?name=pikachu - send data through url
	*/

	/* $whatever = "5" + 5 + 10;
	print $whatever;

	for ($i = 0; $i < 10; $i++) {
		print $i . "\n" . "<br>";
	} */

	/*
	// every variable in php needs to begin with a $ sign
	$whatever = true;

	// print $whatever;

	// primitive data type in php: strings, integers, floats, booleans

	// boolean - if the value is true: 1, if the value is false: 0

	var_dump($whatever); // shows you the data type of a variable

	print 'pikachu says $whatever'; // $whatever will be printed as string
	print "pikachu says $whatever"; // when double quotes is used, the variable is evaluated, double quotes make php work a little harder and interpret variables
	*/

	/* print "hello";
	print "<br>";
	echo "hello";

	print "hello " + " goodbye"; // the plus operator in php is solely used for numbers, php will treat anything that are not numbers as zero 0
	print "hello " . " goodbye"; 

	print 5 / 0;

	// debugging php stuff is frustrating... 
	print "hello ";
	print "wowww "; */


	// php has no role but to work as a server side soldier 
	/*if (5 > 2) {
		print "hi"; // print is  a command, not a function 
	}
	else {
		print "bye";
	}*/

?>
<!-- All done -->