<?php

require 'letterScore.php';

$input = hex2bin("1b37373331363f78151b7f2b783431333d78397828372d363c78373e783a393b3736");
$inputLength = strlen($input);
$scores = [];

function sb_xor($encryptedString, $xor_key) {
  $decryptedString = '';

  for ($i = 0; $i < strlen($encryptedString); $i++) {
    $decryptedString .= $encryptedString{$i} ^ $xor_key;
  }

  return $decryptedString;
}

for ($kv=0; $kv < 256; $kv++) {
  $charScore = 0;

  $plainText = sb_xor($input, chr($kv));

  $charScore = englishLetterWeight($plainText, 0.5);

  $scores[chr($kv)] = $charScore;

}

arsort($scores);

$keyCount = 0;
foreach ($scores as $key => $value) {
  if ($keyCount < 5) {
    $decrypt = sb_xor($input, $key);

    echo "'$key' (" . ord($key) . ") : " . $decrypt . "\n";
  } else {
    break;
  }

  $keyCount++;

}

?>
