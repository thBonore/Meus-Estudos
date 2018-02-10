#!/usr/bin/perl
# Exercicio 3.1: Transformado todas as letras de um arquivo em maiúsculas.

use 5.14.0;
use strict;
use warnings;
use FileHandle;

say "Digite o nome do arquivo";
my $fp = FileHandle->new("+<".<STDIN>) or die "Erro!";

my $inicio = $fp->getpos();
chomp(my @linhas = <$fp>);
$fp->setpos($inicio);
say $fp uc for @linhas;
$fp->close;
