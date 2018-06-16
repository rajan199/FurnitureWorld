<?php 
$opass = 'ram1';
$passmd5 = md5($opass);
$passsha1 = sha1($passmd5);
$passcrypt = crypt($passsha1,'pk');
echo "<br>".$passcrypt;

echo "<br>-----------<br>";
echo uniqid();
 ?>