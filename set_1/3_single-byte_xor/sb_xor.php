<?php

require_once '../../functions/singleByteXOR.php';

if ($argc > 1) {
  $input = hex2bin($argv[1]);
} else {
  $input = hex2bin("1b37373331363f78151b7f2b783431333d78397828372d363c78373e783a393b3736");
}

$scores = findSingleByteXOR($input);

arsort($scores);

$keyCount = 0;
foreach ($scores as $key => $value) {
  if ($keyCount < 5) {
    $decrypt = singleByteXOR($input, chr($key));
    printf("'%1$1c' (%1$'03u) %2$+09.3f : %3$1s\n", $key, $value, $decrypt);
  } else {
    break;
  }

  $keyCount++;

}

?>
