#!/usr/bin/perl

use 5.22.0;
use strict;
use warnings;
use FileHandle;

say "Digite o nome do arquivo:";
chomp(my $arq = <STDIN>);

my $fp = FileHandle->new("<$arq") or die "Impossível ler arquivo";
my ($li, $pl, $ca) = (0, 0, 0);
while (<$fp>) {
	$li++;
	$pl += scalar split / /;
	$ca += scalar split //;
}
say "Arquivo possui $li linhas, $pl palavras e $ca caracteres!";
