#!/usr/bin/perl
# Exercício 4.1: Numero mágico

use 5.14.0;
use strict;
use warnings;

use Switch;
use Scalar::Util "looks_like_number";

my $num;
my $chute;
do {
	$num = int(rand(11)) if (not defined $num);
	chomp ($chute = <STDIN>);
	switch (1) {
		case {not looks_like_number $chute} { say "Não é numérico"; }
		case {$chute == -1} { say "Até a próxima!!"; }
		case {$chute == $num} { say "Acertou"; undef $num; }
		case {$chute > $num} { say "Chute é menor do que o número gerado"; }
		case {$chute < $num} { say "Chute é maior do que o número gerado"; }
	}
	
} while ($chute ne -1);
