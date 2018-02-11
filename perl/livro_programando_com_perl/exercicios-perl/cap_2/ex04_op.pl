#!/usr/bin/perl
# Exercicio 2.5: Imprimir um arquivo informado pelo usuário - versão open.

use 5.14.0;
use strict;
use warnings;

say "Digite o nome do arquivo";
chomp (my $nome = <STDIN>);
open (my $fp, "<", $nome) or die "Não foi possível abrir o arquivo!";
while (<$fp>) { print; }
print "\n";
close($fp);
