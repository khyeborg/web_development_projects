<?php
	include('config.php');
 	$num = $_POST['num'];

 	if ($num === "1") {
 		file_put_contents($path . '/messages2.txt', "");
 		$data = file_get_contents($path . '/messages2.txt');
 		print $data;
 	}

 	else if ($num === "2") {
 		file_put_contents($path . '/messages3.txt', "");
 		$data = file_get_contents($path . '/messages3.txt');
 		print $data;
 	}

 	else if ($num === "3") {
 		file_put_contents($path . '/messages4.txt', "");
 		$data = file_get_contents($path . '/messages4.txt');
 		print $data;
 	}

 	else if ($num === "4") {
 		$content = $_POST['content'];
 		file_put_contents($path . '/badwords.txt', $content);
 		$data = file_get_contents($path . '/badwords.txt');
 		print $data;
 	}

 	else if ($num === "5") {
 		header('Location: index.php');
 		exit;
 	}

?>