#!/usr/bin/perl
# Exercicio 3.3: Validacao da data de nascimento

use 5.14.0;
use strict;
use warnings;

say "Digite sua data de nascimento";
chomp(my $dt_nasc = <STDIN>);
say ($dt_nasc =~ /(\d{2}\/){2}\d{4}/ or $dt_nasc =~ /\d{4}(\-\d{2}){2}/ ? "Sim" : "Não");
