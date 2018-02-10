#!/usr/bin/perl
# Exercício 2: Calcular a área de uma figura.

use 5.14.0;
use strict;
use warnings;

use Scalar::Util "looks_like_number";

my $lados;

until (looks_like_number($lados)) {
	say "Digite o número de lados da figura:";
	chomp ($lados = <STDIN>);
}

my $perimetro = 0;
foreach (1..$lados) {
	my $medida;
	until (looks_like_number($medida)) {
		say "Digite a medida do $_º lado:";
		chomp ($medida = <STDIN>);
	}
	$perimetro += $medida;
}

my $apotema;
until (looks_like_number($apotema)) {
	say "Digite a apótema da figura:";
	chomp ($apotema = <STDIN>);
}

printf "\nA área aproximada desta figura é %.2f\n", 0.5 * $perimetro * $apotema;
