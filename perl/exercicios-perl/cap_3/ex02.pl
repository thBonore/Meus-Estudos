#!/usr/bin/perl
# Exercicio 3.1: Conta os espaços em um arquivo.

use 5.14.0;
use strict;
use warnings;
use FileHandle;

say "Digite o nome do arquivo";
select my $fp = FileHandle->new("+<".<STDIN>) or die "Erro!";
say "Possui ", scalar(map { map { / / } split // }), " espaços";
$fp->close;
