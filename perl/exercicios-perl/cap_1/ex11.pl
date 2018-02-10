#!/usr/bin/perl
# Exemplo 1.11: Menor, maior e média indefinidamente.

use 5.14.0;
use strict;
use warnings;

my (@nums, $media);
my $cont = 0;
my $menor = 0;
my $maior = 0;

do
{
	say "Digite um número";
	chomp($nums[$cont] = <STDIN>);
	
	if ($cont != 0)
	{
		if ($nums[$cont] > $nums[$maior])
		{
			$maior = $cont;
		}
		if ($nums[$cont] < $nums[$menor])
		{
			$menor = $cont;
		}

		$media += ($nums[$cont] - $media)/($cont + 1);
	}
	else
	{
		$media = $nums[$cont];
	}

	say "Até o momento...";
	say "...o maior número digitado foi ", $nums[$maior];
	say "...o menor número digitado foi ", $nums[$menor];
	say "...a média dos números digitados é ", $media;
} while (++$cont);
