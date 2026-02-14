<?php

//krijo nje file te ri me fopen
// $my_file = fopen("ds.txt", "w");

$myfile = fopen("ds.txt", "w");

 //    while(!feof($myfile)){
  //      echo fgets($myfile). "<br>";
  //   }

  // fclose($myfile);

$text = "Digital School";

fwrite($myfile, $text);

$myfile = fopen("ds.txt", "r");

while(!feof($myfile)){
    echo fgets($myfile). "<br>";
}



?>