#!/usr/bin/perl
# Exercício 2.1: Conversão para números romanos com módulos CPAN.

use 5.14.0;
use strict;
use warnings;

use Scalar::Util "looks_like_number";
use Number::Convert::Roman;

my $n;
my $valido = 1;

do
{
	say $valido ? "Digite um número" : "Número inválido, tente outro";
	chomp( $n = <STDIN> );
	$valido = looks_like_number $n;
} while( !$valido );

say "$n em números romanos fica ", Number::Convert::Roman->new->roman( $n );
