<?php
require("rsa.class");
if(isset($_GET['pr'])){
    set_time_limit ( 100 );
    $disp="";
    $pr= $_GET['pr'];
    $rsa= new rsa($pr);
	$rsa->generate();
    $txt="Lorem ipsum dolor Curabiturat dolor sollicitudin, tempus libero nec, tempor mauris. Nam finibus tempus arcu, in laoreet nisl tincidunt ac. Nam velit sapien, sagittis sit amet arcu vehicula, pulvinar vehicula justo. Mauris facilisis lacus quam, eget hendrerit lectus imperdiet vel. Morbi vulputate eros quam, eget scelerisque urna gravida eget. Curabitur imperdiet odio sit amet sagittis ornare. Donec semper quam vel posuere scelerisque. Fusce in efficitur justo. Aliquam blandit, augue scelerisque eleifend ornare, libero arcu interdum metus, vitae bibendum elit felis quis quam. Nulla sed elementum diam, non dictum massa. Donec dictum eleifend mi ac laoreet.";
    $disp ="Total execution time= : ".$rsa->t." seconds".'<br><br>';
    //$disp .="______Public Exponent______:".'<br>'.$rsa->f.'<br><br>';
    $disp.="______Modulus (also refered to as public key)______:".'<br>'.$rsa->n.'<br><br>';
    $disp.="______Private Exponent (also refered to as private key)______:".'<br>'.$rsa->d.'<br><br>';
    $disp.= "______Number of digits (decimals for private and public keys)______:".'<br>'.strlen(base64_decode($rsa->n)).'<br><br>';
	$txt2=$rsa->enc($txt,"some password or signature here");
	$disp.= "______Plain texte______:".'<br>'.$txt.'<br><br>';
    $disp.= "______Encrypted______:".'<br>'.$txt2.'<br><br>';
	$txt3=$rsa->dec($txt2,"some password or signature her");
    $disp.= "______Decrypted______:".'<br>'.$txt3;
    echo $disp;
    
}

?>