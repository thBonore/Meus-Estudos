#!/usr/bin/perl
# Exercicio 6.1: Calcular o montante final de um investimento

use 5.14.0;
use strict;
use warnings;

say "Digite o montante inicial do invastimento:";
chomp(my $mt_inicial = <STDIN>);
say "Digite o rendimento mensal do investimento:";
chomp(my $rend_mensal = <STDIN>);
say "Digite o tempo do investimento (em meses):";
chomp(my $tempo_meses = <STDIN>);

say "Montante final do investimento: ", montanteFinal(mt_inicial => $mt_inicial, rend_mensal => $rend_mensal, tempo_meses => $tempo_meses);

sub montanteFinal {	$_[0] + $_[1] * $_[2] }
