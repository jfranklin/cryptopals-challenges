<?php

function hex2base64($hex) {
  $base64 = base64_encode(pack(H*, $hex));
  return $base64;
}

?>
