<?php

require '../../functions/letterScore.php';

$input = hex2bin("1b37373331363f78151b7f2b783431333d78397828372d363c78373e783a393b3736");
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
  if ($keyCount < 5) {
    $decrypt = $input ^ str_repeat(chr($key), $inputLength);
    echo chr($key) . " ($key) : " . $decrypt . "\n";

  } else {
    break;
  }

  $keyCount++;

}

?>
