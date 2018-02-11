#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;

say "Digite uma string";
chomp(my $str = <STDIN>);
my @str = sort { lc $a cmp lc $b } split //, $str;

say "Digite sua busca na string";
chomp(my $busca = <STDIN>);
say pesquisaBinaria(\@str, $busca) ? "Existe" : "Não Existe";

sub pesquisaBinaria {
	return @{$_[0]}[0] eq $_[1] if $#{$_[0]} == 1;
	my @parte = splice @{$_[0]}, 0, int($#{$_[0]} / 2);
	given ($_[0]->[0] cmp $_[1]) {
		when (1) { pesquisaBinaria(\@parte, $_[1]) }
		when (0) { return 1; }
		when (-1) { pesquisaBinaria($_[0], $_[1]) }
	}
}
