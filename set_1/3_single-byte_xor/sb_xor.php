<?php

require 'letterScore.php';

$input = hex2bin("1b37373331363f78151b7f2b783431333d78397828372d363c78373e783a393b3736");
$inputLength = strlen($input);
$scores = [];


for ($kv=0; $kv < 256; $kv++) {
  $charScore = 0;
  $plainText = "";

  for ($i=0; $i < $inputLength; $i++) {
    $plainText .= $input{$i} ^ chr($kv);
  }

  $charScore = englishLetterWeight($plainText, 0.5);

  $scores[chr($kv)] = $charScore;

}

arsort($scores);

$keyCount = 0;
foreach ($scores as $key => $value) {
  if ($keyCount < 5) {
    $decrypt = '';

    for ($i=0; $i < $inputLength; $i++) {
      $decrypt .= $input{$i} ^ $key;
    }

    echo "'$key' (" . ord($key) . ") : " . $decrypt . "\n";
  } else {
    break;
  }

  $keyCount++;

}

?>
