<?php
/*

Taken from https://en.wikipedia.org/wiki/Letter_frequency

In English, the space is slightly more frequent than the top letter (e) and
the non-alphabetic characters (digits, punctuation, etc.) collectively occupy
the fourth position (having already included the space) between t and a.

e	12.702%
t	9.056%
a	8.167%
o	7.507%
i	6.966%
n	6.749%
s	6.327%
h	6.094%
r	5.987%
d	4.253%
l	4.025%
c	2.782%
u	2.758%
m	2.406%
w	2.361%
f	2.228%
g	2.015%
y	1.974%
p	1.929%
b	1.492%
v	0.978%
k	0.772%
j	0.153%
x	0.150%
q	0.095%
z	0.074%
/**/


function englishLetterWeight($textToScore, $characterPenalty = 0) {

  $englishLetterWeights = [
    'e' => 12.702,
    't' => 9.056,
    'a' => 8.167,
    'o' => 7.507,
    'i' => 6.966,
    'n' => 6.749,
    's' => 6.327,
    'h' => 6.094,
    'r' => 5.987,
    'd' => 4.253,
    'l' => 4.025,
    'c' => 2.782,
    'u' => 2.758,
    'm' => 2.406,
    'w' => 2.361,
    'f' => 2.228,
    'g' => 2.015,
    'y' => 1.974,
    'p' => 1.929,
    'b' => 1.492,
    'v' => 0.978,
    'k' => 0.772,
    'j' => 0.153,
    'x' => 0.150,
    'q' => 0.095,
    'z' => 0.074
  ];

  foreach ($englishLetterWeights as $k => $v) {
    $englishLetterWeights[strtoupper($k)] = $v;
  }

  $englishLetterWeights += [
    '0' => 8.167,
    '1' => 8.167,
    '2' => 8.167,
    '3' => 8.167,
    '4' => 8.167,
    '5' => 8.167,
    '6' => 8.167,
    '7' => 8.167,
    '8' => 8.167,
    '9' => 8.167,
    '\'' => 8.167,
    '"' => 8.167,
    '.' => 8.167,
    ',' => 8.167,
    '!' => 8.167,
    '?' => 8.167,
    ' ' => 13.000
  ];


  $characterScore = 0;

  for ($position=0; $position < strlen($textToScore); $position++) {
    $character = $textToScore{$position};

    if (isset($englishLetterWeights[$character])) {
      $characterScore += $englishLetterWeights[$character];
    } else {
      $characterScore -= $characterPenalty;
    }

  }

  return $characterScore;

}

?>
