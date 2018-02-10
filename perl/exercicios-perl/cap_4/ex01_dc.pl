#!/usr/bin/perl
# Exercicio 4.1: Celcius para Fahrenheit - Versão exibindo 3 casas decimais

use 5.14.0;
use strict;
use warnings;

use Math::Round "nearest";
use Scalar::Util "looks_like_number";

my $inicio;
until (looks_like_number $inicio) {
	say "Digite o início da tabela:";
	chomp($inicio = <STDIN>);
}
my $fim;
until (looks_like_number $fim && $inicio < $fim) {
	say "Digite o fim da tabela";
	chomp($fim = <STDIN>);
}
print "\n";
printf ("Celcius: %d | Fahrenheit: %.3f\n", $_, nearest(.001, $_ * 1.8 + 32)) foreach ($inicio..$fim);
