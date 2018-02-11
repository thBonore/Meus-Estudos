#!/usr/bin/perl
# Exercício 1.5: Separar números e imprimir astericos para cada resultado.

use 5.14.0;
use strict;
use warnings;

say "Digite um número:";
chomp(my $n = <STDIN>);

my $cont = 0;
my @nums;

for ( my $div = 10; $div < $n * 10; $div *= 10 )
{
	@nums[$cont++] = ($n % $div - $n % ($div/10))/($div/10);
}

until ( $cont eq 0 )
{
	say "*" x $nums[--$cont];
}
