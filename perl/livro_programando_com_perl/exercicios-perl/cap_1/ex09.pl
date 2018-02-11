#!/usr/bin/perl
# Exercício 1.9: Verificar se um número é igual mesmo invertido.

use 5.14.0;
use strict;
use warnings;

say "Digite um número:";
chomp(my $n = <STDIN>);

my $cont = 0;
my $div;
my @nums;

for ( $div = 10; $div < $n * 10; $div *= 10 )
{
	@nums[$cont++] = ($n % $div - $n % ($div/10))/($div/10);
}

my $n_inv = 0;
$div /= 10;

foreach my $num(@nums)
{
	$div /= 10;
	$n_inv += $num * $div;
}

say $n_inv == $n ? "==" : "!=";
