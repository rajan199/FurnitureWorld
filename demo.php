<?php

$r="admin";
$md5pass=md5($r);
$sha1pass=sha1($md5pass);
$cryptpass=crypt($sha1pass,'pk');

echo "answer is ". $cryptpass;
?>