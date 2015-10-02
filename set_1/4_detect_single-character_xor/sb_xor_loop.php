<?php

require_once '../../functions/singleByteXOR.php';

if ($argc > 1) {
  $filename = $argv[1];
} else {
  $filename="4.txt";
}

$lines = array();
$file = fopen($filename, "r");
while(!feof($file)) {

    //read file line by line into a new array element
    $lines[] = trim(fgets($file, 4096));
    //remove blank lines, suppress empty element left by editors
    $lines = array_filter($lines);

}
fclose ($file);

$linesKey   = [];  //store best scoring key for each line
$linesScore = [];  //store best score for each line

foreach ($lines as $lineNumber => $line) {

  $scores = findSingleByteXOR(hex2bin($line));

  arsort($scores);

  $keyCount = 0;
  foreach ($scores as $key => $value) {
    if ($keyCount < 1) {
      $linesKey[$lineNumber] = $key;
      $linesScore[$lineNumber] = $value;
    } else {
      break;
    }

    $keyCount++;
  }
}

arsort($linesScore);

$lineCount = 0;
printf("LINE KEY KEY#  SCORE       OUTPUT\n");
foreach ($linesScore as $lineNumber => $lineScore) {
  //return the top scoring entries in the file
  if ($lineCount < 5) {
    $decrypt = singleByteXOR(hex2bin($lines[$lineNumber]), chr($linesKey[$lineNumber]));
    printf("#%1$'03u '%2$1c' (%2$'03u) %3$+09.3f : %4$1s\n",$lineNumber, $linesKey[$lineNumber], $linesScore[$lineNumber], $decrypt);
  }

  $lineCount++;
}

?>
