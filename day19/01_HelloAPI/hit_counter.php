<?php

  // define file path to our data folder
  $path = '/Users/craigkapp/Documents/MAMP/Class_Source_Code/CSCIUA-0061 - Web Development/24_APIs/01_HelloAPI/data';

  // get incoming variables
  $command = $_GET['command'];
  $id = $_GET['id'];

  // ensure that the id being passed in is numeric - if not, fail out here
  if (!is_numeric($id)) {
    print "error";
    exit;
  }

  // id is numeric - define the filename so we don't have to keep typing it
  $filename = $path. "/$id.txt";

  // command: record_hit
  // records a new hit for the supplied id
  if ($command == 'record_hit') {
    // record the time of this hit
    file_put_contents($filename, time()."\n", FILE_APPEND);
    print "ok";
    exit;
  }

  // command: get_hit_count
  // returns the # of hits recorded in the supplied id
  if ($command == 'get_hit_count') {
    if (!file_exists($filename)) {
      print "0";
    }
    else {
      $data = file_get_contents($filename);
      $lines = explode("\n", $data);
      print sizeof($lines);
    }
    exit;
  }

  // command: get_all_hits
  // returns all data from the supplied id
  if ($command == 'get_all_hits') {
    if (!file_exists($filename)) {
      print "";
    }
    else {
      $data = file_get_contents($filename);
      print $data;
    }
    exit;
  }

  // unrecognized command!
  print "unknown command";
  exit;

?>
