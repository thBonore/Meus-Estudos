#!/usr/bin/perl
# Exercicio 6.2: Contexto scalar o contexto lista?

use 5.14.0;
use strict;
use warnings;

sub imprimeContexto {
	wantarray ? return ($_[0]) x $_[1] : say $_[0] x $_[1];
}

say "Digite o valor de s (string):";
chomp(my $s = <STDIN>);
say "Digite o valor de n (numérico):";
chomp(my $n = <STDIN>);

say "Função em contexto escalar:";
my $teste = imprimeContexto($s, $n);
say "\nFunção em contexto lista:";
my @teste = imprimeContexto($s, $n);
say "*CRIOU O ARRAY ABAIXO*";
say $_, " => ", $teste[$_] for (0..$n - 1);
