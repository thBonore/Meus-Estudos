#!/usr/bin/perl
# Exercício 1.1: Soma, produto, diferença e quociente de um número.

use 5.14.0;
use strict;
use warnings;

say "Digite o primeiro valor";
chomp(my $n1 = <STDIN>);

say "Digite o segundo valor";
chomp(my $n2 = <STDIN>);

say "$n1 + $n2 = ", $n1 + $n2;
say "$n1 X $n2 = ", $n1 * $n2;
say "$n1 - $n2 = ", $n1 - $n2;
printf "%d / %d = %.2f\n", $n1, $n2, $n1 / $n2;
