<?php

$first = "1c0111001f010100061a024b53535009181c";

$second = "686974207468652062756c6c277320657965";

$target = "746865206b696420646f6e277420706c6179";


$fout = hex2bin($first);
$sout = hex2bin($second);

$output = bin2hex($fout ^ $sout);

echo "Output: $output\n";
echo "Target: $target\n";

if ($output == $target) {
  echo "Match\n";
} else {
  echo "No match\n";
}
?>
