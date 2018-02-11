#!/usr/bin/perl
# Exercicio 6.5: Ano bissexto

use 5.14.0;
use strict;
use warnings;

my $ano;
do {
	say anoBissexto($ano) ? "Sim" : "Não" if ($ano);
	say "Digite um ano:";
} while (chomp($ano = <STDIN>));

sub anoBissexto { !($_[0] % 4) && ($_[0] % 100 || !($_[0] % 400) ); }
