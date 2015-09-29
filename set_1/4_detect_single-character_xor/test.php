<?php
// file example 1: read a text file into an array, with
// each line in a new element

$filename="4.txt"; 
$lines = array();
$file = fopen($filename, "r");
while(!feof($file)) {

    //read file line by line into a new array element
    $lines[] = fgets($file, 4096);

}
fclose ($file);
print_r($lines);
?>
