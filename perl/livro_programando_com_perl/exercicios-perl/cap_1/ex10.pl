#!/usr/bin/perl
# Exercício 1.10 - Converter binário em decimal.

use 5.14.0;
use strict;
use warnings;

say "Digite a parada:";
chomp(my $bin = <STDIN>);

my $cont = 0;
my @bins;

for ( my $div = 10; $div <= $bin * 10; $div *= 10 )
{
	@bins[$cont++] = ($bin % $div - $bin % ($div/10))/($div/10);
}

my $n = 0;

until ( $cont eq 0 )
{
	$bin = $bins[--$cont];

	if ( $n || $bin )
	{
		$n = $n * 2 + $bin;
	}
}

say $n;
