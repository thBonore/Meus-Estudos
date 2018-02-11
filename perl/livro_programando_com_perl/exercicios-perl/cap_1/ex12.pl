#!/usr/bin/perl
# Exercício 1.12: Repetir uma frase n vezes.

use 5.14.0;
use strict;
use warnings;

say "Digite uma frase ou um caractere";
chomp(my $fr = <STDIN>);
say "Quantas vezes deseja repeti-la?";
chomp(my $n = <STDIN>);
say $fr x $n;
