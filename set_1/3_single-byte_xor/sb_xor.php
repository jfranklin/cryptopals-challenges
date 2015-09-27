<?php

$input = "1b37373331363f78151b7f2b783431333d78397828372d363c78373e783a393b3736";
$output = "";
$work = hex2bin($input);

echo strlen($input) . " " . $input . "\n";
echo strlen($work) . " " . $work . "\n";

for ($i=0; $i < strlen($work); $i++) {
    $output .= $work{$i} ^ 'X';
}

echo strlen($output) . " " . $output . "\n";

?>
