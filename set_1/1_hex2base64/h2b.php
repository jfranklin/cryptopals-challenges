<?php

require 'hex2base64.php';

if ($argc == 1) {
  $input = "49276d206b696c6c696e6720796f757220627261696e206c696b65206120706f69736f6e6f7573206d757368726f6f6d";

  $target = "SSdtIGtpbGxpbmcgeW91ciBicmFpbiBsaWtlIGEgcG9pc29ub3VzIG11c2hyb29t";

  $output = hex2base64($input);

  echo "Input : $input\n";
  echo "Target: $target\n";
  echo "Output: $output\n";

  if ($target == $output) {
    echo "Match\n";
  } else {
    echo "No match\n";
  }
} elseif ($argc == 2) {
  $input  = $argv[1];

  if (strlen($input) % 2 != 0) {
    echo "Hex input must contain an even number of digits.\n";
    exit(1);
  } else {
    $output = hex2base64($input);
    echo $output . "\n";
  }
} else {
  echo "Single hex string only.\n";
}
?>
