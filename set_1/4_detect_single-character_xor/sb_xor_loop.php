<?php

require 'letterScore.php';

$filename="4.txt";
$lines = array();
$file = fopen($filename, "r");
while(!feof($file)) {

    //read file line by line into a new array element
    $lines[] = trim(fgets($file, 4096));

}
fclose ($file);


foreach ($lines as $lineNumber => $line) {

  $input = hex2bin($line);
  $inputLength = strlen($input);
  $scores = [];

  for ($kv=0; $kv < 256; $kv++) {
    $charScore = 0;

    $plainText = $input ^ str_repeat(chr($kv), $inputLength);
    $charScore = englishLetterWeight($plainText, 5);

    $scores[$kv] = $charScore;

  }

  arsort($scores);

  $keyCount = 0;
  foreach ($scores as $key => $value) {
    if ($value > 150) {
      if ($keyCount < 1) {
        $decrypt = $input ^ str_repeat(chr($key), $inputLength);

        printf("#%'03u '%1c' (%'03u) : %s\n",$lineNumber,$key,$key,$decrypt);

      } else {
        break;
      }

      $keyCount++;
    }
  }
}

?>
