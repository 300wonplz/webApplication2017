<?php
  /*
    Array
  */
  // $a = array("A", "B", "C", "D", "E");
  // print_r($a);
  // print "<br />";
  // for($i = 0 ; $i < count($a); $i++){
  //   $a[$i] = strtolower($a[$i]);
  // }
  // print_r($a);

  /*
    NULL
  */
  // $name = "Victoria";
  // $name = NULL;
  // if (isset($name)) {
  //   print "This line isn't going to be reached.\n";
  // }

  /*
    File
  */
  $a = file_get_contents("foo.txt");
  print $a;
?>
