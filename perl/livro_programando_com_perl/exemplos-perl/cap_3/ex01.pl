#!/usr/bin/perl
#expressoes regulares

use 5.14.0;
use strict;
use warnings;

my $str;

do {
	chomp($str = <STDIN>);
	
	say $str =~ "pão" ? "No céu tem pão?" : "\n";
} while( $str ne "tchau" );

say "...e morreu!!";
