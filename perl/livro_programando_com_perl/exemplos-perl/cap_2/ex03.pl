#!/usr/bin/perl
#exemplo 2.3

use Scalar::Util "looks_like_number"; 

$numero = 100;
if (looks_like_number $numero){ 
	print $numero."\n";
}
