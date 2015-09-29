<?php

require 'hex2base64.php';

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

?>
