<?php
require_once 'letterScore.php';

function singleByteXOR($inputText, $chrKey) {
  $outputText = $inputText ^ str_repeat($chrKey, strlen($inputText));
  return $outputText;
}

function findSingleByteXOR($cipherText) {
  for ($kv=0; $kv < 256; $kv++) {
    $charScore = 0;

    $plainText = singleByteXOR($cipherText, chr($kv));
    $charScore = englishLetterWeight($plainText, 5);

    $scores[$kv] = $charScore;
  }

  return $scores;
}
?>
