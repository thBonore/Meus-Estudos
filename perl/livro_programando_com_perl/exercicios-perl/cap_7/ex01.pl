#!/usr/bin/perl

use 5.14.0;
use strict;
use warnings;

say "Digite um array com seus eementos separados por \"|\"";
chomp(my $str_array = <STDIN>);
my @array = split /\|/, $str_array;

do {
	say "Digite um array separado por \"\|\"";
	chomp(my $busca = <STDIN>);
	my @array_busca = split /\|/, $busca;
	say buscaArray(\@array, \@array_busca) ? "Está contido" : "Não está contido";
} while (<>);

sub buscaArray { for my $busca (@{$_[1]}) { return 0 unless grep { /$busca/ } @{$_[0]}; } 1 }
