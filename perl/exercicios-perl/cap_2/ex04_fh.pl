#!/usr/bin/perl
# Exercicio 2.5: Imprimir um arquivo informado pelo usuário - versão FileHandle.

use 5.14.0;
use strict;
use warnings;
use FileHandle;

say "Digite o nome do arquivo";
chomp (my $nome = <STDIN>);
my $fp = FileHandle->new;
$fp->open("< $nome") ? say <$fp> : die "Não foi possível abrir o arquivo!";
$fp->close;
